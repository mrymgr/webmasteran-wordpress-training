<?php

use Webmasteran\Sample_Classes\Database\Db_Extend;
use Webmasteran\Sample_Classes\Functions\Date;

require '../../vendor/autoload.php';
$current_script = basename( __FILE__, '.php' );
require_once 'template_parts/header_db_sample.php';
?>


    <div class="uk-section msn-p-td-10">
        <div class="uk-container">
            <div class="uk-child-width-expand@s" uk-grid>
                <div class="uk-width-1-1@m">
                    <div class="uk-card uk-card-default uk-card-body">
                        <canvas id="currency-line-chart"></canvas>
                    </div>
                </div>

            </div>

        </div>
        <br>
        <div class="uk-container">
            <div class="uk-child-width-expand@s" uk-grid>
                <div class="uk-width-1-1@m">
                    <div class="uk-card uk-card-default uk-card-body">
                        <canvas id="currency-radar-chart"></canvas>
                    </div>
                </div>

            </div>

        </div>
    </div>


<?php

#select data from database
$msn_db_connection = Db_Extend::get_instance( "localhost", "mehdi", "mznx9182", "msntrainers", false );
$dates             = [];
$jalali_dates      = [];
$dollars           = [];
$euros             = [];
$sample_query      = "SELECT dollar, euro, DATE(created_date) as created_date FROM currency ORDER BY created_date DESC LIMIT 20";
//$sample_query      = "SELECT dollar, euro, created_date FROM currency ORDER BY id DESC LIMIT 15";
$records = array_reverse( $msn_db_connection->fetch_all_query( $sample_query ) );
//var_dump($msn_db_connection->fetch_all_query( $sample_query ));
foreach ( $records as $record ) {
	$dates[]   = $record->created_date;
	$dollars[] = $record->dollar;
	$euros[]   = $record->euro;

}

foreach ( $dates as $date ) {
	[ $year, $month, $day ] = explode( '-', $date );
	$jalali_dates[] = Date::gregorian_to_jalali( $year, $month, $day, ' / ' );
}

/*var_dump( $dates );
var_dump( $jalali_dates );
var_dump( $dollars );
var_dump( $euros );*/



require_once 'template_parts/footer_db_sample.php';












