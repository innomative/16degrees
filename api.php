<?php
session_start();
define('ROOT',dirname(__FILE__));
include_once( 'application/bootstrap.php' );

$app = new InnomativeMVC();
$app->run();



?>
