<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pickuprequest extends Processor_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pickup_model');
	}

	public function existing()
	{
		$this->mTitle = 'Processor - Existing Pickup Request';
		$this->mViewData['active_main_menu'] = 'pickup';
		$this->mViewData['active_sub_menu'] = 'existing_pickup';

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

		// get all pickup requests
		$this->mViewData['pickups'] = $this->pickup_model->getAllPickups();

		$this->render('processor/pickup/existing_pickup_request');
	}

	public function images()
	{
		$this->mTitle = 'Trash Generator - Images';
		$this->mViewData['active_main_menu'] = 'pickup';
		$this->mViewData['active_sub_menu'] = 'existing_pickup';

		// Injectors
		$this->mViewData['injector_top'] = array(
			'<link href="'.base_url().'assets/lightbox/css/lightbox.css" rel="stylesheet">'
		);
		$this->mViewData['injector_bottom'] = array(
			'<script src="'.base_url().'assets/lightbox/js/lightbox-plus-jquery.js"></script>'
		);

		// get existing images
		$this->mViewData['images'] = $this->pickup_model->getExistingImages($this->input->get('pickup_key'));

		$this->render('processor/pickup/images');
	}

	public function timeline()
	{
		$this->mTitle = 'Processor - Processing Timline';
		$this->mViewData['active_main_menu'] = 'pickup';
		$this->mViewData['active_sub_menu'] = 'existing_pickup';

		$this->mViewData['injector_top'] = array(
			'<link href="'.base_url().'assets/css/dashforge.profile.css" rel="stylesheet">'
		);

		// Get the timeline activity
		$this->mViewData['timeline'] = $this->pickup_model->getTimeline($this->input->get('pickup_key'));

		$this->render('processor/pickup/timeline');
	}

	public function viewProcess()
	{
		$this->mTitle = 'Processor - View Process';
		$this->mViewData['active_main_menu'] = 'pickup';
		$this->mViewData['active_sub_menu'] = 'existing_pickup';

		$this->mViewData['injector_bottom'] = array(
			'<script src="'.base_url().'assets/js/view_process.js"></script>'
		);

		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$res = $this->pickup_model->addStatus($this->input->post());
			if($res){
				$this->message->custom_success_msg(PROCESSOR_BASE_URL.'view-process', 'Your pickup status has been changed successfully!');
			} else {
				$this->message->custom_error_msg(PROCESSOR_BASE_URL.'view-process', 'Something went wrong! Please try again after sometime');
			}
		}

		// get the pickup and process details
		$assign_details = $this->pickup_model->getPickupAssign($this->input->get('assign_key'));
		$pickup_id = $assign_details['fld_pickup_uq_id'];
		$this->mViewData['assign_details'] = $assign_details;

		$this->render('processor/pickup/view_process');
	}

}

/* End of file Pickuprequest.php */
/* Location: ./application/modules/processor/controllers/Pickuprequest.php */