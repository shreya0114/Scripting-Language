<?php
function addFrontBack($str) {
   
    $firstThree = substr($str, 0, 3);
    
    return $firstThree . $str . $firstThree;
}

$inputs = ["Python", "JS", "Code"];

foreach ($inputs as $input) {
    echo addFrontBack($input) . "<br>";
}
?>