<?php
var_dump($_COOKIE);

#convert desire date and time to timestamp
echo "Oct 3, 1975 was on a " . date( "l", mktime( 0, 0, 0, 10, 3, 1975 ) );

#get the time zone of webserver
var_dump( date_default_timezone_get() );

#compare 2 time with each other
$today_time       = mktime();
$yesterday_time   = mktime( 13, 28, 0, 9, 26, 2019 );
$msn_compare_time = $today_time - $yesterday_time;

var_dump( $msn_compare_time );

#convert date and time string to timestamp
$msn_strtotime_gmt    = strtotime( '2019-09-27 15:08:48 GMT' );
$msn_strtotime_tehran = strtotime( '2019-09-25 15:08:48 Asia/Tehran' );
$msn_strtotime_empty  = strtotime( '2019-09-27 15:08:48' );

var_dump( $msn_strtotime_gmt );
var_dump( $msn_strtotime_tehran );
var_dump( $msn_strtotime_empty );
echo date_default_timezone_get();
echo '<br>';
echo '<hr>';


echo "Today is " . date( "Y-m-d" ) . '<br>';
echo "Time from GMT timestamp is: " . date( "Y-m-d", 1569411528 ) . '<br>';
echo "Time from GMT timestamp is: " . date( "Y.m.d", 1569411528 ) . '<br>';
echo "Time from GMT timestamp is: " . date( "Y / m / d  h:i:s a", 1569411528 ) . '<br>';
echo "Time from GMT timestamp is: " . date( "Y-m-d  H:i:s", 1569411528 ) . '<br>';
echo "Today is: " . date( "Y-m-d  H:i:s" ) . '<br>';
#set time zone
date_default_timezone_set( 'Asia/Tehran' );
echo "Today is: " . date( "Y-m-d  H:i:s" ) . '<br>';

echo '<hr>';
#array format for getting date
var_dump( getdate() );
var_dump( getdate( 1569411528 ) );

echo idate( "B" ) . "<br>";
echo idate( "d" ) . "<br>";
echo idate( "h" ) . "<br>";
echo idate( "H" ) . "<br>";
echo idate( "i" ) . "<br>";
echo idate( "I" ) . "<br>";
echo idate( "L" ) . "<br>";
echo idate( "m" ) . "<br>";
echo idate( "s" ) . "<br>";
echo idate( "t" ) . "<br>";
echo idate( "U" ) . "<br>";
echo idate( "w" ) . "<br>";
echo idate( "W" ) . "<br>";
echo idate( "y" ) . "<br>";
echo idate( "Y" ) . "<br>";
echo idate( "z" ) . "<br>";
echo idate( "Z" ) . "<br>";
echo '<hr>';

include_once 'inc/jdf.php';
echo jdate( 'F' ) . '<br>';
echo jdate( 'ماه F' ) . '<br>';
echo jdate( 'F ماه' ) . '<br>';
echo jdate( 'V' ) . '<br>';
$msn_date = jdate( 'Y / m / j - H:i:s' );
echo $msn_date;
echo '<br>';
echo jdate( 'امروز Jم F ماه است' ) . '<br>';
echo jdate( 'امروز l است' ) . '<br>';

#convert gregorian to jalali
var_dump( gregorian_to_jalali( 2019, 9, 27 ) );
var_dump( jalali_to_gregorian( 1398, 7, 5 ) );


echo '<br>';

