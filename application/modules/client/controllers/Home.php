<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Client_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_manage');
		$this->load->model('report_manage');
	}

	public function index()
	{
		$this->mTitle = 'Trash Generator - Dashboard';
		$this->mViewData['active_main_menu'] = 'dashboard';

		$this->mViewData['injector_top'] = array(
		    '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD996aDrNrwCXj_h781rDVf2oUhEFFYsR4&libraries=geometry"></script>'
		);

		$this->mViewData['injector_bottom'] = array(
			'<script src="'.base_url().'assets/js/dashboard_map.js"></script>',
		);

		// Get the all counts
		// Branch count
		$this->mViewData['totalsites'] = $this->dashboard_manage->getSiteCount();
		$this->mViewData['totalcontacts'] = $this->dashboard_manage->getContactsCount();

		// get total quantity generated
		$this->mViewData['total_qty'] = $this->report_manage->getTotalQty();

		$this->render('client/dashboard');
	}

	public function logout()
	{
		$this->session->unset_userdata('ref_user');
		$this->message->loginsucess(base_url(), 'You have logged out succesfully!');
	}

	public function getSiteMarkers()
	{
		$r = $this->dashboard_manage->getSiteMarkers();
		if(!empty($r)){
			$res = array( 'key' => 200, 'data' => $r );
		} else {
			$res = array( 'key' => 201 );
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($res));
	}

	public function faq()
	{
		$this->mTitle = 'Frequestly Asked Questions';
		$this->mViewData['active_main_menu'] = 'faq';

		$this->render('common/faq');
	}

	public function notifications()
	{
		$this->mTitle = 'Trash Generator - Notifications';
		$this->mViewData['active_main_menu'] = 'notifications';

		$this->render('client/common/notifications');
	}

}

/* End of file Home.php */
/* Location: ./application/modules/admin/controllers/Home.php */