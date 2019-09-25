<?php

use Webmasteran\Sample_Classes\Database\Db_Extend;
use Webmasteran\Sample_Classes\Functions\Date;

require '../../vendor/autoload.php';
$current_script = basename( __FILE__, '.php' );
require_once 'template_parts/header_db_sample.php';
if ( isset( $_GET['page'] ) && ! empty( $_GET['page'] ) && is_numeric( $_GET['page'] ) ) {
	$page = $_GET['page'];
} else {
	$page = 1;
}

$offset      = 10;
$start_limit = ( $page - 1 ) * $offset;

#select data from database
$msn_db_connection = Db_Extend::get_instance( "localhost", "mehdi", "mznx9182", "msntrainers", false );
/*
 * Problem in fetch data
 * I must change it in future for int values
 * https://stackoverflow.com/questions/4544051/sqlstate42000-syntax-error-or-access-violation-1064-you-have-an-error-in-you
 * */
$sample_query  = "SELECT id,dollar, euro  FROM currency ORDER BY id ASC LIMIT $start_limit,$offset";
$query_results = $msn_db_connection->safe_fetch_all( $sample_query, null, null, false );

#get row count of currency table
$row_count_query          = "SELECT count(*) as count FROM currency ";
$currency_table_row_count = $msn_db_connection->fetch_query( $row_count_query );
$pagination_count         = ceil( (int) $currency_table_row_count->count / $offset );


?>


    <div class="uk-section msn-p-td-10">
        <div class="uk-container">
            <div class="uk-child-width-expand@s uk-width-2-3 uk-margin-auto msn-p-15" uk-grid>
                <div class="uk-card uk-card-default uk-card-body">
                    <h1 class="uk-text-primary">Modifier</h1>
                    <p class="uk-text-success">
                        You can update and delete dollar and euro prices with this table!
                    </p>
                </div>

            </div>

        </div>
        <div class="uk-container">
            <div class="uk-child-width-expand@s" uk-grid>
                <div class="uk-width-1-1@m">
                    <div class="uk-card uk-card-default uk-card-body">
                        <h2 class="uk-text-center">List of Euro & Dollar prices</h2>
                        <table class="uk-table uk-table-striped uk-table-hover">
                            <thead>
                            <tr>
                                <th class="uk-text-bold uk-text-emphasis">ID</th>
                                <th class="uk-text-bold uk-text-emphasis">Dollar</th>
                                <th class="uk-text-bold uk-text-emphasis">Euro</th>
                                <th class="uk-text-bold uk-text-emphasis uk-text-center">Update</th>
                                <th class="uk-text-bold uk-text-emphasis uk-text-center">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php foreach ( $query_results as $query_result ): ?>
                                <tr>
                                    <td><?php echo $query_result->id; ?></td>
                                    <td><?php echo $query_result->dollar; ?></td>
                                    <td><?php echo $query_result->euro; ?></td>
                                    <td class="uk-text-center">
                                        <a href="db_samples_14.php?id=<?php echo $query_result->id; ?>">
                                            <button class="uk-button uk-button-default uk-button-primary" type="button">Update record</button>
                                        </a>
                                    </td>
                                    <td class="uk-text-center">
                                        <a href="db_samples_13.php?id=<?php echo $query_result->id; ?>">
                                            <button class="uk-button uk-button-default uk-button-danger" type="button">Delete record</button>
                                        </a>
                                    </td>
                                </tr>
							<?php endforeach; ?>
                            </tbody>
                        </table>
                        <div>
                            <ul class="uk-pagination uk-flex-center" uk-margin>
								<?php if ( $page > 1 ) : ?>
                                    <li>
                                        <a href="?page=<?php echo $page - 1; ?>">
                                            <span uk-pagination-previous></span>
                                        </a>
                                    </li>
								<?php endif; ?>

								<?php for ( $i = 0; $i < $pagination_count; $i ++ ) : ?>
                                    <li class="<?php echo $page - 1 == $i ? 'uk-active' : ''; ?> ">
                                        <a href="?page=<?php echo $i + 1; ?>">
                                            <span><?php echo $i + 1; ?></span>
                                        </a>
                                    </li>
								<?php endfor; ?>

								<?php if ( $page < $pagination_count ) : ?>
                                    <li>
                                        <a href="?page=<?php echo $page + 1; ?>">
                                            <span uk-pagination-next></span>
                                        </a>
                                    </li>
								<?php endif; ?>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <br>
    </div>


<?php


require_once 'template_parts/footer_db_sample.php';












