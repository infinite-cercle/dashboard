<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {

	public function getExistingGenerators($ex = false)
	{
		if($ex){
			$cond = array();
			// Put where conditions
			if($ex['generator'] != ''){
				$generator_id = $this->encryption->decrypt(base64_decode($ex['generator']));
				$cond['s.fld_client_id'] = $generator_id;
				$this->db->select('s.fld_id as site_id, s.*, up.fld_id as user_id, up.*, c.fld_id as contact_id, c.fld_firstname as incharge_firstname,  c.fld_lastname as incharge_lastname, c.fld_email as incharge_email, c.fld_phone as incharge_contact');
			}
			if($ex['waste_type'] != ''){
				$cond['sw.fld_waste_type'] = $ex['waste_type'];
				$this->db->select('s.fld_id as site_id, s.*, up.fld_id as user_id, up.*, c.fld_id as contact_id, c.fld_firstname as incharge_firstname,  c.fld_lastname as incharge_lastname, c.fld_email as incharge_email, c.fld_phone as incharge_contact, sw.fld_waste_type as waste_type');
				$this->db->from('tbl_site_wastes as sw');
			}
		} else {
			$this->db->select('s.fld_id as site_id, s.*, up.fld_id as user_id, up.*, c.fld_id as contact_id, c.fld_firstname as incharge_firstname,  c.fld_lastname as incharge_lastname, c.fld_email as incharge_email, c.fld_phone as incharge_contact');
			// $this->db->from('tbl_sites as s');
		}
		$this->db->from('tbl_sites as s');
		$cond['up.fld_usertype'] = 2;
		$this->db->join('tbl_user_personal as up', 'up.fld_id = s.fld_client_id', 'left');
		$this->db->join('tbl_contacts as c', 'c.fld_id = s.fld_incharge_person', 'left');
		$this->db->where($cond);
		// $this->db->where('up.fld_usertype', 2);
		$q = $this->db->get();
		$r = $q->result_array();
		$temp = array();
		if(!empty($r)){
			foreach ($r as $key => $value) {
				$value['wastes_generating'] = $this->getWasteGeneratingByClient($value['site_id']);
				$temp[] = $value;
			}
		}
		return $temp;
	}

	public function getWasteGeneratingByClient($id)
	{
		$this->db->where('fld_site_id', $id);
		$q = $this->db->get('tbl_site_wastes');
		$r = $q->result_array();
		$temp = array();
		if(!empty($r)){
			foreach ($r as $key => $value) {
				$temp[] = $value['fld_waste_type'];
			}
		}
		return $temp;
	}

	public function getClientsName()
	{
		$this->db->select('DISTINCT(s.fld_client_id), s.*, up.*');
		$this->db->from('tbl_sites as s');
		$this->db->join('tbl_user_personal as up', 'up.fld_id = s.fld_client_id', 'left');
		$q = $this->db->get();
		$r = $q->result_array();
		return $r;
	}

}

/* End of file Client_model.php */
/* Location: ./application/modules/admin/models/Client_model.php */