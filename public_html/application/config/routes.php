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
$route['default_controller'] = 'front/index';
$route['404_override'] = 'front/pagen_not_found';
$route['translate_uri_dashes'] = FALSE;
$route['admin'] = 'admin/login';
$route['web_management'] = 'web_management/cms';
$route['super_admin'] = 'super_admin/login';
$route['front'] = '/';
$route['ourteam'] = 'front/ourteam';
$route['email'] = 'front/test_email';
$route['sms'] = 'front/test_send_sms_to_admins';
$route['about_us'] = 'front/about_us';
$route['home'] = 'front/home';
$route['tandcapp'] = 'front/tandcapp';
$route['news'] = 'front/news';
$route['services'] = 'front/services';
$route['tandc'] = 'front/tandc';
$route['privacy'] = 'front/privacy';
$route['training'] = 'front/training';
$route['contact_us'] = 'front/contact_us';
$route['jobs'] = 'front/jobs';
$route['dashboard'] = 'front/dashboard';
$route['modify_case'] = 'front/modify_case';
$route['change_password'] = 'front/change_password';
$route['case_list'] = 'front/case_list';
$route['archive_list'] = 'front/archive_list';
$route['list_session_appoinment'] = 'front/list_session_appoinment';
$route['calendar'] = 'front/calendar';
$route['list_general_misssion'] = 'front/list_general_misssion';
$route['list_writings_appoinment'] = 'front/list_writings_appoinment';
$route['list_consultation_appoinment'] = 'front/list_consultation_appoinment';
$route['list_visiting_appoinment'] = 'front/list_visiting_appoinment';
$route['referrals'] = 'front/referrals';
$route['alert'] = 'front/alert';
$route['bank_transfer'] = 'front/bank_transfer';
$route['contact_us'] = 'front/contact_us';
$route['list_consultation_appoinment'] = 'front/list_consultation_appoinment';
$route['add_case'] = 'front/add_case';
$route['forgotPassword'] = 'front/forgotPassword';
$route['all_activities'] = 'front/all_activities';