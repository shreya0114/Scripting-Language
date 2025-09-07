<?php
function computeSum($a, $b) {
    if ($a == $b) {
        return 3 * ($a + $b);
    } else {
        return $a + $b;
    }
}

echo "Case 1:<br>";
echo "a = 10<br>";
echo "b = 20<br>";
echo "Result = " . computeSum(10, 20) . "<br><br>";

echo "Case 2:<br>";
echo "a = 5<br>";
echo "b = 5<br>";
echo "Result = " . computeSum(5, 5) . "<br>";
?>
