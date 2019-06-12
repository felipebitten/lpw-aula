<?php
$activeConfig = 'dev';

if($activeConfig == 'dev'){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$activeDb = 'local';

if($activeDb == 'local'){
    $db = array(
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'lpw'
    );
}
?>