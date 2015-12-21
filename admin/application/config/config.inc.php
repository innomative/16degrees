<?php

// 1:local; 2:staging; 3:live
define('DEV', 2);

/**TO BE CHANGED **/
//Domains
define('CDN_PATH','http://ugg.innomative-staging.com/');
define('CDN_MOBILE_PATH','http://ugg.innomative-staging.com/');
define('MY_DOMAIN','http://ugg.ray.local/mobile/');
define( "WB_CALLBACK_URL" , 'http://ugg.innomative-staging.com/callback.php' );
//cokeID = 1795839430
define('FOLLOWID','1658658821');
define('DEBUG_MODE',true);

/**TO BE CHANGED END**/
/*
define('DB_HOST','localhost');
define('DB_NAME','delisana');
define('DB_USER','ray');
define('DB_PWD','shi2qi');*/

define('DB_HOST','localhost');
define('DB_NAME','16degrees');
define('DB_USER','ball');
define('DB_PWD','shi2qi');


define('MOBILE', '15618839631');

// online
// define('TOKEN', 'xcdb8dwFCeb8wY3SDW98sEbD3YB3S8bv');
// define('OPEN_ID', 'gh_04c1547d2d2f');
// define('APP_ID', 'wx569d0898827389b5');
// define('APP_SE', '62888ceb4be34fde30ad21066c67ac45');

// test account:
// define('TOKEN', 'innomative');
// define('OPEN_ID', 'gh_80e810943126');
// define('APP_ID', 'wx674df524361e044c');
// define('APP_SE', 'e2d4ad1fe60d49d741dc7c0745f3a105');

// test account2:
define('TOKEN', 'delisana');
define('OPEN_ID', 'gh_a40c1187537b');
define('APP_ID', 'wx772891af205bc2ee');
define('APP_SE', '131ff9fc42529ca955e68d08bb5e76f1');



//define('ROOTDIR', preg_replace('/\/application\/.*$/i', '', __DIR__));

/*

define('DB_HOST','localhost');
define('DB_NAME','wechat_sys');
define('DB_USER','wechat_sys');
define('DB_PWD','9f6KEUEvJVx6qxPQ');*/


if(!DEBUG_MODE) {
	error_reporting(0);
}

/*Security settings*/
define('COOKIE_PRIVATE_KEY','lsd3H53S3Dsdxcehl20a0doel302s');
define('COOKIE_SIGN','asd3H53Ss3asddas3360dsdfse02s');

/*Weibo settings*/
define( "WB_AKEY" , '3748378324' );
define( "WB_SKEY" , '98018657cbb1bd502248503d20b566c7' );


/*DianPing settings*/
define( "DP_AKEY" , '5125743578' );
define( "DP_SKEY" , 'ec21ce52ca284e6a8769574c4e08bbc2' );


?>
