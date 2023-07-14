<?php
$db=array(
     'host'=>'127.0.0.1',
     'user'=>'deerformera',
     'pwd' =>'blankspace',
     'name'=>'itransport',
     'offset' =>'500',
    );

$prefix='ep';
        */  
$noauth=array('image','login','gw');
$jwt=array(
    'alg'=>'HS256',
    'key'=>'itransport',
);

/* dev_mode -> develop mode
 * beri nilai selain satu untuk production
 */
define('DEV_MODE',1);

$appID='6b0e2cd8642b299510b386fee6b183a279067d85';