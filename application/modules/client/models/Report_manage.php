<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_manage extends CI_Model {

	public function getAllSites()
	{
		$this->db->where('fld_client_id', userid);
		$q = $this->db->get('tbl_sites');
		$r = $q->result_array();
		return $r;
	}

	public function getTotalQty($site = false)
	{
		if($site){
			$this->db->where('fld_site_id', $site);
			$this->db->select_sum('fld_qty');
			$q = $this->db->get('tbl_pickup_requests');
			$r = $q->row_array();
			return $r['fld_qty'];
		} else {
			$this->db->where('fld_client_id', userid);
			$this->db->select_sum('fld_qty');
			$q = $this->db->get('tbl_pickup_requests');
			$r = $q->row_array();
			return $r['fld_qty'];
		}
	}

	public function getAllPickups()
	{
		$this->db->select('pr.*, s.fld_location, s.fld_geo_district, s.fld_latitide, s.fld_longitude, s.fld_site_address, s.fld_quatity_annum, s.fld_incharge_person, s.fld_work_mail, s.fld_phone_number');
		$this->db->from('tbl_pickup_requests as pr');
		$this->db->join('tbl_sites as s', 's.fld_id = pr.fld_site_id', 'left');
		$this->db->where('pr.fld_client_id', userid);
		$this->db->order_by('pr.fld_id', 'desc');
		$q = $this->db->get();
		$r = $q->result_array();
		return $r;
	}

}

/* End of file Report_manage.php */
/* Location: ./application/modules/client/models/Report_manage.php */