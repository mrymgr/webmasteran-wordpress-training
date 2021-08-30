<?php

$array_length    = readline('Please input student count: ');
$name_for_search = readline('Please input student name for search: ');
$players         = [];
for ($i = 0; $i < $array_length; $i++) {
    $players[] = readline('Input all of your student: ');
}

$result = 'NO';
for ($j = 0; $j < $array_length; $j++) {
    if ($name_for_search == $players[$j]) {
        $result = 'YES';
        break;
    }
}

echo $result;

