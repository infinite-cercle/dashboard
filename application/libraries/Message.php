<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Message
{

    public function custom_error_msg($url, $message)
    {
        $type = 'error';
        set_message($type, $message);
        redirect($url);
    }
    public function validation_error_msg($url, $message)
    {
        $type = 'validate_error';
        set_message($type, $message);
        redirect($url);
    }
    public function custom_success_msg($url, $message)
    {
        $type = 'success';
        set_message($type, $message);
        redirect($url);
    }

    public function save_success($url)
    {
        $type = 'success';
        $message = 'Your record has been saved successfully!';
        set_message($type, $message);
        redirect($url);
    }
    public function loginsucess($url,$message)
    {
        $type = 'Welcome';
        $message = $message;
        set_message($type, $message);
        redirect($url);
    }
    public function save_error($url)
    {
        $type = 'error';
        $message = 'Something went wrong try again later!';
        set_message($type, $message);
        redirect($url);
    }

    public function delete_success($url)
    {
        $type = 'success';
        $message = 'Your record has been delete successfully!';
        set_message($type, $message);
        redirect($url);
    }

    public function norecord_found($url)
    {
        $type = 'error';
        $message = 'no_record_found!';
        set_message($type, $message);
        redirect($url);
    }

    public function custom()
    {
        $type = 'Welcome';
        $msg = "Hi";
        set_custom_message($type,$msg);
    }

    public function success_msg()
    {
        return $message = 'Your record has been saved successfully!';
    }

    public function delete_msg()
    {
        return $message = 'Your record has been delete successfully!';
    }

}