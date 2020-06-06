<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pickup_manage extends CI_Model {

	public function getSiteDetailByIdForPickup($id)
	{
		$this->db->where('fld_id', $id);
		$this->db->select('fld_id as id, fld_location as location, fld_geo_district as geo_district, fld_latitide as latitide, fld_longitude as longitude, fld_site_address as site_address, fld_quatity_annum as quatity_annum, fld_incharge_person as incharge_person, fld_work_mail as work_mail, fld_phone_number as phone_number, fld_status as status');
		$q = $this->db->get('tbl_sites');
		$r = $q->row_array();
		// Get wastes
		$this->db->where('fld_site_id', $id);
		$this->db->select('fld_waste_type as waste_type');
		$q2 = $this->db->get('tbl_site_wastes');
		$r2 = $q2->result_array();
		$wastes = array();
		if(!empty($r2)){
			foreach ($r2 as $key => $value) {
				$wastes[] = $value['waste_type'];
			}
		}
		$r['wastes'] = $wastes;
		
		// Incharge Person detail
		$this->db->where('fld_id', $r['incharge_person']);
		$this->db->select('fld_id as id, fld_firstname as firstname, fld_lastname as lastname, fld_designation as designation, fld_email as email, fld_phone as phone, fld_status as status');
		$q3 = $this->db->get('tbl_contacts');
		$r3 = $q3->row_array();
		$r['incharge_person'] = $r3;

		// Do id enc
		$r['id'] = $this->encryption->encrypt($r['id']);
		$r['incharge_person']['id'] = $this->encryption->encrypt($r['incharge_person']['id']);

		return $r;
	}

	public function newPipckup($data)
	{
		$siteid = $this->encryption->decrypt($data['site']);
		$incharge_person = $this->encryption->decrypt($data['person']);
		$pickup_waste = $data['wastes'];
		$pickupuniqid = md5(date('YmdHis'));
		$indata = array(
			'fld_uniq_token' => $pickupuniqid,
			'fld_client_id' => userid,
			'fld_site_id' => $siteid,
			'fld_is_loadingman_req' => $data['loading_man'],
			'fld_qty' => str_replace(',', '', $data['qty']),
			'fld_inchg_person' => $incharge_person,
			'fld_inchg_email' => $data['email'],
			'fld_inchg_phone' => $data['phone'],
			'fld_created_by' => userid,
			'fld_created_date' => date('Y-m-d'),
			'fld_created_time' => date('H:i:s'),
			'fld_current_status' => 1,
			'fld_is_images' => 0,
			'fld_date_created' => date('Y-m-d H:i:s'),
			'fld_status' => 1
		);
		$inserted = $this->db->insert('tbl_pickup_requests', $indata);
		$pickup_id = $this->db->insert_id();
		if($inserted){
			// Insert into pickup wastes
			if(!empty($pickup_waste)){
				foreach ($pickup_waste as $key => $waste) {
					$in = array( 'fld_pickup_id' => $pickup_id, 'fld_waste_type_id' => $waste, 'fld_status' => 1 );
					$this->db->insert('tbl_pickup_wastes', $in);
				}
			}
			// Add into activity timeline
			$activityData = array(
				'fld_pickup_uniq_id' => $pickupuniqid,
				'fld_activity_title' => 'New Pickup Request has been added',
				'fld_initiated_by' => userid,
				'fld_decription' => 'A new pickup request has been added. Awaiting for the administrator approval.',
				'fld_date_added' => date('Y-m-d H:i:s'),
				'fld_status' => 1
			);
			ActivityAddNewPickupRequest($activityData);



			// Push notifications
			$notification_insert = array(
				'fld_user_id' => userid,
				'fld_ad_notification_type' => 1, // pickup
				'fld_ad_message' => 'New Pickup request received from COMPANY NAME',
				'fld_ad_datetime' => date('Y-m-d H:i:s'),
				'fld_is_read_by_admin' => 0,
				'fld_ad_status' => 1
			);
			$this->db->insert('tbl_admin_notifications', $notification_insert);
			// Notification helper
			notify(/*from*/'generator', /*to*/'admin', /*notification data*/ array('res' => 1));
			return array('pickup_id' => $pickupuniqid);
		} else {
			return false;
		}
	}

	public function getAllPickups()
	{
		$this->db->select('pr.*, s.fld_location, c.fld_firstname as inchg_fname, c.fld_lastname as inchg_lname');
		$this->db->from('tbl_pickup_requests as pr');
		$this->db->join('tbl_sites as s', 's.fld_id = pr.fld_site_id', 'left');
		$this->db->join('tbl_contacts as c', 'c.fld_id = pr.fld_inchg_person', 'left');
		$this->db->order_by('pr.fld_id', 'desc');
		$cond = array( 'pr.fld_client_id' => userid );
		$this->db->where($cond);
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

	public function upload_image($d, $k, $first = false)
	{
		$in = array(
			'fld_pickup_key' => $k,
			'fld_image_path' => $d['file_name'],
			'fld_date_uploaded' => date('Y-m-d H:i:s'),
			'fld_status' => 1
		);
		$this->db->insert('tbl_waste_images', $in);

		// Check for image rows
		$this->db->where('fld_pickup_key', $k);
		$q = $this->db->get('tbl_waste_images');
		$rows = $q->num_rows();

		if($rows == 1){
			// Add into activity timeline
			$activityData = array(
				'fld_pickup_uniq_id' => $k,
				'fld_activity_title' => 'Images has been upload',
				'fld_initiated_by' => userid,
				'fld_decription' => 'Images are uploaded for the new pickup request.',
				'fld_date_added' => date('Y-m-d H:i:s'),
				'fld_status' => 1
			);
			ActivityAddNewPickupRequest($activityData);
		}

		// Change the image status
		$this->db->where('fld_uniq_token', $k);
		$up = array( 'fld_is_images' => 1 );
		$this->db->update('tbl_pickup_requests', $up);

		return true;
	}

	public function upload_image_multiple_images($d, $k, $first = false)
	{
		if(!empty($d)){
			foreach ($d as $key => $image_file) {
				$im = $image_file['im_data'];

				$in = array(
					'fld_pickup_key' => $k,
					'fld_image_path' => $im['file_name'],
					'fld_date_uploaded' => date('Y-m-d H:i:s'),
					'fld_status' => 1
				);
				$this->db->insert('tbl_waste_images', $in);
			}
		}

		/*$in = array(
			'fld_pickup_key' => $k,
			'fld_image_path' => $d['file_name'],
			'fld_date_uploaded' => date('Y-m-d H:i:s'),
			'fld_status' => 1
		);
		$this->db->insert('tbl_waste_images', $in);*/

		// Check for image rows
		$this->db->where('fld_pickup_key', $k);
		$q = $this->db->get('tbl_waste_images');
		$rows = $q->num_rows();

		if($rows == 1){
			// Add into activity timeline
			$activityData = array(
				'fld_pickup_uniq_id' => $k,
				'fld_activity_title' => 'Images has been upload',
				'fld_initiated_by' => userid,
				'fld_decription' => 'Images are uploaded for the new pickup request.',
				'fld_date_added' => date('Y-m-d H:i:s'),
				'fld_status' => 1
			);
			ActivityAddNewPickupRequest($activityData);
		}

		if($first){
			// Add into activity timeline
			$activityData = array(
				'fld_pickup_uniq_id' => $k,
				'fld_activity_title' => 'Images has been upload',
				'fld_initiated_by' => userid,
				'fld_decription' => 'Images are uploaded for the new pickup request.',
				'fld_date_added' => date('Y-m-d H:i:s'),
				'fld_status' => 1
			);
			ActivityAddNewPickupRequest($activityData);
		}

		// Change the image status
		$this->db->where('fld_uniq_token', $k);
		$up = array( 'fld_is_images' => 1 );
		$this->db->update('tbl_pickup_requests', $up);

		return true;
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

	public function getInchargePerson($s)
	{
		$this->db->where('fld_id', $s);
		$q = $this->db->get('tbl_sites');
		$siteDetails = $q->row_array();
		$incharge_id = $siteDetails['fld_incharge_person'];
		// get incharge person details
		$this->db->select('fld_id as id, fld_firstname as firstname, fld_lastname as lastname, fld_address1 as address1, fld_address2 as address2, fld_designation as designation, fld_email as email, fld_phone as phone,');
		$this->db->where('fld_id', $incharge_id);
		$q2 = $this->db->get('tbl_contacts');
		$r2 = $q2->row_array();
		$r2['key'] = $r2['id'];
		$r2['id'] = $this->encryption->encrypt($r2['id']);
		return $r2;
	}

}

/* End of file Pickup_manage.php */
/* Location: ./application/modules/client/models/Pickup_manage.php */