<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_manage extends CI_Model {

	public function getProfile()
	{
		$this->db->where('fld_processor_id', processorid);
		$this->db->select('fld_processor_uniq_id AS processor_uniq_id, fld_dealer_name AS dealer_name, fld_address AS address, fld_email AS email, fld_contact_number AS contact_number, fld_reg_number AS reg_number, fld_gst_number AS gst_number, fld_lat AS lat, fld_lng AS lng');
		$q = $this->db->get('tbl_processors');
		$r = $q->row_array();

		$r['business_process'] = $this->getBusinessProcessById(processorid);
		$r['waste_process'] = $this->wasteProcess(processorid);

		return $r;
	}

	public function getBusinessProcessById($id)
	{
		$this->db->where('fld_processor_id', $id);
		$this->db->select('fld_business_process_id as business_process');
		$q = $this->db->get('tbl_business_process');
		$r = $q->result_array();
		$temp = array();
		if(!empty($r)){
			foreach ($r as $key => $value) {
				$temp[] = $value['business_process'];
			}
		}
		return $temp;
	}

	public function wasteProcess($id)
	{
		$this->db->where('fld_processor_id', $id);
		$this->db->select('fld_waste_type_id as waste_type_id');
		$q = $this->db->get('tbl_waste_handling');
		$r = $q->result_array();
		$temp = array();
		if(!empty($r)){
			foreach ($r as $key => $value) {
				$temp[] = $value['waste_type_id'];
			}
		}
		return $temp;
	}

	public function addNewProcesor($data)
	{
		$up = array(
			'fld_dealer_name' => $data['dealer_name'],
			'fld_address' => $data['address'],
			'fld_contact_number' => $data['phone_number'],
			'fld_reg_number' => $data['reg_number'],
			'fld_gst_number' => $data['gst_number'],
			'fld_lat' => $data['latitude'],
			'fld_lng' => $data['longitude'],
			'fld_date_added' => date('Y-m-d H:i:s'),
			'fld_status' => 1
		);
		$this->db->where('fld_processor_uniq_id', prouniqid);
		$update = $this->db->update('tbl_processors', $up);
		$processor_id = processorid;
		if($update){
			// Inseer tthe business process
			if(!empty($data['business_process'])){
				$this->db->where('fld_processor_id', $processor_id);
				$this->db->delete('tbl_business_process');
				foreach ($data['business_process'] as $key => $bpro) {
					$binsert = array( 'fld_processor_id' => $processor_id, 'fld_business_process_id' => $bpro, 'fld_date_created' => date('Y-m-d H:i:s'), 'fld_status' => 1);
					$this->db->insert('tbl_business_process', $binsert);
				}
			}
			// Insert the waste types
			if(!empty($data['waste_handeling'])){
				$this->db->where('fld_processor_id', $processor_id);
				$this->db->delete('tbl_waste_handling');
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

}

/* End of file Profile_manage.php */
/* Location: ./application/modules/processor/models/Profile_manage.php */