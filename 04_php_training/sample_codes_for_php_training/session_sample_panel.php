<?php
session_start();
if ( @$_SESSION['is_user_login']) {
	echo  '<h1>Welcome to admin panel gholam</h1>';
} else {
	echo 'Ananas gholam!';
}
