<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
 *	@author : CodesLab
 *  @support: support@codeslab.net
 *	date	: 05 June, 2015
 *	Easy Inventory
 *	http://www.codeslab.net
 *  version: 1.0
 */

function ActivityAddNewPickupRequest($data)
{
    $CI =& get_instance();
    $CI->db->insert('tbl_process_activity', $data);
}

function AssignPickupActivity($data)
{
	$CI =& get_instance();
    $CI->db->insert('tbl_process_activity', $data);
}