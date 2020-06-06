<?php

function notify($from = 'admin', $to = 'generator', $process_data = array())
{
	if(!empty($process_data)){
		require FCPATH . 'pusher/vendor/autoload.php';
		$options = array(
		    'cluster' => 'ap2',
		    'useTLS' => true
	  	);
	  	$pusher = new Pusher\Pusher(
		    'f0a3fa8c21d180a5387d',
		    '77e305b50a1a7efb9228',
		    '929697',
		    $options
	  	);

	  	if($from == 'generator'){
	  		$user_personal_details = getUserDetails('admin');
	  	}

	  	$data['message'] = 'logger_created';
	  	$pusher->trigger('notification-channel', 'event-notification', $data);
	}
}

function getUserDetails($user_type = 'admin', $id = 1)
{
	$ci =& get_instance();
	if($user_type == 'admin'){
		$ci->db->where('fld_id', $id);
		$q = $ci->db->get('tbl_user_personal');
		$r = $q->row_array();
		return $r;
	}
}

?>