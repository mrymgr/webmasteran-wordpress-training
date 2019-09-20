<?php

if ( isset($_GET['type']) && ! empty($_GET['type']) ) {
    $request_type = $_GET['type'];
} else {
    $request_type = '';
}


require 'header.php';
include 'header.php';

if ( $request_type == 'gholam') {
    include 'main2.php';
} else {
    include_once 'main.php';
}

include_once 'main.php';
include_once 'main.php';


include 'footer.php';

?>



