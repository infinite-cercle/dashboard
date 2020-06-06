<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pickup_model extends CI_Model {

	public function getAllPickups()
	{
		$this->db->select('pr.*, s.fld_location, c.fld_firstname as inchg_fname, c.fld_lastname as inchg_lname, ap.*');
		$this->db->from('tbl_pickup_requests as pr');
		$this->db->join('tbl_sites as s', 's.fld_id = pr.fld_site_id', 'left');
		$this->db->join('tbl_contacts as c', 'c.fld_id = pr.fld_inchg_person', 'left');
		$this->db->join('tbl_approvals as ap', 'ap.fld_pickup_uq_id = pr.fld_uniq_token', 'left');
		$this->db->order_by('pr.fld_date_created', 'desc');
		$cond = array( 'ap.fld_processor_id' => prouniqid );
		$this->db->where($cond);
		$q = $this->db->get();
		$r = $q->result_array();
		$temp = array();
		if(!empty($r)){
			foreach ($r as $key => $res) {
				$res['wastes'] = $this->getWastesinPickup($res['fld_id']);
				// check for approval
				$c = array(
					'fld_processor_id' => prouniqid,
					'fld_pickup_uq_id' => $res['fld_uniq_token']
				);
				$this->db->where($c);
				$qs = $this->db->get('tbl_processing_status');
				$existing = $qs->num_rows();
				// -------------------
				if($existing == 0){
					$res['current_status'] = $this->getCurrentStatusofPickup($res['fld_uniq_token']);
				} else {
					$c = array(
						'fld_processor_id' => prouniqid,
						'fld_pickup_uq_id' => $res['fld_uniq_token']
					);
					$this->db->where($c);
					$this->db->order_by('fld_id', 'desc');
					$qs = $this->db->get('tbl_processing_status');
					$rs = $qs->row_array();
					$res['current_status']['status_code'] = $rs['fld_current_status'];
				}
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

	public function getCurrentStatusofPickup($id)
	{
		$this->db->where('fld_pickup_id', $id);
		$this->db->select('fld_processing_status as status_code, fld_process_notes as notes');
		$this->db->order_by('fld_process_st_id', 'desc');
		$q = $this->db->get('tbl_process_status_timeline');
		$r = $q->row_array();
		return $r;
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

	public function getTimeline($key)
	{
		$this->db->select('pa.*, up.fld_firstname as firstname, up.fld_lastname as lastname, up.fld_designation as designation, up.fld_workmail as email, up.fld_company as company');
		$this->db->from('tbl_process_activity as pa');
		$this->db->join('tbl_user_personal as up', 'up.fld_id = pa.fld_initiated_by', 'left');
		$cond = array(
			'pa.fld_pickup_uniq_id' => $key,
		);
		$this->db->where($cond);
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

	public function getPickupAssign($assignKey)
	{
		$cond = array(
			'fld_assign_unique_id' => $assignKey,
			'fld_processor_id' => prouniqid
		);
		$this->db->where($cond);
		$q = $this->db->get('tbl_approvals');
		$r = $q->row_array();

		// get the processsing status
		$r['processing_status'] = $this->getCurrentProcessingStatus($assignKey);

		return $r;
	}

	public function getCurrentProcessingStatus($assign_key)
	{
		$this->db->select('ps.*, t.*');
		$this->db->from('tbl_processing_status as ps');
		$this->db->join('tbl_transports as t', 't.fld_transport_id = ps.fld_transport_id', 'left');
		$this->db->where('ps.fld_assign_id', $assign_key);
		$this->db->order_by('ps.fld_id', 'desc');
		$q = $this->db->get();
		$r = $q->result_array();;
		return $r;
	}

	public function addStatus($d)
	{
		// get processor id using the unique assign id
		$this->db->where('fld_assign_unique_id', $this->input->get('assign_key'));
		$q = $this->db->get('tbl_approvals');
		$r = $q->row_array();
		$processor_id = $r['fld_processor_id'];
		$process_uniq_status_id = md5('process'.date('YmdHis'));
		// -------------------
		// get the user log
		$this->db->where('fld_id', userid);
		$getUser = $this->db->get('tbl_user_personal');
		$user = $getUser->row_array();

		if(isset($d['is_transport'])){
			$insert_driver = array(
				'fld_driver_name' => strtoupper($d['driver_name']),
				'fld_licence_number' => strtoupper($d['licence_number']),
				'fld_vehicle_number' => strtoupper($d['vehicle_number']),
				'fld_diver_phone' => $d['diver_mobile'],
				'fld_processor_id' => $processor_id,
				'fld_loading_mens_count' => $d['loading_mens'],
				'fld_date_created' => date('Y-m-d H:i:s'),
				'fld_status' => 1,
			);
			$ins = $this->db->insert('tbl_transports', $insert_driver);
			if($ins){
				$transport_id = $this->db->insert_id();
				// Insert process status
				$insert_process = array(
					'fld_processing_status_uq_id' => $process_uniq_status_id,
					'fld_pickup_uq_id' => $r['fld_pickup_uq_id'],
					'fld_processor_id' => $processor_id,
					'fld_assign_id' => $this->input->get('assign_key'),
					'fld_current_status' => $d['status'],
					'fld_status_notes' => $d['status_notes'],
					'fld_transport_id' => $transport_id,
					'fld_initiated_by' => userid,
					'fld_date_added' => date('Y-m-d H:i:s'),
					'fld_status' => 1
				);
				$ins_process_status = $this->db->insert('tbl_processing_status', $insert_process);
				if($ins_process_status){
					if($d['status'] == 1){
						$actvityMsg = 'The '.$r['fld_assigned_qty'].'('.strtoupper($r['fld_material_name']).')'.' tons of waste is approved for pickup and assigned transporter' .strtoupper($d['driver_name']).' ('.strtoupper($d['vehicle_number']).')';
					} else {
						$actvityMsg = 'The '.$r['fld_assigned_qty'].'('.strtoupper($r['fld_material_name']).')'.' tons pickup status has been changed into '.$this->process_status($d['status']).'. driver name -'.strtoupper($d['driver_name']).' & Vehicle Number -'.strtoupper($d['vehicle_number']);
					}

					// check the current status data and upload the manifest
					if($d['status'] == 2){
						// upload the manifest
						$config['upload_path'] = './uploads/';
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_size']  = '100';
						$config['max_width']  = '1024';
						$config['max_height']  = '768';
						
						$this->load->library('upload', $config);
						
						if ( ! $this->upload->do_upload()){
							$error = array('error' => $this->upload->display_errors());
						}
						else{
							$data = array('upload_data' => $this->upload->data());
							echo "success";
						}
					}

					$activityData = array(
						'fld_pickup_uniq_id' => $r['fld_pickup_uq_id'],
						'fld_activity_title' => 'Pickup approved and Transporter assigned by '.$user['fld_company'],
						'fld_initiated_by' => userid,
						'fld_decription' => $actvityMsg,
						'fld_date_added' => date('Y-m-d H:i:s'),
						'fld_status' => 1
					);
					AssignPickupActivity($activityData);
					return true;
				}
			}
		} else {
			$insert_process = array(
				'fld_processing_status_uq_id' => $process_uniq_status_id,
				'fld_pickup_uq_id' => $r['fld_pickup_uq_id'],
				'fld_processor_id' => $processor_id,
				'fld_assign_id' => $this->input->get('assign_key'),
				'fld_current_status' => $d['status'],
				'fld_status_notes' => $d['status_notes'],
				'fld_initiated_by' => userid,
				'fld_date_added' => date('Y-m-d H:i:s'),
				'fld_status' => 1
			);
			$ins_process_status = $this->db->insert('tbl_processing_status', $insert_process);
			if($ins_process_status){
				$activityData = array(
					'fld_pickup_uniq_id' => $r['fld_pickup_uq_id'],
					'fld_activity_title' => 'Pickup status changed to '.$user['fld_company'],
					'fld_initiated_by' => userid,
					'fld_decription' => 'The '.$r['fld_assigned_qty'].' ('.strtoupper($r['fld_material_name']).')'.' tons pickup status has been changed into '.$this->process_status($d['status']),
					'fld_date_added' => date('Y-m-d H:i:s'),
					'fld_status' => 1
				);
				AssignPickupActivity($activityData);
				return true;
			}
		}
	}

	public function process_status($id)
	{
		$status = array(
			'1' => 'Assigned Driver',
			'2' => 'Collected',
			'3' => 'Received',
			'4' => 'Processing',
			'5' => 'Dispatched'
		);
		return $status[$id];
	}

}

/* End of file Pickup_model.php */
/* Location: ./application/modules/processor/models/Pickup_model.php */