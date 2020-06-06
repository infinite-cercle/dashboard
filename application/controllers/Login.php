<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('auth_manage');
        if($this->session->userdata('ref_user')){
        	$user = $this->session->userdata('ref_user');
        	$type = $user['user_type'];
        	if($type == '1'){
        		redirect('administrator/dashboard','refresh');
        	} else if($type == '2'){
        		redirect('think-trash-generator/dashboard','refresh');
        	} else if($type == '3'){
        		redirect('pre-processor/dashboard','refresh');
        	} else if($type == '4'){
        		redirect('think-trash-processor/dashboard','refresh');
        	}
        }
    }

	public function index()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST'){
			// Check for authentication
			$auth = $this->auth_manage->check_credentials($this->input->post());
			if($auth){
				$user_auth = $this->session->userdata('ref_user');
				if($user_auth['user_type'] == 1){
					$this->message->loginsucess('administrator/dashboard', 'Welcome back to administrator dashboard!');
				} else if($user_auth['user_type'] == 2){
					$this->message->loginsucess('think-trash-generator/dashboard', 'Welcome back to Generator dashboard!');
				} else if($user_auth['user_type'] == 4){
					$this->message->loginsucess('think-trash-processor/dashboard', 'Welcome back to Processor dashboard!');
				}
			} else {
				$this->message->custom_error_msg(base_url(), 'You have enterd wrond credentials. Please enter valid credentials or contact our administrator');
			}
		}
		$this->load->view('login');
	}

	public function signup()
	{
		if($this->session->flashdata('form_flash')){
			$data['form_data'] = $this->session->flashdata('form_flash');
		} else {
			$data['form_data'] = array(
				'firstname' => '',
				'lastname' => '',
				'company' => '',
				'designation' => '',
				'email' => '',
				'password' => '',
				'type_of_user' => ''
			);
		}

		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$data['form_data'] = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'company' => $this->input->post('company'),
				'designation' => $this->input->post('designation'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'type_of_user' => $this->input->post('type_of_user')
			);
			$this->session->set_flashdata('form_flash', $data['form_data']);
			// Insert into user personal
			// Check for Mobile number and the email address
			$check = $this->auth_manage->validate_user($this->input->post());
			if($check['exist'] == 0){
				$res = $this->auth_manage->signup($this->input->post());
				if($res){
					// Insert into the user log
					$log = $this->auth_manage->user_log($this->input->post(), $res);
					if($log){
						$this->message->custom_success_msg(base_url(), 'Thank you for sign up with us! Please confirm your email to continue.');
					}
				}
			} else {
				if($check['exist'] == 1 && $check['email_exist'] == 1){
					$this->message->custom_error_msg(base_url().'signup', 'The email address you have given is already exist in our system. Please use another email address or contact our administrator');
				} else if($check['exist'] == 1 && $check['mobile_exist'] == 1){
					$this->message->custom_error_msg(base_url().'signup', 'The mobile number you have given is already exist in our system. Please use another mobile number or contact our administrator');
				}
			}
		}
		$this->load->view('signup', $data);
	}

}

/* End of file Login.php */
/* Location: ./application/modules/admin/controllers/Login.php */