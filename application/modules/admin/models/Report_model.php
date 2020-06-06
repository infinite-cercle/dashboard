<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

	public function getTotalQty($site = false)
	{
		if($site){
			// $this->db->where('fld_site_id', $site);
			$this->db->select_sum('fld_qty');
			$q = $this->db->get('tbl_pickup_requests');
			$r = $q->row_array();
			return $r['fld_qty'];
		} else {
			// $this->db->where('fld_client_id', userid);
			$this->db->select_sum('fld_qty');
			$q = $this->db->get('tbl_pickup_requests');
			$r = $q->row_array();
			return $r['fld_qty'];
		}
	}

}

/* End of file Report_model.php */
/* Location: ./application/modules/admin/models/Report_model.php */