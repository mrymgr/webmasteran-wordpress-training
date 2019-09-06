<!DOCTYPE HTML>
<html>
<head>
</head>
<body>


<?php

//$customer_name = $customer_email = $support_type = $request_detail = $site_url = "";

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
	$customer_name  = test_input( $_POST["customer_name"] );
	$customer_email = test_input( $_POST["customer_email"] );
	$site_url       = test_input( $_POST["site_url"] );
	$request_detail = test_input( $_POST["request_detail"] );
	$support_type   = test_input( $_POST["support_type"] );
}

function test_input( $data ) {
	$data = trim( $data );
	$data = stripslashes( $data );
	$data = htmlspecialchars( $data );

	return $data;
}

?>


<h1>Contact Us</h1>
<form method="post" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>">
    <label>Insert your name: <input type="text" name="customer_name"></label>
    <br><br>
    <label for="">Your E-mail address: <input type="text" name="customer_email"></label>
    <br><br>
    <label>Your site URL: <input type="text" name="site_url"></label>
    <br><br>
    <label>Your request: <textarea name="request_detail" rows="5" cols="40"></textarea></label>
    <br><br>
    <label>Type of support: </label>
    <label><input type="radio" name="support_type" value="free" checked> Free</label>
    <label><input type="radio" name="support_type" value="credit"> Credit</label>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if ( isset( $_POST ) && ! empty( $_POST ) ) {
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