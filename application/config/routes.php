<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['products'] = 'products/index';
$route['products/(:any)'] = 'products/view/$1';
$route['brands'] = 'brands/index';
$route['categories'] = 'categories/index';
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;