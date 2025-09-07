<?php
function findLargest($a, $b, $c) {
    if ($a >= $b && $a >= $c) {
        return $a;
    } elseif ($b >= $a && $b >= $c) {
        return $b;
    } else {
        return $c;
    }
}

$num1 = 35;
$num2 = 42;
$num3 = 20;

echo "The largest number is: " . findLargest($num1, $num2, $num3) . "<br>";
?>