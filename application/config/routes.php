<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['posts/create']='posts/create';
$route['posts/update']='posts/update';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts']='posts/index';

$route['users']='users/hola';
$route['task']='task/taskpanel';
$route['task/create']='task/create';

$route['categories/create'] = 'categories/create';
$route['categories'] = 'categories/index';
$route['categories/posts/(:any)'] = 'categories/posts/$1';


$route['default_controller'] = 'pages/view';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
