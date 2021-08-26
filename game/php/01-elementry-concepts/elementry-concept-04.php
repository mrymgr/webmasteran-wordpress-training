<?php

$array_length    = readline('Please input student count: ');
$name_for_search = readline('Please input student name for search: ');
$players         = [];
for ($i = 0; $i < $array_length; $i++) {
    $players[] = readline('Input all of your student: ');
}

if (in_array($name_for_search, $players)) {
    echo 'YES';
} else {
    echo 'NO';
}


