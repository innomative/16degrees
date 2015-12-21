<?php

// 1:local; 2:staging; 3:live
define('DEV', 2);

define('DEBUG_MODE',true);
define('DS', DIRECTORY_SEPARATOR);
//define('MOGENTO_PIC_PATH','http://liberowebsite.joe.local/productcoderedemption');
define('GE_PATH','');
define('GE_UPLOAD_PATH','');
/** TO BE CHANGED **/
//Domains
define('CDN_PATH','');
define('DOC_ROOT', str_replace(DS.'application'.DS.'config', '', __DIR__));
define('MY_DOMAIN','');

/**TO BE CHANGED END**/

/*
define('DB_HOST','hdm10000499.my3w.com');
define('DB_NAME','hdm10000499_db');
define('DB_USER','hdm10000499');
define('DB_PWD','shi2qi1314');
*/
define('DB_HOST','localhost');
define('DB_NAME','hdm10000499_db');
define('DB_USER','ball');
define('DB_PWD','shi2qi');

define('ROOTDIR', preg_replace('/\/application\/.*$/i', '', __DIR__));



if(!DEBUG_MODE) {
	error_reporting(0);
}



?>
