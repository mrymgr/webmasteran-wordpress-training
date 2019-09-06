<?php

$style_files_array = [
	'red'   => 'red.css',
	'blue'  => 'blue.css',
	'green' => 'green.css',
];

$is_query_param_set = false;

if ( isset( $_GET['color'] ) && ! empty( $_GET['color'] ) && array_key_exists( $_GET['color'], $style_files_array ) ) {
	$is_query_param_set = true;
    $style_file = '';
	switch ( $_GET['color'] ) {
		case  'red':
			$style_file = $style_files_array['red'];
			break;
		case 'blue':
			$style_file = $style_files_array['blue'];
			break;
		case 'green':
			$style_file = $style_files_array['green'];
			break;
	}
	//var_dump($style_file);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/<?php echo $is_query_param_set? $style_file : 'defualt.css'; ?>">
</head>
<body>
<h1>Salam Gholame Mehrabooon!</h1>
</body>
</html>
