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

// Main Routing
//$route['default_controller']                = 'semnas_project';
$route['default_controller']                = 'home';
$route['404_override']                      = 'semnas_project';
$route['translate_uri_dashes']              = FALSE;
$route['auth/req/(:num)']                   = 'auth/req/$1';

  /*
  | -------------------------------------------------------------------------
  | Sample REST API Routes
  | -------------------------------------------------------------------------
  */
  // $route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
  // $route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8

// Routing for Admin View
  $route['Admin']                             = 'admin/v_content';
  $route['A_content/(:any)/(:any)']           = 'admin/v_content/$1/$2';

  // QR Code
  $route['admin/qrcode/(:any)/(:any)']        = 'admin/ext/generate_qr_code/$1/$2';

  // PDF
  $route['admin/pdf/(:any)/(:any)']           = 'admin/ext/generate_pdf/$1/$2';

  // Routing for crud
  $route['admin/search/(:any)/(:any)/(:any)'] = 'admin/insert/$1/$2/$3';
  $route['admin/create/(:any)/(:any)']        = 'admin/insert/$1/$2';
  $route['admin/edit/(:any)/(:any)/(:any)']   = 'admin/edit/$1/$2/$3';
  $route['admin/update/(:any)/(:any)/(:any)'] = 'admin/update/$1/$2/$3';
  $route['admin/delete/(:any)/(:any)/(:any)'] = 'admin/delete/$1/$2/$3';
  $route['admin/report/(:any)']               = 'admin/asd/$1';
// End Admin


// Routing for User
  $route['User']                              = 'user/u_content';
  $route['U_content/(:any)/(:any)']           = 'user/u_content/$1/$2';

  // Insert Registrasi
  $route['user/create/(:any)/(:any)']         = 'user/insert/$1/$2';
  //$route['user/update/(:any)/(:any)']         = 'user/update/$1/$2';

  $route['user/insert/(:any)/(:any)']         = 'user/cview/insert/$1/$2';

  //Password
  $route['user/update/(:any)/(:any)/(:any)']  = 'user/update/$1/$2/$3';
  //View
  $route['user/cetak/(:any)/(:any)/(:any)']   = 'user/cview/cetak/$1/$2/$3';
  $route['user/detail/(:any)/(:any)/(:any)']  = 'user/cview/detail/$1/$2/$3';

  //PDF
  $route['user/qrcode/(:any)/(:any)']         = 'user/cgen/generate_qr_code/$1/$2';
  $route['user/pdf/(:any)/(:any)']            = 'user/cgen/generate_pdf/$1/$2';

// End User

// Routing for LandingPages
  $route['Home']                              = 'home';
  //ini controller button detail pada halaman utama
  $route['C_v_index']                         = 'home/v_home';
  $route['crud_home']                         = 'home/insert';
// End LandingPages
