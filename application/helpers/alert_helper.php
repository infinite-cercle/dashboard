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

if (!function_exists('message_box')) {
    function message_box($message_type, $close_button = TRUE)
    {
        $CI =& get_instance();
        $message = $CI->session->flashdata($message_type);
        $retval = '';
        if($message){
            switch($message_type){
                case 'Welcome':
                    $retval .= 'swal("Welcome..!", "'.$message.'", "success");';
                    break;
                case 'success':
                    $retval .= 'swal("Good job!", "'.$message.'", "success");';
                    break;
                case 'error':
                    $retval .= 'swal("Opps!", "'.$message.'", "error");';
                    break;
                case 'info':
                    $retval .= 'swal("Are you sure?", "'.$message.'", "info");';
                    break;
                case 'validate_error':
                    $retval .= '<div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#">&times;</a>"'.$message.'"</div>';
                    break;    
                case 'warning':
                    $retval .= '<div class="alert alert-warning">';
                    break;
            }

            //if($close_button)
                //$retval .= '<a class="close" data-dismiss="alert" href="#">&times;</a>';

            /*$retval .= $message;
            $retval .= '</div>';*/
            return $retval;
        }
    }
}

if (!function_exists('set_custom_message')){
    function set_custom_message($type, $message)
    {
        $CI =& get_instance();
        $CI->session->set_flashdata($type, $message);
    }
}

if (!function_exists('set_message')){
    function set_message($type, $message)
    {
        $CI =& get_instance();
        $CI->session->set_flashdata($type, $message);
    }
}

