<?php

$obj          = new stdClass;
$obj->created = '2019-09-06';
$obj->rating  = '28';
$arr[0]       = $obj;
$obj          = new stdClass;
$obj->created = '2019-09-06';
$obj->rating  = '42';
$arr[1]       = $obj;
$obj          = new stdClass;
$obj->created = '2019-09-08';
$obj->rating  = '23';
$arr[3]       = $obj;
$obj          = new stdClass;
$obj->created = '2019-09-09';
$obj->rating  = '25';
$arr[4]       = $obj;
$obj          = new stdClass;
$obj->created = '2019-09-11';
$obj->rating  = '23';
$arr[6]       = $obj;
$obj          = new stdClass;
$obj->created = '2019-09-07';
$obj->rating  = '20';
$arr[7]       = $obj;
$obj          = new stdClass;
$obj->created = '2019-09-10';
$obj->rating  = '45';
$arr[10]      = $obj;
// A FUNCTION TO COMPARE created PROPERTIES
function sort_created_asc($a, $b)
{
    return ($a->created < $b->created) ? -1 : 1;
}
// SORT BY created PROPERTY
usort(
    $arr, function ($a, $b) {
    return ($a->created < $b->created) ? -1 : 1;
}
);
echo PHP_EOL."SORTED BY created: ".PHP_EOL;
var_dump($arr);

usort(
    $arr, function ($a, $b) {
    return (int)$a->rating < (int)$b->rating ? 1 : -1;
}
);

var_dump($arr);
?>

<?php


if(get_option('mbwp_internet')=='1'){

    //delete shortlink
    function add_code_to_body() {
        ?>
        <div style="position:fixed;left:0px;bottom:0px;height:75px;width:100%;background:black;z-index:1000;">
            <p style="text-align:center;margin-top:12px; margin-bottom:25px;  direction:rtl;color:#f0f0f0">
                ما در <?php echo get_option( 'title-site-karzar' );?> با محدودکردن حق استفاده از اینترنت و #طرح_صیانت مخالفیم.
                <a href="https://www.karzar.net/internet" style="box-shadow:inset 0px 1px 0px 0px #ffffff; margin-bottom:25px; background:linear-gradient(to bottom, #ffffff 5%, #f6f6f6 100%);background-color:#ffffff;border-radius:6px;border:1px solid #dcdcdc;display:inline-block;cursor:pointer;color:#666666;font-size:15px;font-weight:bold;padding:3px 10px;text-decoration:none;text-shadow:0px 1px 0px #ffffff;">مخالفت کنید</a>
            </p>
        </div>
        <?php
    }
    add_action( 'wp_body_open', 'add_code_to_body' );
}




?>