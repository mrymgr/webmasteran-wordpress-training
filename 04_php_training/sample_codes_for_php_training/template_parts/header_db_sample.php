<?php
global $current_script;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Converter</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/css/uikit.min.css"/>

    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit-icons.min.js"></script>
    <style>
        .msn-p-td-10 {
            padding-bottom: 10px !important;
            padding-top: 10px !important;
        }

        .msn-p-15 {
            padding: 15px !important;
        }
    </style>
</head>
<body>

<nav class="uk-navbar-container uk-margin" uk-navbar="mode: click">
    <div class="uk-navbar-left">

        <ul class="uk-navbar-nav">
            <li><a href="#">Show</a></li>
            <li>
                <a href="#">Insert</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="<?php echo $current_script == 'db_samples_07'? 'uk-active': ''; ?>"><a href="db_samples_07.php">From form</a></li>
                        <li class="<?php echo $current_script == 'db_samples_09'? 'uk-active': ''; ?>"><a href="db_samples_09.php">Random generate</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="#">Item</a></li>
        </ul>

    </div>
</nav>