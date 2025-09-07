<?php
function upperLastThree($str) {
    $length = strlen($str);
    
    if ($length < 3) {
      
        return strtoupper($str);
    } else {
      
        $start = substr($str, 0, $length - 3);
        $end = substr($str, -3);
        return $start . strtoupper($end);
    }
}

$inputs = ["Nepal", "Npl", "Bca", "Bachelor"];

foreach ($inputs as $input) {
    echo upperLastThree($input) . "<br>";
}
?>