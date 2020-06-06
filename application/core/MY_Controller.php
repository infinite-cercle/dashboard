<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH . "third_party/MX/Controller.php";

/**
 * Description of my_controller
 *
 * @author Administrator
 */
class MY_Controller extends MX_Controller {

	protected $mModule = '';
    protected $mCtrler = 'home';        // current controller
    protected $mAction = 'index';
    protected $mTitle = '';
    protected $mViewData = array();
    protected $mMenu = array();
    protected $rMenu = array();
    protected $mBreadcrumb = array();
    protected $mSiteConfig = array();
    public static $instance;

    function __construct() {
        parent::__construct();
        self::$instance || self::$instance =& $this;
        $this->mModule = $this->router->fetch_module();
        $this->mCtrler = $this->router->fetch_class();
        $this->_setup();
        // To set notification pusher open
        // notify(); // helper
        notify(/*from*/'generator', /*to*/'admin', /*notification data*/ array('res' => 1));
    }

    private function _setup()
    {
        
        $site_config       = $this->config->item('site');
        // load default values
        $this->mSiteName   = $site_config['name'];
        $this->mTitle      = $site_config['title'];
        $this->mMenu = empty($site_config['menu']) ? array() : $site_config['menu'];
        $this->rMenu = empty($site_config['rightMenu']) ? array() : $site_config['rightMenu'];
        $this->mSiteConfig = $site_config;
        $this->mViewData['active_main_menu'] = '';
        $this->mViewData['active_sub_menu'] = '';
    }

    // Admin panel Render template
    public function render_admin($view_file, $layout = 'default')
    {
        
        $this->mViewData['page_title']  = 'ThinkTrash Admin - '.$this->mTitle;
        $this->mViewData['module']      = $this->mModule;
        $this->mViewData['ctrler']      = $this->mCtrler;
        $this->mViewData['current_uri'] = empty($this->mModule) ? uri_string() : str_replace($this->mModule . '/', '', uri_string());

        $this->mViewData['menu']        = $this->mMenu;
        $this->mViewData['rightMenu'] = $this->rMenu;
        $this->mViewData['breadcrumb'] = $this->mBreadcrumb;
        /*echo '<pre>';
        print_r($this->mViewData['breadcrumb']);
        exit();*/
        //Send the View File to layputs

        // Get notification count
        $notification_count = 0;
        // Get the pickup notification count
        $this->db->where('fld_current_status', 1);
        $q1 = $this->db->get('tbl_pickup_requests');
        $pickup_approval = $q1->num_rows();

        $this->mViewData['request_notification'] = $notification_count+$pickup_approval;
        
        $this->mViewData['inner_view'] = $view_file;
        
        $this->load->view('admin/common/header', $this->mViewData);
        $this->load->view('admin/layouts/' . $layout, $this->mViewData);
        $this->load->view('admin/common/footer');
        $this->load->view('admin/common/scripts_bottom', $this->mViewData);
        $this->load->view('admin/common/injector_bottom', $this->mViewData);
    }

    // Client panel Render template
    public function render_client($view_file, $layout = 'default')
    {
        
        $this->mViewData['page_title']  = 'ThinkTrash Generator - '.$this->mTitle;
        $this->mViewData['module']      = $this->mModule;
        $this->mViewData['ctrler']      = $this->mCtrler;
        $this->mViewData['current_uri'] = empty($this->mModule) ? uri_string() : str_replace($this->mModule . '/', '', uri_string());

        $this->mViewData['menu']        = $this->mMenu;
        $this->mViewData['rightMenu'] = $this->rMenu;
        $this->mViewData['breadcrumb'] = $this->mBreadcrumb;
        /*echo '<pre>';
        print_r($this->mViewData['breadcrumb']);
        exit();*/
        //Send the View File to layputs
        
        $this->mViewData['inner_view'] = $view_file;

        // Client header info
        $this->db->where('fld_id', userid);
        $q = $this->db->get('tbl_user_personal');
        $r = $q->row_array();
        $this->mViewData['log_info'] = $r;
        
        $this->load->view('client/common/header', $this->mViewData);
        $this->load->view('client/layouts/' . $layout, $this->mViewData);
        $this->load->view('client/common/footer');
        $this->load->view('client/common/scripts_bottom', $this->mViewData);
        $this->load->view('client/common/injector_bottom', $this->mViewData);
    }

    // Processor panel Render template
    public function render_processor($view_file, $layout = 'default')
    {
        $this->mViewData['page_title']  = 'ThinkTrash Processor - '.$this->mTitle;
        $this->mViewData['module']      = $this->mModule;
        $this->mViewData['ctrler']      = $this->mCtrler;
        $this->mViewData['current_uri'] = empty($this->mModule) ? uri_string() : str_replace($this->mModule . '/', '', uri_string());

        $this->mViewData['menu']        = $this->mMenu;
        $this->mViewData['rightMenu'] = $this->rMenu;
        $this->mViewData['breadcrumb'] = $this->mBreadcrumb;
        
        $this->mViewData['inner_view'] = $view_file;

        // Processor Personal
        $this->db->where('fld_id', userid);
        $q = $this->db->get('tbl_user_personal');
        $r = $q->row_array();
        $this->mViewData['log_info'] = $r;
        
        $this->load->view('processor/common/header', $this->mViewData);
        $this->load->view('processor/layouts/' . $layout, $this->mViewData);
        $this->load->view('processor/common/footer');
        $this->load->view('processor/common/scripts_bottom', $this->mViewData);
        $this->load->view('processor/common/injector_bottom', $this->mViewData);
    }

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */