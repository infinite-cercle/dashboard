<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_manage extends CI_Model {

	public function signup($data)
	{
		// $notification_token = md5(date('YmdHis'));
		$ins = array(
			'fld_firstname' => $data['firstname'],
			'fld_lastname' => $data['lastname'],
			'fld_company' => $data['company'],
			'fld_designation' => $data['designation'],
			'fld_workmail' => $data['email'],
			'fld_usertype' => $data['type_of_user'],
			'fld_is_terms_accepted' => 1,
			'fld_steps_completed' => 1,
			'fld_request_mail_sent' => 0,
			// 'fld_nofitication_token' => $notification_token, // added authenticaion notificaiton
			'fld_date_added' => date('Y-m-d H:i:s'),
			'fld_status' => 1
		);
		$insert = $this->db->insert('tbl_user_personal', $ins);
		if($insert){
			$insert_id = $this->db->insert_id();

			if($data['type_of_user'] == 4){
				// Insert into the Processor panel
				$processor_uniq_id = md5(date("YmdHis"));
				$in = array(
					'fld_processor_log_id' => $insert_id,
					'fld_processor_uniq_id' => $processor_uniq_id,
					'fld_dealer_name' => $data['company'],
					'fld_address' => '',
					'fld_email' => $data['email'],
					'fld_contact_number' => '',
					'fld_reg_number' => '',
					'fld_gst_number' => '',
					'fld_lat' => '',
					'fld_lng' => '',
					'fld_date_added' => date('Y-m-d H:i:s'),
					'fld_status' => 1
				);
				$ii = $this->db->insert('tbl_processors', $in);
				$processor_id = $this->db->insert_id();

				if($ii){
					$binsert = array( 'fld_processor_id' => $processor_id, 'fld_business_process_id' => '4', 'fld_date_created' => date('Y-m-d H:i:s'), 'fld_status' => 1);
					$this->db->insert('tbl_business_process', $binsert);
				}
			}

			return $insert_id;
		} else {
			return false;
		}
	}

	public function user_log($data, $id)
	{
		$notification_token = md5(date('YmdHis'));
		$in = array(
			'fld_userid' => $id,
			'fld_user_login' => $data['email'],
			'fld_password' => md5($data['password']),
			'fld_usertype' => $data['type_of_user'],
			'fld_notification_token' => $notification_token, // added authenticaion notificaiton
			'fld_status' => 1
		);

		$ins = $this->db->insert('tbl_user_log', $in);
		if($ins){
			return true;
		} else {
			return false;
		}
	}

	public function validate_user($data)
	{
		// Check for email address
		$this->db->where('fld_workmail', $data['email']);
		$q1 = $this->db->get('tbl_user_personal');
		$r1 = $q1->result_array();

		if(empty($r1)){
			$response = array(
				'exist' => 0
			);
		} else {
			$response = array(
				'exist' => 1,
				'email_exist' => 1
			);
		}
		return $response;
	}

	public function check_credentials($data)
	{
		$cond = array(
			'fld_user_login' => $data['email'],
			'fld_password' => md5($data['password'])
		);
		$this->db->where($cond);
		$q = $this->db->get('tbl_user_log');
		$num_rows = $q->num_rows();
		if($num_rows == 0){
			return false;
		} else {
			// ge the user id
			$res = $q->row_array();
			// Update token
			$token_raw = date('YmdHis');
			$token = $this->encryption->encrypt($token_raw);
			$up = array( 'fld_token' => $token, 'fld_last_login' => date('Y-m-d H:i:s') );
			$this->db->where('fld_userid', $res['fld_id']);
			$this->db->update('tbl_user_log', $up);
			$set_session = array(
				'ref_token' => $token,
				'user_type' => $res['fld_usertype']
			);
			$this->session->set_userdata('ref_user', $set_session);
			return true;
		}
	}

}

/* End of file auth_model.php */
/* Location: ./application/models/auth_model.php */