<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Processor_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_manage');
	}

	public function own()
	{
		$this->mTitle = 'ThinkTrash Processor - Complete YOur Profile';
		$this->mViewData['active_main_menu'] = 'profile';
		$this->mViewData['active_sub_menu'] = 'profile';

		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$res = $this->profile_manage->addNewProcesor($this->input->post());
			if($res){
				$this->message->custom_success_msg(PROCESSOR_BASE_URL.'profile', 'Your profile has been updated successfully!');
			} else {
				$this->message->custom_error_msg(PROCESSOR_BASE_URL.'profile', 'Something went wrong! Please try again after sometime');
			}
		}

		$this->mViewData['injector_top'] = array(
		    '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD996aDrNrwCXj_h781rDVf2oUhEFFYsR4&libraries=geometry,places"></script>'
		);

		$this->mViewData['injector_bottom'] = array(
		    '<script src="'.base_url().'assets/js/add_new_processor.js"></script>'
		);

		// get the own profile
		$this->mViewData['profile'] = $this->profile_manage->getProfile();

		$this->render('processor/profile/profile');
	}

}

/* End of file Profile.php */
/* Location: ./application/modules/processor/controllers/Profile.php */