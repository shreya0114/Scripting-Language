<?php
function diff51($n) {
    $diff = abs($n - 51);
    if ($n > 51) {
        return 3 * $diff;
    } else {
        return $diff;
    }
}

echo "Case 1: n = 30<br>";
echo "Result = " . diff51(30) . "<br><br>";

echo "Case 2: n = 51<br>";
echo "Result = " . diff51(51) . "<br><br>";

echo "Case 3: n = 70<br>";
echo "Result = " . diff51(70) . "<br>";
?>