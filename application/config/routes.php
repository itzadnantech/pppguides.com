<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'User';
$route['import/all'] = 'Importall';

$route['import/view/(:any)/(:any)'] = 'Importview/view_employee_file/$1/$2';

$route['makeowner']="Importview/update_owner_in_employee";

$route['dismiss']="Importview/dismiss";

$route['output']="Output";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
