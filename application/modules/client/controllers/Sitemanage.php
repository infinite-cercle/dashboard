<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemanage extends Client_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_manage');
		$this->load->model('site_manage');
	}

	public function add()
	{
		$this->mTitle = 'Trash Generator - Add New Site';
		$this->mViewData['active_main_menu'] = 'sites';
		$this->mViewData['active_sub_menu'] = 'add_site';

		$this->mViewData['injector_top'] = array(
		    '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD996aDrNrwCXj_h781rDVf2oUhEFFYsR4&libraries=geometry,places"></script>'
		);

		if($this->input->server('REQUEST_METHOD') == 'POST'){
			// Add new Client
			$res = $this->site_manage->addNewSite($this->input->post());
			if($res){
				$this->message->custom_success_msg(CLIENT_BASE_URL.'add-new-site', 'Site has been added successfully!');
			} else {
				$this->message->custom_error_msg(CLIENT_BASE_URL.'add-new-site', 'Something went wrong! Please try again after sometime');
			}
		}

		$this->mViewData['contacts'] = $this->profile_manage->getAllContacts();

		$this->render('client/site/add_new_site');
	}

	public function existing()
	{
		$this->mTitle = 'Trash Generator - Existing Site';
		$this->mViewData['active_main_menu'] = 'sites';
		$this->mViewData['active_sub_menu'] = 'existing_site';

		// Get existing Sites
		$this->mViewData['existing_sites'] = $this->site_manage->getExistingSites();

		// Injectors
		$this->mViewData['injector_top'] = array(
			'<link href="'.base_url().'lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">',
			'<link href="'.base_url().'lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">'
		);
		$this->mViewData['injector_bottom'] = array(
			'<script src="'.base_url().'lib/datatables.net/js/jquery.dataTables.min.js"></script>',
		    '<script src="'.base_url().'lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>',
		    '<script src="'.base_url().'lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>',
		    '<script src="'.base_url().'lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>'
		);

		$this->render('client/site/existing_site');
	}

	public function viewsite()
	{
		$this->mTitle = 'Trash Generator - Edit Site';
		$this->mViewData['active_main_menu'] = 'sites';
		$this->mViewData['active_sub_menu'] = 'existing_site';

		$this->mViewData['injector_top'] = array(
		    '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD996aDrNrwCXj_h781rDVf2oUhEFFYsR4&libraries=places"></script>'
		);

		if($this->input->server('REQUEST_METHOD') == 'POST'){
			// Add new Client
			$res = $this->site_manage->editsite($this->input->post());
			if($res){
				$this->message->custom_success_msg(CLIENT_BASE_URL.'existing-site', 'Site has been updated successfully!');
			} else {
				$this->message->custom_error_msg(CLIENT_BASE_URL.'existing-site', 'Something went wrong! Please try again after sometime');
			}
		}

		$this->mViewData['contacts'] = $this->profile_manage->getAllContacts();

		$enc_key = base64_decode($this->input->get('sitekey'));
		$key = $this->encryption->decrypt($enc_key);

		// Ge the site details
		// site id is $key
		$this->mViewData['sitedata'] = $this->site_manage->getSiteDetailById($key);

		$this->render('client/site/edit_site');
	}

}

/* End of file Home.php */
/* Location: ./application/modules/admin/controllers/Home.php */