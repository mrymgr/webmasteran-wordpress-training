<?php

use Webmasteran\Sample_Classes\Database\Db_Extend;


require '../../vendor/autoload.php';
$current_script = basename( __FILE__, '.php' );
require_once 'template_parts/header_db_sample.php';
if ( isset( $_GET['id'] ) && ! empty( $_GET['id'] ) && is_numeric( $_GET['id'] ) ) {
	$id = $_GET['id'];
} else {
	die( '<h2>You can not access to this page, Please use another links from site menu!</h2>' );
}

#select data from database
$msn_db_connection = Db_Extend::get_instance( "localhost", "mehdi", "mznx9182", "msntrainers", false );

$sample_query = "DELETE FROM currency WHERE id = $id";
$msn_db_connection->safe_execute( $sample_query, null, true, true );
$deleted_item_count = $msn_db_connection->get_row_count();

?>

    <div class="uk-section msn-p-td-10">
		<?php if ( $deleted_item_count == 1 ) : ?>
            <div class="uk-container">
                <div class="uk-child-width-expand@s uk-width-2-3 uk-margin-auto msn-p-15" uk-grid>
                    <div class="uk-card uk-card-default uk-card-body">
                        <h1 class="uk-text-primary">Delete Message</h1>
                        <p class="uk-text-success">
                            You deleted record with id = <?php echo $id; ?> from currency database!
                        </p>
                    </div>

                </div>

            </div>
		<?php else: ?>
            <div class="uk-container">
                <div class="uk-child-width-expand@s uk-width-2-3 uk-margin-auto msn-p-15" uk-grid>
                    <div class="uk-card uk-card-default uk-card-body">
                        <h1 class="uk-text-primary">Delete Message</h1>
                        <p class="uk-text-danger">
                            You can not delete record with id = <?php echo $id; ?> from currency database!
                        </p>
                    </div>

                </div>

            </div>
		<?php endif; ?>


        <br>

    </div>


<?php


require_once 'template_parts/footer_db_sample.php';












