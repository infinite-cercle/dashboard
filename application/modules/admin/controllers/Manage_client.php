<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_client extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('client_model');
	}

	public function addClient()
	{
		$this->mTitle = 'Add New Clients';
		$this->mViewData['active_main_menu'] = 'client';
		$this->mViewData['active_sub_menu'] = 'add_client';

		
		$this->render('clients/add_new_client');
	}

	public function existingClients()
	{
		$this->mTitle = 'Add New Clients';
		$this->mViewData['active_main_menu'] = 'client';
		$this->mViewData['active_sub_menu'] = 'existing_clients';

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

		// Get data
		$this->mViewData['get_param'] = array();

		// GET Existing generators list
		if($this->input->server('REQUEST_METHOD') == 'GET' && $this->input->get('filter')){
			$this->mViewData['get_param'] = $this->input->get();
			$this->mViewData['generators'] = $this->client_model->getExistingGenerators($this->input->get());
		} else {
			$this->mViewData['generators'] = $this->client_model->getExistingGenerators();
		}

		// get the clients
		$this->mViewData['clients'] = $this->client_model->getClientsName();

		/*echo "<pre>";
		print_r($this->mViewData['generators']);
		echo "</pre>";
		exit;*/

		$this->render('clients/existing_clients');
	}

}

/* End of file Home.php */
/* Location: ./application/modules/admin/controllers/Home.php */