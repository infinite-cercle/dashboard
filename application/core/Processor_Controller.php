<?php

/**
 * Base Controller for Admin module
 */
class Processor_Controller extends MY_Controller {
	// Constructor
	public function __construct()
	{
		parent::__construct();
		// Check the user type is only 4
		// get user type
		$user_ref = $this->session->userdata('ref_user');
		if($user_ref['user_type'] != '4'){
			$this->session->unset_userdata('ref_user');
			redirect(base_url(),'refresh');
		}
		define('usertoken', $user_ref['ref_token']);
		define('usertype', $user_ref['user_type']);
		$this->getUserid();
		$this->getProcessorId();
		$this->getProfileComplete();
	}
	// Render template (override parent)
	public function render($view_file, $layout = 'default')
	{
		parent::render_processor($view_file);
	}

	public function getUserid()
	{
		$this->db->where('fld_token', usertoken);
		$q = $this->db->get('tbl_user_log');
		$r = $q->row_array();
		define('userid', $r['fld_userid']);
		define('notificationtoken', $r['fld_notification_token']);
	}

	public function getProcessorId()
	{
		$this->db->where('fld_processor_log_id', userid);
		$q = $this->db->get('tbl_processors');
		$r = $q->row_array();
		define('processorid', $r['fld_processor_id']);
		define('prouniqid', $r['fld_processor_uniq_id']);
	}

	public function getProfileComplete()
	{
		$this->db->where('fld_processor_id', processorid);
		$q = $this->db->get('tbl_processors');
		$r = $q->row_array();
		// incompleted items
		$incompleted  = array();
		
		if($r['fld_contact_number'] == 0){ $incompleted[] = 'mobile'; }
		if($r['fld_reg_number'] == ''){ $incompleted[] = 'reg_number'; }
		if($r['fld_gst_number'] == ''){ $incompleted[] = 'gst_number'; }
		if($r['fld_lat'] == '' && $r['fld_lng'] == ''){ $incompleted[] = 'lat_lng'; }

		$this->mViewData['profile_complete'] = $incompleted;
	}

}