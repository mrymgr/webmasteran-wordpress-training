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

if ( empty( $_POST ) ) {
	$customer_email = $customer_name = $site_url = $request_detail = '';
}


$has_error = [
	'customer_name'  => [ 'required' => false, 'allowed' => false ],
	'customer_email' => [ 'required' => false, 'allowed' => false ],
	'site_url'       => [ 'required' => false, 'allowed' => false ],
	'support_type'   => [ 'required' => false, 'allowed' => false ],
];

$error_message = [
	'customer_name'  => [
		'required' => 'Your name is required',
		'allowed'  => 'Only letters and white space allowed (max input:30 character)',
	],
	'customer_email' => [
		'required' => 'Your email is required',
		'allowed'  => 'Insert correct email format!',
	],
	'site_url'       => [
		'required' => ' ',
		'allowed'  => 'Please insert invalid URL',
	],
	'support_type'   => [
		'required' => 'Your support type is required',
		'allowed'  => ' ',
	],
];

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
	if ( empty( $_POST['customer_name'] ) ) {
		$has_error['customer_name']['required'] = true;
		$customer_name                          = '';
	} else {
		$customer_name = test_input( $_POST['customer_name'] );
		if ( ! preg_match( "/^[a-zA-Z ]{1,30}$/", $customer_name ) ) {
			$has_error['customer_name']['allowed'] = true;
		}
	}

	if ( empty( $_POST['customer_email'] ) ) {
		$has_error['customer_email']['required'] = true;
		$customer_email                          = '';
	} else {
		$customer_email = test_input( $_POST['customer_email'] );
		if ( ! filter_var( $customer_email, FILTER_VALIDATE_EMAIL ) ) {
			$has_error['customer_email']['allowed'] = true;
		}
	}

	if ( empty( $_POST['site_url'] ) ) {
		$site_url = '';
	} else {
		$site_url = filter_var( $_POST['site_url'], FILTER_SANITIZE_URL );
		/*$site_url = test_input( $_POST["site_url"] );*/
		if ( ! filter_var( $site_url, FILTER_VALIDATE_URL ) ) {
			$has_error['site_url']['allowed'] = true;
		}
	}


	if ( empty( $_POST['support_type'] ) ) {
		$has_error['support_type']['required'] = true;
	} else {
		$support_type = test_input( $_POST['support_type'] );
	}


	$request_detail = test_input( $_POST["request_detail"] );
}

function test_input( $data ) {
	$data = trim( $data );
	$data = stripslashes( $data );
	$data = htmlspecialchars( $data );

	return $data;
}

function print_error_style( $field_name ) {
	if ( $GLOBALS['has_error'][ $field_name ]['required']
	     || $GLOBALS['has_error'][ $field_name ]['allowed']
	) {
		return 'error';
	} else {
		return '';
	}
}

function print_error_message( $field_name ) {
	if ( $GLOBALS['has_error'][ $field_name ]['required'] ) {
		return $GLOBALS['error_message'][ $field_name ]['required'];
	} elseif ( $GLOBALS['has_error'][ $field_name ]['allowed'] ) {
		return $GLOBALS['error_message'][ $field_name ]['allowed'];
	} else {
		return '';
	}
}

function has_form_error() {
	$error_array_fields = [ 'customer_name', 'customer_email', 'support_type' ];
	$error_array_types  = [ 'required', 'allowed' ];
	foreach ( $error_array_fields as $error_array_field ) {
		foreach ( $error_array_types as $error_array_type ) {
			if ( $GLOBALS['has_error'][ $error_array_field ][ $error_array_type ] ) {
				return true;
				break;
			}
		}

	}

	return false;
}

function is_form_submit_correct() {
	if ( isset( $_POST ) && ! empty( $_POST )
	     && ! $GLOBALS['has_error']['customer_name']['required']
	     && ! $GLOBALS['has_error']['customer_name']['allowed']
	     && ! $GLOBALS['has_error']['customer_email']['required']
	     && ! $GLOBALS['has_error']['customer_email']['allowed']
	     && ! $GLOBALS['has_error']['support_type']['required']
	     && ! $GLOBALS['has_error']['site_url']['allowed']
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
    <label>
        Insert your name:
        <input type="text" name="customer_name" value="<?php
		echo is_form_submit_correct() ? '' : $customer_name;
		?>">
    </label>
    <span class="<?php echo print_error_style( 'customer_name' ); ?>">
        * <?php echo print_error_message( 'customer_name' ) ?>
    </span>
    <br><br>
    <label for="">
        Your E-mail address:
        <input type="text" name="customer_email" value="<?php
		echo is_form_submit_correct() ? '' : $customer_email;
		?>">
    </label>
    <span class="<?php echo print_error_style( 'customer_email' ); ?>">
        * <?php echo print_error_message( 'customer_email' ) ?>
    </span>
    <br><br>
    <label>
        Your site URL:
        <input type="text" name="site_url" value="<?php
        echo is_form_submit_correct()? '' : $site_url;
        ?>">
    </label>
    <span class="<?php echo print_error_style( 'site_url' ); ?>">
             <?php echo print_error_message( 'site_url' ) ?>
    </span>
    <br><br>
    <label>
        Your request:
        <textarea name="request_detail" rows="5" cols="40"><?php echo is_form_submit_correct()? '': $request_detail; ?></textarea>
    </label>
    <br><br>
    <label>Type of support: </label>
    <label>
        <input type="radio" name="support_type" value="free" <?php if ( isset( $support_type ) && $support_type == 'free' ) {
			echo 'checked';
		} ?>>
        Free
    </label>
    <label>
        <input type="radio" name="support_type" value="credit" <?php if ( isset( $support_type ) && $support_type == 'credit' ) {
			echo 'checked';
		} ?>>
        Credit
    </label>
    <span class="<?php echo print_error_style( 'support_type' ); ?>">
        * <?php echo print_error_message( 'support_type' ) ?>
    </span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php

if ( is_form_submit_correct() ) {
    echo <<< HTML
    <p><b>Your form is submitted</b></p>
    <h2>Your Input:</h2>
    Customer name: $customer_name
    <br>
    Customer email: $customer_email
    <br>
    Site URL: $site_url;
    <br>
    Request detail: $request_detail
    <br>
    Support type: $support_type

HTML;
}


?>

</body>
</html>