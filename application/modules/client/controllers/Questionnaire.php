<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questionnaire extends Client_Controller {

	public function index()
	{
		$this->mTitle = 'Trash Generator - Complete your Questionnaire';
		$this->mViewData['active_main_menu'] = 'profile';
		$this->mViewData['active_sub_menu'] = 'profile';

		// get the personal details

		$this->render('client/profile/questionnaire');
	}

}

/* End of file Questionnaire.php */
/* Location: ./application/modules/client/controllers/Questionnaire.php */