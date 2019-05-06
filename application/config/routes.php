<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'web';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//$route['postContactAJAX'] = 'web/post_contact_form';
$route['postContact'] = 'web/post_contact_form';
$route['send-test-mail'] = 'web/sendMail';

//----------- admin common routing ------------
$route['admin']             = "admin/user/index";
$route['admin/login']       = "admin/user/index";
$route['admin/logout']      = "admin/user/logout";
$route['admin/dashboard']   = "admin/admin";

$route['admin/c/(:any)']  = "admin/admin/manage_contents/$1";

$route['admin/services']      = "admin/admin/manage_services";
$route['admin/services/(:any)']         = "admin/admin/manage_services/$1";
$route['admin/services/(:any)/(:any)']  = "admin/admin/manage_services/$1/$2";

$route['admin/stocks']      = "admin/admin/manage_stocks";
$route['admin/stocks/(:any)']         = "admin/admin/manage_stocks/$1";
$route['admin/stocks/(:any)/(:any)']  = "admin/admin/manage_stocks/$1/$2";

$route['admin/clients']      = "admin/admin/manage_clients";
$route['admin/clients/(:any)']         = "admin/admin/manage_clients/$1";
$route['admin/clients/(:any)/(:any)']  = "admin/admin/manage_clients/$1/$2";

$route['admin/testimonials']      = "admin/admin/manage_testimonials";
$route['admin/testimonials/(:any)']         = "admin/admin/manage_testimonials/$1";
$route['admin/testimonials/(:any)/(:any)']  = "admin/admin/manage_testimonials/$1/$2";

$route['admin/blogs']      = "admin/admin/manage_blogs";
$route['admin/blogs/(:any)']         = "admin/admin/manage_blogs/$1";
$route['admin/blogs/(:any)/(:any)']  = "admin/admin/manage_blogs/$1/$2";

$route['admin/events']              = "admin/admin/manage_events";
$route['admin/events/upload']       = "admin/admin/events_upload";
$route['admin/events/(:any)/(:any)']  = "admin/admin/manage_events/$1/$2";
$route['admin/updateEventFlag_AJAX']  = "admin/admin/update_event_flag";

$route['admin/enquiries']              = "admin/admin/list_enquiries";

$route['admin/updateWebsettings_AJAX']      = "admin/admin/updateWebsettings";
$route['admin/updateContents_AJAX']      = "admin/admin/updateContentsbyFlag";

$route['admin/portfolio']      = "admin/admin/manage_portfolio";
$route['admin/portfolio/upload']      = "admin/admin/portfolio_upload";
$route['admin/portfolio/(:any)/(:any)']  = "admin/admin/manage_portfolio/$1/$2";