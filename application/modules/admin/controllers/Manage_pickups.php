<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_pickups extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pickup_model');
	}

	public function approval()
	{
		$this->mTitle = 'Pickup Approvals';
		$this->mViewData['active_main_menu'] = 'pickup';
		$this->mViewData['active_sub_menu'] = 'approval';

		$this->mViewData['pickups'] = $this->pickup_model->getRequestsToApproval();

		// Injectors
		$this->mViewData['injector_top'] = array(
			'<link href="'.base_url().'lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">',
			'<link href="'.base_url().'lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">'
		);
		$this->mViewData['injector_bottom'] = array(
			'<script src="'.base_url().'lib/datatables.net/js/jquery.dataTables.min.js"></script>',
		    '<script src="'.base_url().'lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>',
		    '<script src="'.base_url().'lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>',
		    '<script src="'.base_url().'lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>',
		    '<script src="'.base_url().'assets/js/pickup_approval_function.js"></script>'
		);

		$this->render('pickup/approval');
	}

	public function getAssignedStatus()
	{
		$pickup_id = $this->input->post('pickup_id');
	}

	public function allRequests()
	{
		$this->mTitle = 'Pickup Approvals';
		$this->mViewData['active_main_menu'] = 'pickup';
		$this->mViewData['active_sub_menu'] = 'all_requests';

		$this->mViewData['pickups'] = $this->pickup_model->getRequestsToApproval();

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

		$this->render('pickup/all_requests');
	}

	public function timeline()
	{
		$this->mTitle = 'Trash Generator - Pickup Timline';
		$this->mViewData['active_main_menu'] = 'pickup';
		$this->mViewData['active_sub_menu'] = 'approval';

		$this->mViewData['injector_top'] = array(
			'<link href="'.base_url().'assets/css/dashforge.profile.css" rel="stylesheet">'
		);

		// Get the timeline activity
		$this->mViewData['timeline'] = $this->pickup_model->getTimeline($this->input->get('pickup_key'));

		$this->render('admin/pickup/timeline');
	}

	public function images()
	{
		$this->mTitle = 'Trash Generator - Images';
		$this->mViewData['active_main_menu'] = 'pickup';
		$this->mViewData['active_sub_menu'] = 'approval';

		// Injectors
		$this->mViewData['injector_top'] = array(
			'<link href="'.base_url().'assets/lightbox/css/lightbox.css" rel="stylesheet">'
		);
		$this->mViewData['injector_bottom'] = array(
			'<script src="'.base_url().'assets/lightbox/js/lightbox-plus-jquery.js"></script>'
		);

		// get existing images
		$this->mViewData['images'] = $this->pickup_model->getExistingImages($this->input->get('pickup_key'));

		$this->render('admin/pickup/images.php');
	}

	public function approveConfirm()
	{
		$this->mTitle = 'Trash Generator - Images';
		$this->mViewData['active_main_menu'] = 'pickup';
		$this->mViewData['active_sub_menu'] = 'approval';

		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$assign = $this->pickup_model->makeApprove($this->input->post(), $this->input->get('pickup_key'));
			if($assign){
				$this->message->custom_success_msg(ADMIN_BASE_URL.'pickup-approval', 'Pickup has been successfully assigned to the processor.');
			}
		}

		// Get the all wholesellers
		$this->mViewData['processors'] = $this->pickup_model->getProcessors();
		// Get pickup details
		$this->mViewData['pickup_detail'] = $this->pickup_model->getPickupDetailById($this->input->get('pickup_key'));
		// Get the existing assign
		$this->mViewData['existing_assign'] = $this->pickup_model->getExistingAssignCount($this->input->get('pickup_key'));

		$this->render('admin/pickup/make_approve');
	}

	public function AjaxGetPickupDetails()
	{
		$pickup_id = $this->input->post('pickup_id');
		$pickup_details = $this->pickup_model->getPickupDetailById($pickup_id);
		$assign_details = $this->pickup_model->getAssignDetails($pickup_id);
		$data = array( 'pickup_details' => $pickup_details, 'assign_details' => $assign_details );
		if($pickup_details){
			$response = array(
				'key' => 200,
				'data' => $data
			);
		} else {
			$response = array(
				'key' => 201
			);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function carbonFootprints()
	{
		$this->mTitle = 'Trash Generator - Carbon footprints';
		$this->mViewData['active_main_menu'] = 'pickup';
		$this->mViewData['active_sub_menu'] = 'approval';

		$assign_key = $this->input->get('assign_key');
		$this->mViewData['cf_data'] = array();
		$this->mViewData['cf_data']['fld_distance_travelled'] = '';
		$this->mViewData['cf_data']['fld_trucks'] = '';
		$this->mViewData['cf_data']['fld_transport_cf'] = '';
		$this->mViewData['cf_data']['fld_balling_cf'] = '';
		$this->mViewData['cf_data']['fld_recycling_cf'] = '';
		$this->mViewData['cf_data']['fld_total_cf'] = '';

		$this->mViewData['injector_bottom'] = array(
			'<script src="'.base_url().'assets/js/carbon_footprint.js"></script>'
		);

		/*if($this->input->server('REQUEST_METHOD') == 'POST'){
			$assign = $this->pickup_model->makeApprove($this->input->post(), $this->input->get('pickup_key'));
			if($assign){
				$this->message->custom_success_msg(ADMIN_BASE_URL.'pickup-approval', 'Pickup has been successfully assigned to the processor.');
			}
		}*/

		// get existing CF
		$this->mViewData['cf_data'] = $this->pickup_model->getExistingCF($this->input->get('assign_key'));

		// get the quantity
		$this->mViewData['assignDetails'] = $this->pickup_model->getAssignDetailsByAssignKey($assign_key);

		$this->render('admin/pickup/carbon_footprints');
	}

	public function AjaxSaveCarbonFootPrints()
	{
		// Save carbon footprints
		$resposne = $this->pickup_model->saveCarbonFootprints($this->input->post());
		if($resposne){
			$this->output->set_content_type('application/json')->set_output(json_encode(['key' => 200, 'message' => 'success']));
		} else {
			$this->output->set_content_type('application/json')->set_output(json_encode(['key' => 201, 'message' => 'failed']));
		}
	}

}

/* End of file Manage_pickups.php */
/* Location: ./application/modules/admin/controllers/Manage_pickups.php */