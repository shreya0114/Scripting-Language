<?php
function isEqualLength($str1, $str2) {
    return strlen($str1) === strlen($str2);
}
$string1 = "Python";
$string2 = "Hello";

$result = isEqualLength($string1, $string2);

echo "String 1: \"$string1\" (Length: " . strlen($string1) . ")<br>";
echo "String 2: \"$string2\" (Length: " . strlen($string2) . ")<br>";
echo "Are the lengths equal? " . ($result ? "True" : "False");
?>