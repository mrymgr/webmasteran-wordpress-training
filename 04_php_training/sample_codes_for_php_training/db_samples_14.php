<?php

use Webmasteran\Sample_Classes\Database\Db_Extend;
use Webmasteran\Sample_Classes\Functions\Utility;

require '../../vendor/autoload.php';
$current_script = basename( __FILE__, '.php' );
require_once 'template_parts/header_db_sample.php';
$id = 0;

if ( @Utility::get_id( $_GET['id'] ) ) {
	$id = Utility::get_id( $_GET['id'] );
}


#select data from database
$msn_db_connection = Db_Extend::get_instance( "localhost", "mehdi", "mznx9182", "msntrainers", false );
$select_query = "SELECT * FROM currency WHERE id = $id";
$record = $msn_db_connection->safe_fetch_all($select_query);
$record = array_shift($record);

?>


    <div class="uk-section msn-p-td-10">
        <div class="uk-container">
            <div class="uk-child-width-expand@s uk-width-2-3 uk-margin-auto msn-p-15" uk-grid>
                <div class="uk-card uk-card-default uk-card-body">
                    <h2 class="uk-text-primary">Update record in currency table</h2>
                    <h3 class="uk-text-secondary">
                        You have requested to update record id:
                        <span class="uk-text-bold uk-text-danger"><?php echo $record->id; ?></span>
                        in currency table!
                    </h3>
                </div>

            </div>

        </div>
        <div class="uk-container">
            <div class="uk-child-width-expand@s uk-width-2-3 uk-margin-auto msn-p-15" uk-grid>
                <form class="uk-form-stacked" action="db_samples_08.php" method="post">

                    <div class="uk-margin">
                        <label class="uk-form-label" for="euro">Euro</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="euro" name="euro" type="text" value="<?php echo $record->euro;?>">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="dollar">Dollar</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="dollar" name="dollar" type="text" value="<?php echo $record->dollar; ?>">
                        </div>
                    </div>
                    <div>
                        <input type="hidden" name="request-type" value="update">
                    </div>
                    <div>
                        <input type="hidden" name="id" value="<?php echo $record->id; ?>">
                    </div>
                    <button class="uk-button uk-button-primary" name="save-to-db">Update in database</button>

                </form>

            </div>
        </div>

    </div>
<?php
require_once 'template_parts/footer_db_sample.php';












