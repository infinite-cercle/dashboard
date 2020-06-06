<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_processors extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('processor_model');
	}

	public function addNewProcessor()
	{
		$this->mTitle = 'Add New Processor';
		$this->mViewData['active_main_menu'] = 'processor';
		$this->mViewData['active_sub_menu'] = 'add_processor';

		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$res = $this->processor_model->addNewProcesor($this->input->post());
			if($res){
				$this->message->custom_success_msg(ADMIN_BASE_URL.'add-new-processor', 'Processor has been added successfully!');
			} else {
				$this->message->custom_error_msg(ADMIN_BASE_URL.'add-new-processor', 'Something went wrong! Please try again after sometime');
			}
		}

		$this->mViewData['injector_top'] = array(
		    '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD996aDrNrwCXj_h781rDVf2oUhEFFYsR4&libraries=geometry,places"></script>'
		);

		$this->mViewData['injector_bottom'] = array(
		    '<script src="'.base_url().'assets/js/add_new_processor.js"></script>'
		);
		
		$this->render('processors/add_new_processor');
	}

	public function existingProcessors()
	{
		$this->mTitle = 'Existing Processors';
		$this->mViewData['active_main_menu'] = 'processor';
		$this->mViewData['active_sub_menu'] = 'existing_processors';

		// get existing processors
		$this->mViewData['processors'] = $this->processor_model->getExistingprocessors();

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

		$this->render('processors/existing_processors');
	}

}

/* End of file Manage_processors.php */
/* Location: ./application/modules/admin/controllers/Manage_processors.php */