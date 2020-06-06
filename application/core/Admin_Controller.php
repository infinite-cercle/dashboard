<?php

/**
 * Base Controller for Admin module
 */
class Admin_Controller extends MY_Controller {
	// Constructor
	public function __construct()
	{
		parent::__construct();
		// Check the user type is only 1
		// get user type
		$user_ref = $this->session->userdata('ref_user');
		if($user_ref['user_type'] != '1'){
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
		parent::render_admin($view_file);
	}

	public function getUserid()
	{
		$this->db->where('fld_token', usertoken);
		$q = $this->db->get('tbl_user_log');
		$r = $q->row_array();
		define('userid', $r['fld_userid']);
		define('notificationtoken', $r['fld_notification_token']);
	}

}