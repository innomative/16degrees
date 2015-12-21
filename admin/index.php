<?php
include_once( 'application/bootstrap.php' );
session_start();
define('ROOTDIR',dirname(dirname(__FILE__)));
define('PRODUCT_SRC',dirname(dirname(__FILE__)).'/images/wine/');
$app = new InnomativeMVC();
$state = $app->run();