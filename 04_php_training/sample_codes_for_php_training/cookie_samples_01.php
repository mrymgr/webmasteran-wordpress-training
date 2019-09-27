<?php
include_once 'inc/jdf.php';
$now = time();

echo '<h2>Current time is: ' . jdate( 'Y-m-d H:i:s', $now, 'Asia/Tehran' ) . ' </h2>';
$cookie_name  = 'show_popup';
$cookie_value = '12';
//setcookie( $cookie_name, $cookie_value, $now + 20, '/' );


echo '<hr>';

$msn_expire_40s = $now + 40;
$msn_expire_40i = $now + 40 * 60;
$msn_expire_4h  = $now + 4 * 60 * 60;
$msn_expire_4d  = $now + 4 * 60 * 60 * 24;
$msn_expire_4m  = $now + 4 * 60 * 60 * 24 * 30;

//setcookie( 'msn_expire_after_40s', 'gholam 40s', $msn_expire_40s, '/' );
//setcookie( 'msn_expire_after_40i', 'gholam 40m', $msn_expire_40s, '/' );
setcookie( 'msn_expire_after_4h', 'gholam 4h', $msn_expire_40s, '/' );
var_dump( $_COOKIE );

setcookie( 'msn_expire_after_40i', null, time() - 20, '/' );
echo '<br>';
echo @$_COOKIE['msn_expire_after_4h'];