<?php
$db=array(
     'host'=>'localhost',
     'user'=>'root',
     'pwd' =>'admin',
     'name'=>'clynique',
     'offset' =>'500',
    );

$prefix='Cly';
        
$noauth=array('image','login');
$jwt=array(
    'alg'=>'HS256',
    'key'=>'clynique',
);

/* dev_mode -> develop mode
 * beri nilai selain satu untuk production
 */
define('DEV_MODE',1);
