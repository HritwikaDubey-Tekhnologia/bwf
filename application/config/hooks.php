<?php
// application/config/hooks.php
// application/config/hooks.php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['post_controller_constructor'][] = array(
    'class'    => 'Hooks',
    'function' => 'setUserdata',
    'filename' => 'Hooks.php',
    'filepath' => 'hooks',
);


/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/userguide3/general/hooks.html
|
*/


