<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['search'] = 'search/index';
$route['products'] = 'products/index';

$route['products/view/(:any)'] = 'products/view/$1';
$route['products/view/avg'] = 'products/avg';
$route['brands'] = 'brands/index';
$route['categories'] = 'categories/index';
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;