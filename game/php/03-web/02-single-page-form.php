<?php

if ( isset( $_POST['name'] ) ) {


	$subject = $_POST['name'];
	$pattern = '/^[a-zA-Z ]{3,}$/';
	$matched = preg_match($pattern, $subject, $matches);

	if ( $matched ) {
	  ?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <title>Say HI</title>
    </head>
    <body>
    <h1>Say my name!</h1>
    Hello <?php echo $subject; ?>
    </body>
    </html>
    <?php

	} else {
		?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <title>Say HI</title>
    </head>
    <body>
    <h1>Say my name!</h1>
    <form method="post" action="#">
      <input type="text" name="name">
      <span style="color: red">invalid name</span>
      <input type="submit" value="Say it!">
    </form>
    </body>
    </html>
		<?php
	}

}
else {

?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <title>Say HI</title>
  </head>

  <body>
  <h1>Say my name!</h1>
  <form method="post">
    <input type="text" name="name">
    <input type="submit" value="Say it!">
  </form>
  </body>
  </html>
<?php

}

?>

