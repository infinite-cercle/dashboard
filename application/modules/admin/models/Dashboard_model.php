<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function getSiteCount()
	{
		$q = $this->db->get('tbl_sites');
		$rows = $q->num_rows();
		return $rows;
	}

	public function getProcessorCount()
	{
		$q = $this->db->get('tbl_processors');
		$rows = $q->num_rows();
		return $rows;
	}

}

/* End of file Dashboard_model.php */
/* Location: ./application/modules/admin/models/Dashboard_model.php */