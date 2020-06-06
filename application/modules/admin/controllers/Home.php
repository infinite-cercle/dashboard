<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
		$this->load->model('report_model');
	}

	public function index()
	{
		$this->mTitle = 'Dashboard';
		$this->mViewData['active_main_menu'] = 'dashboard';

		$this->mViewData['injector_bottom'] = array(
			'<script src="http://maps.google.com/maps/api/js?sensor=false"></script>',
			'<script src="'.base_url().'lib/gmaps/gmaps.min.js"></script>',
			'<script src="'.base_url().'assets/js/custom-map.js"></script>',
		);

		$this->mViewData['total_sites'] = $this->dashboard_model->getSiteCount();
		$this->mViewData['total_processors'] = $this->dashboard_model->getProcessorCount();

		// Total Waste qty
		$this->mViewData['total_qty'] = $this->report_model->getTotalQty();

		$this->render('dashboard');
	}

	public function logout()
	{
		$this->session->unset_userdata('ref_user');
		$this->message->loginsucess(base_url(), 'You have logged out succesfully!');
	}

	public function faq()
	{
		$this->mTitle = 'Frequestly Asked Questions';
		$this->mViewData['active_main_menu'] = 'faq';

		$this->render('common/faq');
	}

}

/* End of file Home.php */
/* Location: ./application/modules/admin/controllers/Home.php */