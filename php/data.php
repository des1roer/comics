<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
define('__ROOT__', dirname(dirname(dirname(__FILE__))));

date_default_timezone_set('Asia/Yekaterinburg');

if (empty($_REQUEST['act'])) {
    die('no action');
}
$act = $_REQUEST['act'];

function dd(...$args)
{
    foreach ($args as $x) {
        var_dump($x);
    }

    die(1);
}

function dirToArray($dir)
{
    $result = array();
    $cdir = scandir($dir);
    foreach ($cdir as $key => $value) {
        if (!in_array($value, array(".", ".."))) {
            if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
                $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
            } else {
                $result[] = '.' . ltrim($dir . $value, '.');
            }
        }
    }

    return $result;
}

switch ($act) {
    case 'list':
        $data = dirToArray('../data/');
        echo json_encode($data);
        break;
    default :
        break;
}
