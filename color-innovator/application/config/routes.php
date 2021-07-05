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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin_login']		= 'Admin_login';
$route['admin_login/(:any)']		= 'Admin_login/$1';
$route['admin_login/(:any)/(:any)']		= 'Admin_login/$1/$2';
$route['admin_login/(:any)/(:any)/(:any)']		= 'Admin_login/$1/$2/$3';
	
$route['admin']		= 'Admin';
$route['admin/(:any)']		= 'Admin/$1';
$route['admin/(:any)/(:any)']		= 'Admin/$1/$2';
$route['admin/(:any)/(:any)/(:any)']		= 'Admin/$1/$2/$3';

$route['colors']		= 'Colors';
$route['colors/(:any)']		= 'Colors/$1';
$route['colors/(:any)/(:any)']		= 'Colors/$1/$2';
$route['colors/(:any)/(:any)/(:any)']		= 'Colors/$1/$2/$3';

$route['site_settings']		= 'Site_settings';
$route['site_settings/(:any)']		= 'Site_settings/$1';
$route['site_settings/(:any)/(:any)']		= 'Site_settings/$1/$2';

$route['users']="Users";
$route['users/(:any)']="Users/$1";
$route['users/(:any)/(:any)']="Users/$1/$2";

$route['home']="Home";
$route['home/(:any)']="Home/$1";
$route['home/(:any)/(:any)']="Home/$1/$2";
$route['home/(:any)/(:any)/(:any)']="Home/$1/$2/$3";
$route['home/(:any)/(:any)/(:any)/(:any)']="Home/$1/$2/$3/$4";

$route['manage_requests'] = "Manage_requests";
$route['manage_requests/(:any)']="Manage_requests/$1";
$route['manage_requests/(:any)/(:any)']="Manage_requests/$1/$2";


$route['color_innovator'] = 'Color_innovator';
$route['color_innovator/(:any)'] = 'Color_innovator/$1';
$route['color_innovator/(:any)/(:any)'] = 'Color_innovator/$1/$2';