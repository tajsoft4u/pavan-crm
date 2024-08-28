<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
| Please see the user guide for complete details:
| https://codeigniter.com/user_guide/general/routing.html
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
| There are three reserved routes:
| $route['default_controller'] = 'welcome';
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
| $route['404_override'] = 'errors/page_missing';
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
| $route['translate_uri_dashes'] = FALSE;
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
*/

$route['default_controller'] = 'Admin';
$route['404_override'] = 'Error404';
$route['translate_uri_dashes'] = FALSE;

// Auth Controller 
$route['auth']      = 'Auth';
$route['login']     = $route['auth'] . '/login';
$route['authlogin'] = $route['auth'] . '/authLogin';
$route['logout']    = $route['auth'] . '/authLogout';
$route['reset-password'] = $route['auth'] . '/resetPassword';

// Admin Controller 
$route['admin'] = 'Admin';
$route['home'] = $route['admin'] . '/dashboard';
$route['home/(:any)'] = $route['admin'] . '/dashboard';
$route['allorders'] = $route['admin'] . '/allOrders';
$route['pendingorders'] = $route['admin'] . '/pendingOrders';
$route['completedorders'] = $route['admin'] . '/completedOrders';
$route['products'] = $route['admin'] . '/products';

// Order Controller
$route['order_controller']      = 'OrderController';
$route['addneworder'] = $route['order_controller'] . '/addNewOrder';
$route['insertneworder'] = $route['order_controller'] . '/insertNewOrders';
$route['bulkneworder'] = $route['order_controller'] . '/bulkNewOrders';
$route['exportorder'] = $route['order_controller'] . '/exportOrders';
$route['deleteorder'] = $route['order_controller'] . '/deleteOrders';
$route['updateorder'] = $route['order_controller'] . '/updateOrders';
$route['editorders/(:any)'] = $route['order_controller'] . '/editOrder/$1';

// serive provider Controller
$route['service_controller']      = 'ServiceProvider';
$route['serviceproviders'] = $route['service_controller'] . '/serviceProviders';
$route['editserviceproviders/(:any)'] = $route['service_controller'] . '/editServiceProviders/$1';
$route['updateServiceProviders'] = $route['service_controller'] . '/updateServiceProviders';
$route['addnewserviceprovider'] = $route['service_controller'] . '/addServiceProviders';
$route['insertserviceprovider'] = $route['service_controller'] . '/insertServiceProviders';
$route['particularserviceprovider/(:any)'] = $route['service_controller'] . '/particularserviceprovider/$1';
