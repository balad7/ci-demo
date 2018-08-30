<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Login/view';
$route['home'] = 'Login/view';
$route['login'] = 'Login/login';
$route['logout'] = 'Login/logout';
$route['update'] = 'Login/do_upload';
$route['register'] = 'Login/insert';
$route['employee'] = 'Login/employee';
$route['Login/emp_delete'] = 'Login/emp_delete';
$route['add-employee'] = 'Login/add';
$route['forget-password'] = 'Login/forget';
$route['change-password'] = 'Login/forget_password';
$route['reset-form'] = 'Login/reset_password';
$route['reset-password'] = 'Login/update_password';
$route['profile'] = 'Login/profile';
$route['profile-update'] = 'Login/profile_update';


$route['salary'] = 'Salary/view';
$route['add-salary'] = 'Salary/add';
$route['add'] = 'Salary/insert';
$route['update-salary'] = 'Salary/update';

$route['attendance'] = 'Attendance/view';
$route['add-attendance'] = 'Attendance/add';
$route['attendance-add'] = 'Attendance/insert';
$route['attendance-update'] = 'Attendance/update';
$route['attendance-months'] = 'Attendance/months';
$route['attendance-search'] = 'Attendance/search';
//$route['(:any)'] = 'Login/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

