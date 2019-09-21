<?php

use Webmasteran\Sample_Classes\Database\Db_Extend;

require '../../vendor/autoload.php';
$current_script = basename(__FILE__, '.php');
require_once 'template_parts/header_db_sample.php';
?>


<div class="uk-section msn-p-td-10">
    <div class="uk-container">
        <div class="uk-child-width-expand@s" uk-grid>
            <div class="uk-width-1-1@m">
                <div class="uk-card uk-card-default uk-card-body">
                    <canvas id="currency"></canvas>
                </div>
            </div>

        </div>

    </div>
    <div class="uk-container">
        <div class="uk-child-width-expand@s uk-width-2-3 uk-margin-auto msn-p-15" uk-grid>
            <form class="uk-form-stacked" action="db_samples_10.php" method="post">

                <div class="uk-margin">
                    <label class="uk-form-label" for="number">Number of rows that you want to generate</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="number" name="number" type="text" placeholder="Put only numbers here!">
                    </div>
                </div>
                <button class="uk-button uk-button-primary" name="random-generate">Save to Database</button>

            </form>

        </div>
    </div>

</div>


<?php
require_once 'template_parts/footer_db_sample.php';












