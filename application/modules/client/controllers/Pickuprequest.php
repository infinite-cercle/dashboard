<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pickuprequest extends Client_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('site_manage');
		$this->load->model('pickup_manage');
		$this->load->model('profile_manage');
	}

	public function newrequest()
	{
		$this->mTitle = 'Trash Generator - Create New Pickup Request';
		$this->mViewData['active_main_menu'] = 'pickup';
		$this->mViewData['active_sub_menu'] = 'new_pickup';

		$this->mViewData['injector_bottom'] = array(
			'<script src="'.base_url().'assets/js/pickuprequest.js"></script>',
			'<script src="'.base_url().'lib/cleave.js/cleave.min.js"></script>',
    		'<script src="'.base_url().'lib/cleave.js/addons/cleave-phone.us.js"></script>'
		);

		if($this->input->server('REQUEST_METHOD') == 'POST'){
			
			$res = $this->pickup_manage->newPipckup($this->input->post());
			if($res){				
				$images = $this->addMultipleImages($_FILES['waste_file'], $res['pickup_id']);
				if($images){
					$this->message->custom_success_msg(CLIENT_BASE_URL.'new-pickup-request', 'New request has been raised. Notification will be sent once the processor is assigned.');
				} else {
					$this->message->custom_error_msg(CLIENT_BASE_URL.'new-pickup-request', 'Something went wrong! Please try again after sometime');
				}
			} else {
				$this->message->custom_error_msg(CLIENT_BASE_URL.'new-pickup-request', 'Something went wrong! Please try again after sometime');
			}
		}

		// Get all sites
		$this->mViewData['sites'] = $this->site_manage->getExistingSites();
		// get the contacts
		$this->mViewData['incharge_persons'] = $this->profile_manage->getAllContacts();

		$this->render('client/pickup/new_pickup_request');
	}

	public function existingrequest()
	{
		$this->mTitle = 'Trash Generator - Existing Pickup Request';
		$this->mViewData['active_main_menu'] = 'pickup';
		$this->mViewData['active_sub_menu'] = 'existing_pickup';

		// get the existing requests
		$this->mViewData['pickups'] = $this->pickup_manage->getAllPickups();

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

		$this->render('client/pickup/existing_pickup_request');
	}

	public function getSiteInfoForPickupAjax()
	{
		$siteInfo = $this->pickup_manage->getSiteDetailByIdForPickup($this->encryption->decrypt($this->input->post('siteid')));
		$this->output->set_content_type('application/json')->set_output(json_encode($siteInfo));
	}

	public function inchargeDetailAjax()
	{
		$inchargeInfo = $this->profile_manage->getContactDetailById($this->input->post('incharge'));
		unset($inchargeInfo['client_id']);
		unset($inchargeInfo['status']);
		unset($inchargeInfo['date_created']);
		unset($inchargeInfo['color_hex']);
		unset($inchargeInfo['site_id']);
		$this->output->set_content_type('application/json')->set_output(json_encode($inchargeInfo));
	}

	public function checkTimeline()
	{
		$this->mTitle = 'Trash Generator - Pickup Timline';
		$this->mViewData['active_main_menu'] = 'pickup';
		$this->mViewData['active_sub_menu'] = 'existing_pickup';

		$this->mViewData['injector_top'] = array(
			'<link href="'.base_url().'assets/css/dashforge.profile.css" rel="stylesheet">'
		);

		// Get the timeline activity
		$this->mViewData['timeline'] = $this->pickup_manage->getTimeline($this->input->get('pickup_key'));

		$this->render('client/pickup/timeline');
	}

	public function uploadImages()
	{
		$this->mTitle = 'Trash Generator - Upload Images';
		$this->mViewData['active_main_menu'] = 'pickup';
		$this->mViewData['active_sub_menu'] = 'existing_pickup';

		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$upload_dir = CLIENT_DIR;
			$pickup_key = $this->input->get('pickup_key');

			$config['upload_path']          = $upload_dir;
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 51200;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('waste_file')){
                $error = array('error' => $this->upload->display_errors());
                $this->message->custom_error_msg(CLIENT_BASE_URL.'upload-images?pickup_key='.$pickup_key, $error['error']);
            } else {
                $data = array('upload_data' => $this->upload->data());
                
                // Image manipulate
	            $imgConfig = array();
				$imgConfig['image_library']    = 'gd2';
				$imgConfig['source_image']     = $data['upload_data']['full_path'];
				/*$imgConfig['wm_type'] = 'text';
				$imgConfig['wm_text']         = 'Copyright '.date('Y').' - ThinkTrash';
				$imgConfig['wm_font_path'] = FCPATH.'assets/fonts/ibm-plex-sans/complete/ttf/IBMPlexSans-Bold.ttf';
				$imgConfig['wm_font_size']    = '18';
				$imgConfig['wm_vrt_alignment'] = 'middle';
                $imgConfig['wm_hor_alignment'] = 'center';*/
                $imgConfig['image_library'] = 'gd2';
                $imgConfig['wm_type'] = 'overlay';
                $imgConfig['wm_overlay_path'] = FCPATH.'assets/buckets/watermark.png';//the overlay image
                $imgConfig['wm_x_transp'] = 4;
                $imgConfig['wm_y_transp'] = 4;
                $imgConfig['wm_opacity'] = 20;
                $imgConfig['wm_vrt_alignment'] = 'middle';
                $imgConfig['wm_hor_alignment'] = 'center';

				$this->load->library('image_lib', $imgConfig);
				$this->image_lib->initialize($imgConfig);
				$this->image_lib->watermark(); 

                $upload_image_data = $this->pickup_manage->upload_image($data['upload_data'], $pickup_key);
                if($upload_image_data){
                	$this->message->custom_success_msg(CLIENT_BASE_URL.'upload-images?pickup_key='.$pickup_key, 'Image has been uploaded!');
                } else {
                	$this->message->custom_error_msg(CLIENT_BASE_URL.'upload-images?pickup_key='.$pickup_key, 'Something went wrong! Please try again after sometime');
                }
            }
		}

		// Injectors
		$this->mViewData['injector_top'] = array(
			'<link href="'.base_url().'assets/lightbox/css/lightbox.css" rel="stylesheet">'
		);
		$this->mViewData['injector_bottom'] = array(
			'<script src="'.base_url().'assets/lightbox/js/lightbox-plus-jquery.js"></script>'
		);

		// get existing images
		$this->mViewData['images'] = $this->pickup_manage->getExistingImages($this->input->get('pickup_key'));

		$this->render('client/pickup/upload_images.php');
	}

	public function addMultipleImages($item, $pk)
	{
		$upload_dir = CLIENT_DIR;
		$pickup_key = $pk;
		$title = 'tt';

		$config['upload_path']          = $upload_dir;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 51200;
        $config['encrypt_name'] = TRUE;

        $upload_data = array();

        $this->load->library('upload', $config);

        foreach ($item['name'] as $key => $image) {
            $_FILES['images[]']['name']= $item['name'][$key];
            $_FILES['images[]']['type']= $item['type'][$key];
            $_FILES['images[]']['tmp_name']= $item['tmp_name'][$key];
            $_FILES['images[]']['error']= $item['error'][$key];
            $_FILES['images[]']['size']= $item['size'][$key];

            $fileName = $title .'_'. $image;

            $images[] = $fileName;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
            	$upload_data[] = array('im_data' => $this->upload->data());
                $success = true;
            } else {
            	$success = false;
            }
        }
        $upload_image_data = $this->pickup_manage->upload_image_multiple_images($upload_data, $pickup_key, true);
        if($upload_image_data){
        	return true;
        } else {
        	return false;
        }
	}

	public function getInchargePersonAjax()
	{
		$site_id = $this->encryption->decrypt($this->input->post('siteid'));
		$incharge = $this->pickup_manage->getInchargePerson($site_id);
		if($incharge){
			$this->output->set_content_type('application/json')->set_output(json_encode($incharge));
		}
	}

	public function sensorAlert()
	{
		$this->mTitle = 'Trash Generator - Sensor Alert';
		$this->mViewData['active_main_menu'] = 'pickup';
		$this->mViewData['active_sub_menu'] = 'sensor';

		$this->render('client/pickup/sensor');
	}

}

/* End of file Home.php */
/* Location: ./application/modules/admin/controllers/Home.php */