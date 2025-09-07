<?php
function addLastCharFrontBack($str) {
   
    $lastChar = substr($str, -1);

    return $lastChar . $str . $lastChar;
}
$inputs = ["Red", "Green", "1"];

foreach ($inputs as $input) {
    echo addLastCharFrontBack($input) . "<br>";
}
?>