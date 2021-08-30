<?php

function isPrime($number)
{
    if ($number <= 1) {
        return false;
    }
    for ($i = 2; $i <= $number - 1; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}

