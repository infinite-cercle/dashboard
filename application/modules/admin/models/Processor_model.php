<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Processor_model extends CI_Model {

	public function addNewProcesor($data)
	{
		// Add into user personal
		$pinsert = array(
			'fld_company' => $data['dealer_name'],
			'fld_workmail' => $data['email'],
			'fld_usertype' => 4,
			'fld_is_terms_accepted' => 1,
			'fld_steps_completed' => 1,
			'fld_request_mail_sent' => 0,
			'fld_date_added' => date('Y-m-d H:i:s'),
			'fld_status' => 1,
		);
		$this->db->insert('tbl_user_personal', $pinsert);
		$upId = $this->db->insert_id();

		// Insert into user log
		$ulinsert = array(
			'fld_userid' => $upId,
			'fld_user_login' => $data['email'],
			'fld_password' => md5('admin'),
			'fld_usertype' => 4,
			'fld_status' => 1,
		);
		$this->db->insert('tbl_user_log', $ulinsert);

		$processor_uniq_id = md5(date("YmdHis"));
		$in = array(
			'fld_processor_log_id' => $upId,
			'fld_processor_uniq_id' => $processor_uniq_id,
			'fld_dealer_name' => $data['dealer_name'],
			'fld_address' => $data['address'],
			'fld_email' => $data['email'],
			'fld_contact_number' => $data['phone_number'],
			'fld_reg_number' => $data['reg_number'],
			'fld_gst_number' => $data['gst_number'],
			'fld_lat' => $data['latitude'],
			'fld_lng' => $data['longitude'],
			'fld_date_added' => date('Y-m-d H:i:s'),
			'fld_status' => 1
		);
		$insert = $this->db->insert('tbl_processors', $in);
		$processor_id = $this->db->insert_id();
		if($insert){
			// Inseer tthe business process
			if(!empty($data['business_process'])){
				foreach ($data['business_process'] as $key => $bpro) {
					$binsert = array( 'fld_processor_id' => $processor_id, 'fld_business_process_id' => $bpro, 'fld_date_created' => date('Y-m-d H:i:s'), 'fld_status' => 1);
					$this->db->insert('tbl_business_process', $binsert);
				}
			}
			// Insert the waste types
			if(!empty($data['waste_handeling'])){
				foreach ($data['waste_handeling'] as $key => $whandle) {
					$binsert = array( 'fld_processor_id' => $processor_id, 'fld_waste_type_id' => $whandle, 'fld_date_created' => date('Y-m-d H:i:s'), 'fld_status' => 1);
					$this->db->insert('tbl_waste_handling', $binsert);
				}
			}

			return true;
		} else {
			return false;
		}
	}

	public function getExistingprocessors()
	{
		$this->db->order_by('fld_processor_id', 'desc');
		$q = $this->db->get('tbl_processors');
		$r = $q->result_array();
		$temp = array();
		// Include wastes
		if(!empty($r)){
			foreach ($r as $key => $res) {
				$res['waste_handling'] = $this->getWatesHandlingByProcessorId($res['fld_processor_id']);
				$res['business_handling'] = $this->getBusinessHandlingByProcessorId($res['fld_processor_id']);
				$temp[] = $res;
			}
		}
		return $temp;
	}

	public function getWatesHandlingByProcessorId($id)
	{
		$this->db->select('fld_waste_type_id as waste_type');
		$this->db->where('fld_processor_id', $id);
		$q = $this->db->get('tbl_waste_handling');
		$r = $q->result_array();
		$temp = array();
		if(!empty($r)){
			foreach ($r as $key => $w) {
				$temp[] = $w['waste_type'];
			}
		}
		return $temp;
	}

	public function getBusinessHandlingByProcessorId($id)
	{
		$this->db->select('fld_business_process_id as business_process');
		$this->db->where('fld_processor_id', $id);
		$q = $this->db->get('tbl_business_process');
		$r = $q->result_array();
		$temp = array();
		if(!empty($r)){
			foreach ($r as $key => $w) {
				$temp[] = $w['business_process'];
			}
		}
		return $temp;
	}

	public function getProcessorDetailByID($id)
	{
		$this->db->where('fld_processor_uniq_id', $id);
		$q = $this->db->get('tbl_processors');
		$r = $q->row_array();
		return $r;
	}

}

/* End of file Processor_model.php */
/* Location: ./application/modules/admin/models/Processor_model.php */