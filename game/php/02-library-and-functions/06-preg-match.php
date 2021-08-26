<?php

function findPhoneNumbers($input_value)
{
    $pattern = '/((\s|^)09\d{9}(\s|$))|((\s|^)\+9891\d{8}(\s|$))/';
    /*$result = [];
    $replacement = '';
    while ( preg_match($pattern, $input_value, $matches) ) {
        $result[] = trim($matches[0]);
        $from = '/'.preg_quote(trim($matches[0]), '/').'/';
        $input_value =  preg_replace($from, '', $input_value, 1);
    }
    return $result;*/

    $result = preg_match_all( $pattern, $input_value, $matches);
    if ($result) {
        foreach ( $matches[0] as $key => $value) {
            $matches[0][$key] = trim($value);
        }
        return $matches[0];
    } else {
        return [];
    }



}

function findHashtags($input_value)
{
    $pattern = '/(\s#[a-zA-Z0-9]{3,}\s)|(^#[a-zA-Z0-9]{3,}\s)|(\s#[a-zA-Z0-9]{3,}$)/';
    $result = preg_match_all( $pattern, $input_value, $matches);
    if ($result) {
        foreach ( $matches[0] as $key => $value) {
            $matches[0][$key] = trim($value);
        }
        return $matches[0];
    } else {
        return [];
    }
}

function boldEmails($input_value)
{
    $pattern = '/\s([a-zA-Z0-9\._]+@[a-zA-Z0-9]+\.[a-zA-Z]{3})\s/';
    $replacement = ' <b>$1</b> ';
    $input_value = preg_replace( $pattern, $replacement, $input_value);
    $pattern = '/^([a-zA-Z0-9\._]+@[a-zA-Z0-9]+\.[a-zA-Z]{3})\s/';
    $replacement = '<b>$1</b> ';
    $input_value = preg_replace( $pattern, $replacement, $input_value);
    $pattern = '/\s([a-zA-Z0-9\._]+@[a-zA-Z0-9]+\.[a-zA-Z]{3})$/';
    $replacement = ' <b>$1</b>';
    $input_value = preg_replace( $pattern, $replacement, $input_value);

    return $input_value;


}

//var_dump(boldEmails("info_test@Quera.ire Soalatono az  ya info@Quera123.com ya test_23@alaki.cor beporsid test_23@alaki.cor"));
//echo boldEmails("Soalatono az info_test@Quera.ir ya info@Quera123.com ya test_23@alaki.cor beporsid");

//var_dump(findHashtags("Salam #goodMOrning khoobi#to #4yourlove #bi-man"));

/*preg_match_all("/\(?  (\d{3})?  \)?  (?(1)  [\-\s] ) \d{3}-\d{4}/x",
    "Call 555-1212 or 1-800-555-1212", $phones);
*/
//var_dump( findPhoneNumbers('09123456789 In shomareye mane: 09101007567 vali behtare +989101007567 ro save koni. In 09111231234 +989121234567 +989121234568 +989121234569 va09124755772 kar nemikonan. 09123456789 '));
var_dump(findPhoneNumbers('09123456789 In shomareye mane: 09101007567 vali behtare +989101007567 ro save koni. In 09111231234 +989124755775 09111231235 va09124755772 kar nemikonan. 09123456789'));
//var_dump(findPhoneNumbers('ghosfsf'));


/*
 *  |(^09\d{9}\s)|(\s09\d{9}$)
 * */
?>