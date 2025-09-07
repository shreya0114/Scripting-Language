<?php
function addIfToFront($str) {

    if (substr($str, 0, 2) === "if") {
        return $str;
    } else {
        return "if " . $str;
    }
}


$inputs = ["if else", "else", "if"];

foreach ($inputs as $input) {
    echo addIfToFront($input) . "<br>";
}
?>