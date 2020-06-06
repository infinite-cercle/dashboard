<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// $route['default_controller'] = 'welcome';
$route['administrator/dashboard'] = 'admin/home';
$route['administrator/frequently-asked-question'] = 'admin/home/faq';
$route['administrator/logout'] = 'admin/home/logout';

// manage Client
$route['administrator/add-new-client'] = 'admin/manage_client/addClient';
$route['administrator/existing-clients'] = 'admin/manage_client/existingClients';

// Processors
$route['administrator/add-new-processor'] = 'admin/manage_processors/addNewProcessor';
$route['administrator/existing-processors'] = 'admin/manage_processors/existingProcessors';

// Pickup requests
$route['administrator/pickup-approval'] = 'admin/manage_pickups/approval';
$route['administrator/pickup-requests'] = 'admin/manage_pickups/allRequests';
$route['administrator/check-pickup-timeline'] = 'admin/manage_pickups/timeline';
$route['administrator/view-pickup-images'] = 'admin/manage_pickups/images';
$route['administrator/approve-and-assign'] = 'admin/manage_pickups/approveConfirm';

// Ajax Models
$route['administrator/get-pickup-details'] = 'admin/manage_pickups/AjaxGetPickupDetails';
$route['administrator/add-carbon-footprints'] = 'admin/manage_pickups/carbonFootprints';
$route['administrator/saveCarbonFootPrint'] = 'admin/manage_pickups/AjaxSaveCarbonFootPrints';

// End