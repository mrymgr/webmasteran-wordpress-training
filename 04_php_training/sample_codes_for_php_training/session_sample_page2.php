<?php
session_start();

if ( ! isset( $_SESSION['total_views'] ) ) {
	$_SESSION['total_views'] = 1;
} else {
	$_SESSION['total_views'] += 1;
}

if ( ! isset( $_SESSION['page2_views'] ) ) {
	$_SESSION['page2_views'] = 1;
} else {
	$_SESSION['page2_views'] += 1;
}

if ( isset( $_GET['remove'] ) && ! empty( $_GET['remove'] ) ) {
	switch ( $_GET['remove'] ) {
		case 'all':
			$_SESSION['total_views'] = 0;
			$_SESSION['page1_views'] = 0;
			$_SESSION['page2_views'] = 0;
			break;
		case 'page1':
			$_SESSION['total_views'] -= $_SESSION['page1_views'];
			$_SESSION['page1_views'] = 0;
			break;
		case 'page2':
			$_SESSION['total_views'] -= $_SESSION['page2_views'];
			$_SESSION['page2_views'] = 0;
			break;
		default:
			die( 'chera alaki mizani gholam!!' );
			break;
	}
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .msn-m15 {
            margin: 15px;
        }

        .msn-for-btn {
            display: inline-block;
            text-decoration: none !important;
            background-color: #276dff;
            color: white;
            font-size: 18px;
            padding: 10px !important;
        }
    </style>
</head>
<body>
<h2>View counts for Page1: <?php echo @$_SESSION['page1_views']; ?></h2>
<h2>View counts for Page2: <?php echo @$_SESSION['page2_views']; ?></h2>
<h2>Total View counts: <?php echo @$_SESSION['total_views']; ?></h2>


<div>Useful link</div>
<div class="msn-m15"><a class="msn-for-btn" href="session_sample_page1.php">Go to page1</a></div>
<div class="msn-m15"><a class="msn-for-btn" href="session_sample_page2.php">Go to page2</a></div>
<div class="msn-m15"><a class="msn-for-btn" href="?remove=page1">Remove view count for page1</a></div>
<div class="msn-m15"><a class="msn-for-btn" href="?remove=page2">Remove view count for page2</a></div>
<div class="msn-m15"><a class="msn-for-btn" href="?remove=all">Remove view count for all pages</a></div>
</body>
</html>