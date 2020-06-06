<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Processor_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if(!empty($this->mViewData['profile_complete'])){
			redirect(PROCESSOR_BASE_URL.'profile','refresh');
		}
		$this->mTitle = 'ThinkTrash Processor - Dashboard';
		$this->mViewData['active_main_menu'] = 'dashboard';

		$this->mViewData['injector_bottom'] = array(
			'<script src="http://maps.google.com/maps/api/js?sensor=false"></script>',
			'<script src="'.base_url().'lib/gmaps/gmaps.min.js"></script>',
			'<script src="'.base_url().'assets/js/custom-map.js"></script>',
		);

		$this->render('processor/dashboard');
	}

	public function logout()
	{
		$this->session->unset_userdata('ref_user');
		$this->message->loginsucess(base_url(), 'You have logged out succesfully!');
	}

}

/* End of file Home.php */
/* Location: ./application/modules/admin/controllers/Home.php */