<?php
session_start();
//$_SESSION['is_user_login'] = false;
//unset($_SESSION['is_user_login']);

function msn_is_user_login() {
	if ( isset($_SESSION['is_user_login']) && !empty($_SESSION['is_user_login'])){
	    if ( ($_SESSION['is_user_login'] === true)) {
	        return true;
        } else {
	        return false;
        }
    } else {
	    return false;
    }
}

function msn_do_login( $username, $password ) {
	if ( $username == 'gholam' && $password == '123') {
	    return true;
    } else {
	    return false;
    }
}

function msn_redirect_page() {
    header( "Location: session_sample_panel.php" ); /* Redirect browser */
   	exit();
}

if ( msn_is_user_login() ) {
    msn_redirect_page();
} elseif ( isset( $_POST['username'], $_POST['password'] ) ) {
	if ( msn_do_login( $_POST['username'], $_POST['password'] ) ) {
        $_SESSION['is_user_login'] = true;
	    msn_redirect_page();
	} else {
        echo '<h2>User ya passet Eshtebahe Gholam jooon!</h2>';
	}

} else {
	echo '<h2>At first, you must login in your account!</h2>';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post" style="width: 50% !important;  margin: 30px auto; text-align: center">
    <label for="username">username: </label>
    <input type="text" name="username" placeholder="input username here!">
    <br><br>
    <label for="password">password: </label>
    <input type="password" name="password" placeholder="input password here!">
    <br><br>
    <input type="submit" value="login">
</form>
</body>
</html>
