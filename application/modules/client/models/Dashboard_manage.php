<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_manage extends CI_Model {

	public function getSiteCount()
	{
		$cond = array( 'fld_client_id' => userid, 'fld_status' => 1 );
		$this->db->where($cond);
		$q = $this->db->get('tbl_sites');
		$count = $q->num_rows();
		return $count;
	}

	public function getContactsCount()
	{
		$cond = array( 'fld_client_id' => userid, 'fld_status' => 1 );
		$this->db->where($cond);
		$q = $this->db->get('tbl_contacts');
		$count = $q->num_rows();
		return $count;
	}

	public function getSiteMarkers()
	{
		$cond = array( 'fld_client_id' => userid, 'fld_status' => 1 );
		$this->db->select('fld_id as id, fld_client_id as client_id, fld_location as location, fld_geo_district as geo_district, fld_latitide as latitide, fld_longitude as longitude, fld_site_address as site_address, fld_quatity_annum as quatity_annum, fld_incharge_person as incharge_person, fld_work_mail as work_mail, fld_phone_number as phone_number, fld_date_created as date_created, fld_status as status');
		$this->db->where($cond);
		$q = $this->db->get('tbl_sites');
		$r = $q->result_array();
		return $r;
	}

}

/* End of file dashboard_manage.php */
/* Location: ./application/modules/client/models/dashboard_manage.php */