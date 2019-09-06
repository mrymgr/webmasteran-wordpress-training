<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>
<body>


<?php

//$customer_name = $customer_email = $support_type = $request_detail = $site_url = "";
$has_error     = [
	'customer_name'  => false,
	'customer_email' => false,
	'site_url'       => false,
	'support_type'   => false,
];
$error_message = [
	'customer_name'  => 'Your name is required',
	'customer_email' => 'Your email is required',
	'site_url'       => 'Please insert invalid URL',
	'support_type'   => 'Your support type is required',
];

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
	if ( empty( $_POST['customer_name'] ) ) {
		$has_error['customer_name'] = true;
	} else {
		$customer_name = test_input( $_POST['customer_name'] );
	}

	if ( empty( $_POST['customer_email'] ) ) {
		$has_error['customer_email'] = true;
	} else {
		$customer_email = test_input( $_POST['customer_email'] );
	}

	if ( empty( $_POST['support_type'] ) ) {
		$has_error['support_type'] = true;
	} else {
		$support_type = test_input( $_POST['support_type'] );
	}

	$site_url       = test_input( $_POST["site_url"] );
	$request_detail = test_input( $_POST["request_detail"] );
}

function test_input( $data ) {
	$data = trim( $data );
	$data = stripslashes( $data );
	$data = htmlspecialchars( $data );

	return $data;
}

function print_error_style( $field_name ) {
	if ( $GLOBALS['has_error'][ $field_name ] ) {
		return 'error';
	} else {
		return '';
	}
}

function print_error_message( $field_name ) {
	if ( $GLOBALS['has_error'][ $field_name ] ) {
		return $GLOBALS['error_message'][ $field_name ];
	} else {
		return '';
	}
}

function has_form_error() {
	if ( $GLOBALS['has_error']['customer_name'] || $GLOBALS['has_error']['customer_email']
	     || $GLOBALS['has_error']['support_type']
	) {
		return true;

	} else {
		return false;
	}
}

?>


<h1>Contact Us</h1>
<p><span class="<?php echo has_form_error() ? 'error' : ''; ?>">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>">
    <label>Insert your name: <input type="text" name="customer_name"></label>
    <span class="<?php echo $has_error['customer_name'] ? 'error' : ''; ?>">
        * <?php echo $has_error['customer_name'] ? $error_message['customer_name'] : ''; ?>
    </span>

    <br><br>
    <label for="">Your E-mail address: <input type="text" name="customer_email"></label>
    <span class="<?php echo print_error_style( 'customer_email' ); ?>">
        * <?php echo print_error_message( 'customer_email' ) ?>
    </span>
    <br><br>
    <label>Your site URL: <input type="text" name="site_url"></label>
    <br><br>
    <label>Your request: <textarea name="request_detail" rows="5" cols="40"></textarea></label>
    <br><br>
    <label>Type of support: </label>
    <label><input type="radio" name="support_type" value="free"> Free</label>
    <label><input type="radio" name="support_type" value="credit"> Credit</label>
    <span class="<?php echo print_error_style( 'support_type' ); ?>">
        * <?php echo print_error_message( 'support_type' ) ?>
    </span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if ( isset( $_POST ) && ! empty( $_POST ) && ! $has_error['customer_name']
     && ! $has_error['customer_email']
     && ! $has_error['support_type']
) {
	echo "<h2>Your Input:</h2>";
	echo $customer_name;
	echo "<br>";
	echo $customer_email;
	echo "<br>";
	echo $site_url;
	echo "<br>";
	echo $request_detail;
	echo "<br>";
	echo $support_type;

}


?>

</body>
</html>