<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_manage extends CI_Model {

	public function addNewSite($data)
	{
		$in = array(
			'fld_client_id' => userid,
			'fld_category' => $data['category'],
			'fld_location' => $data['location'],
			'fld_geo_district' => $data['district'],
			'fld_latitide' => $data['latitude'],
			'fld_longitude' => $data['longitude'],
			'fld_site_address' => $data['full_address'],
			'fld_quatity_annum' => $data['qty'],
			'fld_incharge_person' => $this->encryption->decrypt($data['incharge_person']),
			'fld_work_mail' => $data['work_email'],
			'fld_phone_number' => $data['phone_number'],
			'fld_date_created' => date('Y-m-d H:i:s'),
			'fld_status' => 1
		);
		$inserted = $this->db->insert('tbl_sites', $in);
		$site_id = $this->db->insert_id();
		if($inserted){
			foreach ($data['type_of_waste'] as $key => $waste) {
				if($waste == 'Paper'){ $wtype = 1; }
				else if($waste == 'Plastic'){ $wtype = 2; }
				else if($waste == 'Glass'){ $wtype = 3; }
				else if($waste == 'Metal'){ $wtype = 4; }
				$ins = array( 'fld_client_id' => userid, 'fld_site_id' => $site_id, 'fld_waste_type' => $wtype );
				$this->db->insert('tbl_site_wastes', $ins);
			}
			return true;
		} else {
			return false;
		}
	}

	public function getExistingSites()
	{
		$client_id = userid;
		$this->db->select('s.fld_id as site_id, s.*, c.*');
		$this->db->from('tbl_sites as s');
		$this->db->join('tbl_contacts as c', 's.fld_incharge_person = c.fld_id', 'left');	
		$this->db->where('s.fld_client_id', $client_id);
		$this->db->order_by('s.fld_id', 'desc');
		$q = $this->db->get();
		$r = $q->result_array();
		$temp = array();
		if(!empty($r)){
			foreach ($r as $key => $res) {
				// get the type of waste generated table
				$wastes = $this->getWasteGenerated($res['site_id']);
				$res['wastes'] = $wastes;
				$temp[] = $res;
			}
		}
		return $temp;
	}

	public function getWasteGenerated($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_site_wastes as sw');
		$this->db->join('tbl_waste_types as wt', 'sw.fld_waste_type = wt.fld_id', 'left');
		$this->db->where('sw.fld_site_id', $id);
		$q = $this->db->get();
		$r = $q->result_array();
		return $r;
	}

	public function getSiteDetailById($id)
	{
		$this->db->where('fld_id', $id);
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
		return $r;
	}

	public function editsite($data)
	{
		$up = array(
			'fld_client_id' => userid,
			'fld_location' => $data['location'],
			'fld_geo_district' => $data['district'],
			'fld_latitide' => $data['latitude'],
			'fld_longitude' => $data['longitude'],
			'fld_site_address' => $data['full_address'],
			'fld_quatity_annum' => $data['qty'],
			'fld_incharge_person' => $this->encryption->decrypt($data['incharge_person']),
			'fld_work_mail' => $data['work_email'],
			'fld_phone_number' => $data['phone_number']
		);
		$this->db->where('fld_id', $this->encryption->decrypt($data['key']));
		$updated = $this->db->update('tbl_sites', $up);
		$site_id = $this->encryption->decrypt($data['key']);
		if($updated){
			$this->db->where('fld_site_id', $site_id);
			$this->db->delete('tbl_site_wastes');
			if(!empty($data['type_of_waste'])){
				foreach ($data['type_of_waste'] as $key => $waste) {
					if($waste == 'Paper'){ $wtype = 1; }
					else if($waste == 'Plastic'){ $wtype = 2; }
					else if($waste == 'Glass'){ $wtype = 3; }
					else if($waste == 'Metal'){ $wtype = 4; }
					$ins = array( 'fld_client_id' => userid, 'fld_site_id' => $site_id, 'fld_waste_type' => $wtype );
					$this->db->insert('tbl_site_wastes', $ins);
				}
			}
			return true;
		} else {
			return false;
		}
	}

}

/* End of file site_manage.php */
/* Location: ./application/modules/client/models/site_manage.php */