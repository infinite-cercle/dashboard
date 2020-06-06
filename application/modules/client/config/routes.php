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
$route['think-trash-generator/dashboard'] = 'client/home';
$route['think-trash-generator/notifications'] = 'client/home/notifications';
$route['think-trash-generator/frequently-asked-question'] = 'client/home/faq';
$route['think-trash-generator/siteMarkers'] = 'client/home/getSiteMarkers';
$route['think-trash-generator/new-pickup-request'] = 'client/pickuprequest/newrequest';
$route['think-trash-generator/existing-pickup-request'] = 'client/pickuprequest/existingrequest';

// Profile
$route['think-trash-generator/profile'] = 'client/profile';
$route['think-trash-generator/contacts'] = 'client/profile/contacts';
$route['think-trash-generator/getContactDetail'] = 'client/profile/getContactinfoAjax';
$route['think-trash-generator/complete-your-profile'] = 'client/questionnaire';

// Site manage
$route['think-trash-generator/add-new-site'] = 'client/sitemanage/add';
$route['think-trash-generator/existing-site'] = 'client/sitemanage/existing';
$route['think-trash-generator/view-site'] = 'client/sitemanage/viewsite';

// Pickup request
$route['think-trash-generator/getsiteinfo'] = 'client/pickuprequest/getSiteInfoForPickupAjax';
$route['think-trash-generator/getInchargePerson'] = 'client/pickuprequest/getInchargePersonAjax';
$route['think-trash-generator/get_inchage_person_detail'] = 'client/pickuprequest/inchargeDetailAjax';
$route['think-trash-generator/check-pickup-timeline'] = 'client/pickuprequest/checkTimeline';
$route['think-trash-generator/upload-images'] = 'client/pickuprequest/uploadImages';
$route['think-trash-generator/sensor-alert'] = 'client/pickuprequest/sensorAlert';

// Reports
$route['think-trash-generator/site-report'] = 'client/reports/siteReport';
$route['think-trash-generator/pickup-carbon-fotprints'] = 'client/reports/carbonFootprints';


$route['think-trash-generator/logout'] = 'client/home/logout';

