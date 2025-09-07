<?php
function getValueByIndex($arr, $index) {
    if (isset($arr[$index])) {
        return $arr[$index]; 
    } else {
        return "Invalid index!";
    }
}

$fruits = ["apple", "banana", "cherry", "date"];
$index = 2;

$value = getValueByIndex($fruits, $index);
echo "Value at index $index: $value\n";
?>