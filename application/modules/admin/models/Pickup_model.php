<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pickup_model extends CI_Model {

	public function getRequestsToApproval()
	{
		$this->db->select('pr.*, s.fld_location, c.fld_firstname as inchg_fname, c.fld_lastname as inchg_lname');
		$this->db->from('tbl_pickup_requests as pr');
		$this->db->join('tbl_sites as s', 's.fld_id = pr.fld_site_id', 'left');
		$this->db->join('tbl_contacts as c', 'c.fld_id = pr.fld_inchg_person', 'left');
		$this->db->order_by('pr.fld_date_created', 'desc');
		$cond = array( 'pr.fld_current_status' => 1 );
		$this->db->where($cond);
		$q = $this->db->get();
		$r = $q->result_array();
		$temp = array();
		if(!empty($r)){
			foreach ($r as $key => $res) {
				$res['wastes'] = $this->getWastesinPickup($res['fld_id']);
				$res['assigned_qty'] = $this->getExistingAssignCount($res['fld_uniq_token']);
				$temp[] = $res;
			}
		}
		return $temp;
	}

	public function getAllRequests()
	{
		$this->db->select('pr.*, s.fld_location, c.fld_firstname as inchg_fname, c.fld_lastname as inchg_lname');
		$this->db->from('tbl_pickup_requests as pr');
		$this->db->join('tbl_sites as s', 's.fld_id = pr.fld_site_id', 'left');
		$this->db->join('tbl_contacts as c', 'c.fld_id = pr.fld_inchg_person', 'left');
		$this->db->order_by('pr.fld_date_created', 'desc');
		/*$cond = array( 'pr.fld_current_status' => 1 );
		$this->db->where($cond);*/
		$q = $this->db->get();
		$r = $q->result_array();
		$temp = array();
		if(!empty($r)){
			foreach ($r as $key => $res) {
				$res['wastes'] = $this->getWastesinPickup($res['fld_id']);
				$temp[] = $res;
			}
		}
		return $temp;
	}

	public function getWastesinPickup($id)
	{
		$this->db->where('fld_pickup_id', $id);
		$this->db->select('fld_waste_type_id as waste');
		$q = $this->db->get('tbl_pickup_wastes');
		$r = $q->result_array();
		$wastes = array();
		if(!empty($r)){
			foreach ($r as $key => $re) {
				$wastes[] = $re['waste'];
			}
		}
		return $wastes;
	}

	public function getTimeline($key)
	{
		$this->db->select('pa.*, up.fld_firstname as firstname, up.fld_lastname as lastname, up.fld_designation as designation, up.fld_workmail as email');
		$this->db->from('tbl_process_activity as pa');
		$this->db->join('tbl_user_personal as up', 'up.fld_id = pa.fld_initiated_by', 'left');
		$this->db->where('pa.fld_pickup_uniq_id', $key);
		$this->db->order_by('pa.fld_date_added', 'desc');
		$q = $this->db->get();
		$r = $q->result_array();
		$today = array();
		$yesterday = array();
		$other = array();
		foreach ($r as $key => $activities) {
			$date = date('Y-m-d', strtotime($activities['fld_date_added']));
			$yesterday_date = date('Y-m-d',strtotime("-1 days"));
			if($date == date('Y-m-d')){
				$today[] = $activities;
			} else if($date == $yesterday_date){
				$yesterday[] = $activities;
			} else {
				$other[] = $activities;
			}
		}
		$all_activities = array(
			'today' => $today,
			'yesterday' => $yesterday,
			'other_days' => $other
		);
		return $all_activities;
	}

	public function getExistingImages($key)
	{
		$this->db->where('fld_pickup_key', $key);
		$this->db->select('fld_image_path as image');
		$q = $this->db->get('tbl_waste_images');
		$r = $q->result_array();
		$temp = array();
		if(!empty($r)){
			foreach ($r as $key => $value) {
				$temp[] = base_url().'uploads/client_uploads/'.$value['image'];
			}
		}
		return $temp;
	}

	public function getPickupDetailById($k)
	{
		$this->db->select('pr.*, s.fld_location, c.fld_firstname as inchg_fname, c.fld_lastname as inchg_lname, up.fld_company as company');
		$this->db->from('tbl_pickup_requests as pr');
		$this->db->join('tbl_sites as s', 's.fld_id = pr.fld_site_id', 'left');
		$this->db->join('tbl_contacts as c', 'c.fld_id = pr.fld_inchg_person', 'left');
		$this->db->join('tbl_user_personal as up', 'up.fld_id = pr.fld_client_id', 'left');
		$cond = array( 'pr.fld_uniq_token' => $k );
		$this->db->where($cond);
		$q = $this->db->get();
		$r = $q->row_array();
		if(!empty($r)){
			$r['wastes'] = $this->getWastesinPickup($r['fld_id']);
			$r['images'] = $this->getExistingImages($r['fld_uniq_token']);
		} else {
			$r['wastes'] = array();
			$r['images'] = array();
		}
		return $r;
	}

	public function getProcessors()
	{
		$q = $this->db->get('tbl_processors');
		$r = $q->result_array();
		return $r;
	}

	public function makeApprove($data, $key)
	{
		$ins = array(
			'fld_pickup_uq_id' => $key,
			'fld_assign_unique_id' => md5(date('YmdHis')),
			'fld_processor_id' => $data['processor'],
			'fld_assigned_by' => userid,
			'fld_material_name' => $data['material_name'],
			'fld_assigned_qty' => $data['qty'],
			'fld_assigned_date' => date('Y-m-d H:i:s'),
			'fld_status' => 1
		);
		$in = $this->db->insert('tbl_approvals', $ins);
		if($in){
			// get processor detail
			$this->load->model('processor_model');
			$processor_detail = $this->processor_model->getProcessorDetailByID($data['processor']);
			$activityData = array(
				'fld_pickup_uniq_id' => $key,
				'fld_activity_title' => 'Pickup has been assigned to processor | '.$processor_detail['fld_dealer_name'],
				'fld_initiated_by' => userid,
				'fld_decription' => 'The '.$data['qty'].' tons of waste has been assigned to the processor fro pickup.',
				'fld_date_added' => date('Y-m-d H:i:s'),
				'fld_status' => 1
			);
			AssignPickupActivity($activityData);
			// Insert into the pickup status table
			$in_status = array(
				'fld_pickup_id' => $key,
				'fld_processor_id' => $data['processor'],
				'fld_processing_status' => 1,
				'fld_processed_by' => userid,
				'fld_process_notes' => $data['assign_notes'],
				'fld_date_processed' => date('Y-m-d H:i:s')
			);
			$this->db->insert('tbl_process_status_timeline', $in_status);
			return true;
		} else {
			return false;
		}
	}

	public function getAssignDetails($pickup_id)
	{
		$this->db->select('a.fld_pickup_uq_id as pickup_uniq_id, a.fld_processor_id as processor_id, a.*, p.*, up.fld_firstname as assign_firstname, up.fld_lastname as assign_lastname');
		$this->db->from('tbl_approvals as a');
		$this->db->join('tbl_processors as p', 'a.fld_processor_id = p.fld_processor_uniq_id', 'left');
		$this->db->join('tbl_user_personal as up', 'up.fld_id = a.fld_assigned_by', 'left');
		$this->db->where('a.fld_pickup_uq_id', $pickup_id);
		$q = $this->db->get();
		$r = $q->result_array();
		$temp = array();
		foreach ($r as $key => $value) {
			$value['fld_assigned_date'] =date('d/m/Y', strtotime($value['fld_assigned_date']));
			// get current status of the process
			$value['current_status'] = $this->getCurrentStatus($value['fld_assign_unique_id']);
			$temp[] = $value;
		}
		return $temp;
	}

	public function getExistingAssignCount($key)
	{
		$this->db->where('fld_pickup_uq_id', $key);
		$this->db->select('sum(fld_assigned_qty) as total_assigned');
		$q = $this->db->get('tbl_approvals');
		$r = $q->row_array();
		return $r['total_assigned'];
	}

	public function getCurrentStatus($assign_id)
	{
		$this->db->where('fld_assign_id', $assign_id);
		$this->db->order_by('fld_id', 'desc');
		$q = $this->db->get('tbl_processing_status');
		$r = $q->row_array();
		return $r['fld_current_status'];
	}

	public function getAssignDetailsByAssignKey($assign_key)
	{
		$this->db->where('fld_assign_unique_id', $assign_key);
		$q = $this->db->get('tbl_approvals');
		$r = $q->row_array();
		return $r;
	}

	public function saveCarbonFootprints($data)
	{
		// get existing CF
		$this->db->where('fld_assign_id', $data['assign_key']);
		$q = $this->db->get('tbl_carbon_footprints');
		$r = $q->num_rows();
		if($r <= 0){
			$in = array(
				'fld_assign_id' => $data['assign_key'],
				'fld_qty' => $data['qty'],
				'fld_distance_travelled' => $data['trasport_distance'],
				'fld_trucks' => $data['trasport_trucks'],
				'fld_transport_cf' => $data['tq'],
				'fld_balling_cf' => $data['bq'],
				'fld_recycling_cf' => $data['rq'],
				'fld_total_cf' => $data['total_cf'],
				'fld_date_added' => date('Y-m-d H:i:s'),
				'fld_status' => 1
			);
			$insert = $this->db->insert('tbl_carbon_footprints', $in);
			if($insert){
				// Add into activity timeline
				$activityData = array(
					'fld_pickup_uniq_id' => $this->getPickupIdByAssignKey($data['assign_key']),
					'fld_activity_title' => 'Carbon foot print added by admin',
					'fld_initiated_by' => userid,
					'fld_decription' => 'The '.$data['qty'].' tons of process carbon foot prints has been added by Pepaa Administrator.',
					'fld_date_added' => date('Y-m-d H:i:s'),
					'fld_status' => 1
				);
				AssignPickupActivity($activityData);
				return true;
			} else {
				return false;
			}
		} else {
			$up = array(
				'fld_qty' => $data['qty'],
				'fld_distance_travelled' => $data['trasport_distance'],
				'fld_trucks' => $data['trasport_trucks'],
				'fld_transport_cf' => $data['tq'],
				'fld_balling_cf' => $data['bq'],
				'fld_recycling_cf' => $data['rq'],
				'fld_total_cf' => $data['total_cf'],
				'fld_date_modified' => date('Y-m-d H:i:s'),
				'fld_status' => 1
			);
			$this->db->where('fld_assign_id', $data['assign_key']);
			$insert = $this->db->update('tbl_carbon_footprints', $up);
			if($insert){
				return true;
			} else {
				return false;
			}
		}
	}

	public function getExistingCF($assign_key)
	{
		$this->db->where('fld_assign_id', $assign_key);
		$q = $this->db->get('tbl_carbon_footprints');
		$r = $q->row_array();
		if(!empty($r)){
			return $r;
		} else {
			return false;
		}
	}

	public function getPickupIdByAssignKey($assign_key)
	{
		$this->db->where('fld_assign_unique_id', $assign_key);
		$q = $this->db->get('tbl_approvals');
		$r = $q->row_array();
		return $r['fld_pickup_uq_id'];
	}

}

/* End of file Pickup_model.php */
/* Location: ./application/modules/admin/models/Pickup_model.php */