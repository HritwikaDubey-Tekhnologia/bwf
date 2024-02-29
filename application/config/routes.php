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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'Admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['admin/registerPatient'] = 'admin/registerPatient';

$route['admin/registerPrescription'] = 'admin/registerPrescription';
$route['admin/registerVitals'] = 'admin/registerVitals';
$route['admin/register-doctor'] = 'admin/registerDoctor';
$route['admin/patient-list'] = 'admin/patientList';
$route['admin/registerCity'] = 'admin/registerCity';
$route['admin/registerMMU'] = 'admin/registerMMU';
$route['admin/registerDriver'] = 'admin/registerDriver';
$route['admin/sidebar'] = 'admin/sidebar';
$route['city/register'] = 'city/register';
$route['city/success'] = 'city/success';
$route['admin/doctor-list'] = 'admin/doctor_list';
$route['admin/prescription-list'] = 'admin/prescriptionList';
$route['admin/generateReport/(:num)'] = 'admin/generateReport/$1';
$route['admin/vitalsList'] = 'admin/vitalsList';
$route['admin/profile'] = 'admin/profile';
$route['admin/login'] = 'admin/login';
// $route['admin/dashboard'] = 'admin/dashboard';

// application/config/routes.php

// Add these routes to handle camp registration
$route['admin/showCampRegistrationForm'] = 'admin/showCampRegistrationForm';
$route['admin/register-camp'] = 'admin/registerCamp';
$route['admin/campDetails/(:num)'] = 'admin/campDetails/$1';

$route['admin/logout'] = 'admin/logout';
