<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_manage extends CI_Model {

	private $userid;

	public function __construct()
	{
		parent::__construct();
		// Get user id from the user token
		$this->db->where('fld_token', usertoken);
		$userGet = $this->db->get('tbl_user_log');
		$userRow = $userGet->row_array();
		$this->userid = $userRow['fld_userid'];
	}

	public function getClientBasicProfile()
	{
		$this->db->where('fld_id', $this->userid);
		$q = $this->db->get('tbl_user_personal');
		$r = $q->row_array();
		if(!empty($r)){
			return $r;
		} else {
			return false;
		}
	}

	public function addContacts($data)
	{
		$in = array(
			'fld_client_id' => userid,
			'fld_firstname' => $data['firstname'],
			'fld_lastname' => $data['lastname'],
			'fld_address1' => $data['address_1'],
			'fld_address2' => $data['address_2'],
			'fld_designation' => $data['designation'],
			'fld_email' => $data['email'],
			'fld_phone' => $data['phone_number'],
			'fld_notes' => $data['notes'],
			'fld_is_deleted' => 0,
			'fld_image_path' => '',
			'fld_color_hex' => $data['color_hex'],
			'fld_date_created' => date('Y-m-d H:i:s'),
			'fld_status' => 1
		);
		$inserted = $this->db->insert('tbl_contacts', $in);
		if($inserted){
			return true;
		} else {
			return false;
		}
	}

	public function getAllContacts()
	{
		$this->db->where('fld_client_id', userid);
		$this->db->order_by('fld_firstname', 'asc');
		$q = $this->db->get('tbl_contacts');
		$r = $q->result_array();
		return $r;
	}

	public function getContactDetailById($id)
	{
		$contactid = $this->encryption->decrypt($id);
		$this->db->select('fld_id as id, fld_client_id as client_id, fld_site_id as site_id, fld_firstname as firstname, fld_lastname as lastname, fld_address1 as address1, fld_address2 as address2, fld_designation as designation, fld_email as email, fld_phone as phone, fld_notes as notes, fld_is_deleted as is_deleted, fld_image_path as image_path, fld_color_hex as color_hex, fld_date_created as date_created, fld_status as status');
		$this->db->where('fld_id', $contactid);
		$q = $this->db->get('tbl_contacts');
		$r = $q->row_array();
		$r['id'] = $this->encryption->encrypt($r['id']);
		return $r;
	}

	public function editContacts($data)
	{
		$up = array(
			'fld_firstname' => $data['firstname'],
			'fld_lastname' => $data['lastname'],
			'fld_address1' => $data['address_1'],
			'fld_address2' => $data['address_2'],
			'fld_designation' => $data['designation'],
			'fld_email' => $data['email'],
			'fld_phone' => $data['phone_number'],
			'fld_notes' => $data['notes']
		);
		$this->db->where('fld_id', $this->encryption->decrypt($data['con_id']));
		$q = $this->db->update('tbl_contacts', $up);
		if($q){
			return true;
		} else {
			return false;
		}
	}

	public function updateProfile($d)
	{
		$up = array(
			'fld_firstname' => $d['firstname'],
			'fld_lastname' => $d['lastname'],
			'fld_company' => $d['company'],
			'fld_designation' => $d['designation']
		);
		$this->db->where('fld_id', userid);
		$updated = $this->db->update('tbl_user_personal', $up);
		if($updated){
			return true;
		} else {
			return false;
		}
	}

}

/* End of file profile_manage.php */
/* Location: ./application/modules/client/models/profile_manage.php */