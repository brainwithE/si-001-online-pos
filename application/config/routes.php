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
|	http://codeigniter.com/user_guide/general/routing.html
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


$route['default_controller'] = 'authenticate'; //aauth sample

/*$route['(:any)'] = 'signed_in/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;*/


/*POS*/

//auth
$route['account-login'] = 'authenticate/user_login';
$route['logout'] = 'authenticate/logout';

//redirect controllers per account type
$route['admin'] = 'admin';
$route['tenant'] = 'tenant';
$route['cashier'] = 'cashier';

//admin actions
$route['admin/report-inventory'] = 'admin/view_inventory';
$route['admin/report-sales'] = 'admin/view_sales_report';
$route['admin/report-delivery'] = 'admin/view_delivery';
$route['admin/report-pullout'] = 'admin/view_pullout';
$route['admin/delivery-notification'] = 'admin/delivery_notification';
$route['admin/create-account'] = 'authenticate/create_account'; //view
$route['admin/create-user'] = 'authenticate/create_user'; //action
$route['admin/report-user'] = 'authenticate/view_user_list'; //action
$route['admin/pullout-item'] = 'admin/input_pullout_item';

//tenant actions
$route['tenant/add-items'] = 'tenant/add_items';
$route['tenant/report-inventory'] = 'tenant/view_inventory';
$route['tenant/report-sales'] = 'tenant/view_sales_report';
$route['tenant/add-delivery-items'] = 'tenant/add_delivery_items';
$route['tenant/report-delivery'] = 'tenant/view_delivery';
$route['tenant/report-pullout'] = 'tenant/view_pullout';

//cashier actions
$route['cashier/report-sales'] = 'cashier/view_sales_report';
$route['cashier/add-sales'] = 'cashier/add_sales_transaction';

//filter function
$route['filter-sales'] = 'tenant/filter_sales_date';



