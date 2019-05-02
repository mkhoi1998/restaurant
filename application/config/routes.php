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
$route['default_controller'] = 'site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['user-logout.html'] = 'Site/user_logout';
$route['home.html'] = 'Site/home';
$route['restaurant.html'] = 'Site/restaurant';
$route['menu.html'] = 'Site/menu';
$route['contact.html'] = 'Site/contact';
$route['valid.html'] = 'Site/valid';
$route['feedback.html'] = 'Site/feedback';
$route['reservation.html'] = 'Site/reservation';
$route['signup.html'] = 'Site/signup';
$route['order.html'] = 'Site/order';
$route['clear.html'] = 'Site/clear';
$route['update.html'] = 'Site/update';
$route['purchase.html'] = 'Site/purchase';
$route['account.html'] = 'Site/account';
$route['remove.html'] = 'Site/remove';
$route['order-del.html'] = 'Site/order_del';
$route['account-reservation-del.html'] = 'Site/account_reservation_del';
$route['account-logout.html'] = 'Site/account_logout';
$route['account-edit.html'] = 'Site/account_edit';
$route['account-password.html'] = 'Site/account_password';
$route['account-reset.html'] = 'Site/account_reset';
$route['admin.html'] = 'Site/admin';
$route['admin-feedback-done.html'] = 'Site/admin_feedback_done';
$route['admin-feedback-del.html'] = 'Site/admin_feedback_del';
$route['admin.html'] = 'Site/admin';
$route['admin-home.html'] = 'Site/admin_home';
$route['admin-home-del.html'] = 'Site/admin_home_del';
$route['admin-restaurant-col.html'] = 'Site/admin_restaurant_col';
$route['admin-restaurant-col-del.html'] = 'Site/admin_restaurant_col_del';
$route['admin-restaurant-box.html'] = 'Site/admin_restaurant_box';
$route['admin-restaurant-box-del.html'] = 'Site/admin_restaurant_box_del';
$route['admin-menu.html'] = 'Site/admin_menu';
$route['admin-menu-del.html'] = 'Site/admin_menu_del';
$route['admin-contact.html'] = 'Site/admin_contact';
$route['admin-logout.html'] = 'Site/admin_logout';
$route['admin-password.html'] = 'Site/admin_password';
$route['admin-table.html'] = 'Site/admin_table';
$route['admin-user.html'] = 'Site/admin_user';
$route['admin-user-del.html'] = 'Site/admin_user_del';
$route['admin-user-view.html'] = 'Site/admin_user_view';
$route['admin-reset.html'] = 'Site/admin_reset';