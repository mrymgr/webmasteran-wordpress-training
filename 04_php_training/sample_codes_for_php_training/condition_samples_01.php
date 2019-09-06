<?php
$name      = "Mehdi";
$age       = 37;
$sex       = "male";
$isMarried = false;

//$selected_numbers = array( 50, 61, 12, 38, 29 );
$selected_numbers = [ 50, 61, 12, 38, 29 ];

//Sample of if block with one statement
if ( $name == "Mehdi" ) {
	echo 'Hello ' . $name . '<br>';
}
echo '<hr>';

//If with one statement and without { }
//if ( $name == "Mehdi" ) echo 'Hello ' . $name . '<br>';

$n = 29;
if ( in_array( $n, $selected_numbers ) ) {
	echo $n . ' is in favNumbers<br>';
}

echo '<hr>';
//Sample of if with several conditions
if ( $name == "Mehdi" && $age == 37 ) {
	echo 'Your name is ' . $name . ' and you are ' . $age . ' old.<br>';
}
echo '<hr>';

//Sample of if with several statements in a scope
if ( $name == 'Mehdi' && $isMarried == false ) {
	echo 'Your name is ' . $name . '<br>';
	echo 'You are not married now';
	echo '<br>';
}
echo '<hr>';

//Sample of if with or condition
if ( $isMarried == true || in_array( 50, $selected_numbers ) ) {
	echo 'This condition is true. <br>';
}

echo '<hr>';

if ( $name == "Mehdi" && $age == 37 ):
	echo 'Your name is ' . $name . ' and you are ' . $age . ' old.<br>';
	echo '<br>';
endif;

echo '<hr>';

//Sample of if/else block in php
if ( $sex == "male" || $age > 40 ) {
	echo "Hey " . $name . " You are older than 40 or  you are a man!<br>";
} else {
	echo "Hey " . $name . " You are less thant 40 and maybe you are a woman!<br>";
}

$age = 45;
//$sex = 'female';
var_dump( $age );
// Sample of if/else block with another syntax
if ( $sex == "female" || $age > 40 ) :
	echo "Hey " . $name . " You are older than 40 or  you are a Woman!<br>";
else :
	echo "Hey " . $name . " You are less thant 40 and maybe you are a woman!<hr>";
endif;

echo '<hr>';


$age = 15;
//Sample of if/elseif/else blocks in php
if ( $age > 60 ) {
	echo "Hey " . $name . " You are older than 60 years old <br>";
} elseif ( $age > 40 ) {
	echo "Hey " . $name . " Your age is between 40 and 60 <br>";
} elseif ( $age > 20 ) {
	echo "Hey " . $name . "  Your age is between 20 and 40 <br>";
} else {
	echo "Hey " . $name . " You are younger than 20 years old <br>";
}
//Sample of if/elseif/else block with another syntax
if ( $age > 60 ) :
	echo "Hey " . $name . " You are older than 60 years old <br>";
elseif ( $age > 40 ) :
	echo "Hey " . $name . " Your age is between 40 and 60 <br>";
elseif ( $age > 20 ) :
	echo "Hey " . $name . "  Your age is between 20 and 40 <br>";
elseif ( $age > 10 ) :
	echo "Hey " . $name . "  Your age is between 10 and 20 <br>";
else :
	echo "Hey " . $name . " You are younger than 10 years old <br>";
endif;

echo '<hr>';

$n = rand( 1, 8 );
var_dump( $n );

switch ( $n ) {
	case 1 :
		echo "Sunday";
		break;
	case 2 :
		echo "Monday";
		break;
	case 3 :
		echo "Tuesday";
		break;
	case 4 :
		echo "Wednesday";
		break;
	case 5 :
		echo "Thursday";
		break;
	case 6 :
		echo "Friday";
		break;
	case 7 :
		echo "Saturday";
		break;
	default:
		echo "This is invalid day!";
}

echo '<hr><br>';
/*Sample of using several switch*/
$msn_random_for_switch = rand( 1, 10 );
switch ( $msn_random_for_switch ) {
	case 1:
	case 2:
	case 3:
	case 4:
		echo 'The number is: ' . $msn_random_for_switch . '<br>';
		echo 'The number is between 1 and 4';
		break;
	default:
		echo 'The number is: ' . $msn_random_for_switch . '<br>';
		echo 'The number is greater than 4';
}
echo '<hr><br>';

$age = 35;
echo ( $age > 40 ) ? "Your age is more than 40 years old" : "Your age is less than 40 years old";
echo '<hr>';

$msn_random_number = rand( 4, 5 );
var_dump( $msn_random_number );
echo $msn_random_number == 4 ?: 'This is 5';
echo '<hr>';

define( 'MSN_CONST_3', 21 );
/*define( 'MSN_CONST', 30 );*/
defined( 'MSN_CONST' ) ?: define( 'MSN_CONST', 20 );
var_dump( MSN_CONST );

defined( 'MSN_CONST_2' ) || define( 'MSN_CONST_2', 25 );
var_dump( MSN_CONST_2 );

! defined( 'MSN_CONST_3' ) && define( 'MSN_CONST_3', 40 );
var_dump( MSN_CONST_3 );

echo '<hr>';

