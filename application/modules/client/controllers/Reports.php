<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends Client_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('report_manage');
	}

	public function siteReport()
	{
		$this->mTitle = 'Trash Generator - Site Reports';
		$this->mViewData['active_main_menu'] = 'reports';
		$this->mViewData['active_sub_menu'] = 'site_report';

		$this->mViewData['post_data'] = '';

		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$this->mViewData['post_data'] = $this->input->post('site');
			$site_id = $this->encryption->decrypt($this->input->post('site'));

			// Get all sites under the cliet
			$this->mViewData['sites_list'] = $this->report_manage->getAllSites();
			// get total quantity generated
			$this->mViewData['total_qty'] = $this->report_manage->getTotalQty($site_id);
		} else {
			// Get all sites under the cliet
			$this->mViewData['sites_list'] = $this->report_manage->getAllSites();
			// get total quantity generated
			$this->mViewData['total_qty'] = $this->report_manage->getTotalQty();
		}


		$this->render('client/reports/site_reports');
	}

	public function carbonFootprints()
	{
		$this->mTitle = 'Carbon Footprint Reports';
		$this->mViewData['active_main_menu'] = 'reports';
		$this->mViewData['active_sub_menu'] = 'carbon_footprint';

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
		    '<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>',
			'<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>',
			'<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>',
			'<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>',
			'<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>',
			'<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>',
			'<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>'
		);

		// Get app pickups
		$this->mViewData['pickups'] = $this->report_manage->getAllPickups();

		$this->render('client/reports/carbon_footprints');
	}

}

/* End of file Reports.php */
/* Location: ./application/modules/client/controllers/Reports.php */