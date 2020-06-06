<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Client_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_manage');
		// called from the /applications/core/Client_Controller.php 
		// $this->getprofileComplete();
	}

	public function index()
	{
		$this->mTitle = 'Trash Generator - Profile';
		$this->mViewData['active_main_menu'] = 'profile';
		$this->mViewData['active_sub_menu'] = 'profile';

		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$res = $this->profile_manage->updateProfile($this->input->post());
			if($res){
				$this->message->custom_success_msg(CLIENT_BASE_URL.'profile', 'Your profile has been updated!');
			} else {
				$this->message->custom_success_msg(CLIENT_BASE_URL.'contacts', 'Profile cannot be updated. Please try again after sometime!');
			}
		}

		// get the personal details
		$this->mViewData['form_data'] = $this->profile_manage->getClientBasicProfile();

		$this->render('client/profile/profile');
	}

	public function contacts()
	{
		$this->mTitle = 'Trash Generator - Contacts';
		$this->mViewData['active_main_menu'] = 'profile';
		$this->mViewData['active_sub_menu'] = 'contacts';

		if($this->input->server('REQUEST_METHOD') == 'POST'){
			if(!$this->input->post('con_id')){
				$formData = $this->input->post();
				$formData['color_hex'] = $this->rand_color();
				// Add to contact
				$res = $this->profile_manage->addContacts($formData);
				if($res){
					$this->message->custom_success_msg(CLIENT_BASE_URL.'contacts', 'Your contacts has been added!');
				} else {
					$this->message->custom_error_msg(CLIENT_BASE_URL.'contacts', 'Something went wrong! Please try again after sometime');
				}
			} else if($this->input->post('con_id')){
				$formData = $this->input->post();
				$res = $this->profile_manage->editContacts($formData);
				if($res){
					$this->message->custom_success_msg(CLIENT_BASE_URL.'contacts', 'Your contacts has been updated!');
				} else {
					$this->message->custom_error_msg(CLIENT_BASE_URL.'contacts', 'Something went wrong! Please try again after sometime');
				}
			}
		}

		// get all the contacts
		$this->mViewData['contacts'] = $this->profile_manage->getAllContacts();

		$this->mViewData['injector_top'] = array(
			'<link href="'.base_url().'assets/css/dashforge.contacts.css" rel="stylesheet">'
		);
		$this->mViewData['injector_bottom'] = array(
			'<script src="'.base_url().'assets/js/dashforge.contacts.js"></script>'
		);

		$this->render('client/profile/contacts');
	}

	public function rand_color() {
	    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
	}

	public function getContactinfoAjax()
	{
		$res = $this->profile_manage->getContactDetailById($this->input->post('contactid'));
		if(!empty($res)){
			$response = array(
				'key' => 200,
				'data' => $res
			);
		} else {
			$response = array(
				'key' => 201
			);
		}
		return $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

}

/* End of file Profile.php */
/* Location: ./application/modules/client/controllers/Profile.php */