<?php

/**
 * Base Controller for Client module
 */
class Client_Controller extends MY_Controller {
	// Constructor
	public function __construct()
	{
		parent::__construct();
		// Check the user type is only 2
		// get user type
		$user_ref = $this->session->userdata('ref_user');
		if($user_ref['user_type'] != '2'){
			$this->session->unset_userdata('ref_user');
			redirect(base_url(),'refresh');
		}
		define('usertoken', $user_ref['ref_token']);
		define('usertype', $user_ref['user_type']);
		$this->getUserid();
	}
	// Render template (override parent)
	public function render($view_file, $layout = 'default')
	{
		parent::render_client($view_file);
	}

	public function getUserid()
	{
		$this->db->where('fld_token', usertoken);
		$q = $this->db->get('tbl_user_log');
		$r = $q->row_array();
		define('userid', $r['fld_userid']);
		define('notificationtoken', $r['fld_notification_token']);
	}

	public function getprofileComplete()
	{
		// db get profile completed or not
		$this->db->where('fld_id', userid);
		$q = $this->db->get('tbl_user_personal');
		$r = $q->row_array();
		if(!empty($r)){
			if($r['fld_steps_completed'] == 1){
				redirect(CLIENT_BASE_URL.'complete-your-profile','refresh');
			}
		}
	}

}