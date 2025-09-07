<?php
function frontFourCopies($str) {
   
    if (strlen($str) < 2) {
        return $str;
    } else {
        $firstTwo = substr($str, 0, 2);
        
        return str_repeat($firstTwo, 4);
    }
}

$inputs = ["C Sharp", "JS", "a"];

foreach ($inputs as $input) {
    echo frontFourCopies($input) . "<br>";
}
?>