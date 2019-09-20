<?php

use Webmasteran\Sample_Classes\Database\Db_Extend;

require '../../vendor/autoload.php';
$current_script = basename(__FILE__, '.php');
require_once 'template_parts/header_db_sample.php';
?>


<div class="uk-section msn-p-td-10">
    <div class="uk-container">
        <div class="uk-child-width-expand@s" uk-grid>
            <div class="uk-width-1-2@m">
                <div class="uk-card uk-card-default uk-card-body">
                    <h1>Converter</h1>
                    <p>
                        You can save dollar and euro price with this form!
                    </p>
                </div>
            </div>

        </div>
        <div class="uk-child-width-expand@s" uk-grid>
            <div class="uk-width-1-2@m"></div>

        </div>
    </div>
    <div class="uk-container">
        <div class="uk-child-width-expand@s uk-width-2-3 uk-margin-auto msn-p-15" uk-grid>
            <form class="uk-form-stacked" action="db_samples_08.php" method="post">

                <div class="uk-margin">
                    <label class="uk-form-label" for="euro">Euro</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="euro" name="euro" type="text" placeholder="Put your euro price here!">
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="dollar">Dollar</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="dollar" name="dollar" type="text" placeholder="Put your dollar price here!">
                    </div>
                </div>
                <button class="uk-button uk-button-primary" name="save-to-db">Save to Database</button>

            </form>

        </div>
    </div>

</div>
<?php
require_once 'template_parts/footer_db_sample.php';












