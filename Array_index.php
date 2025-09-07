<?php
function findIndex($arr, $str) {
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] === $str) {
            return $i; 
        }
    }
    return -1; 
}

$fruits = ["apple", "banana", "cherry", "date"];
$search = "cherry";

$index = findIndex($fruits, $search);

if ($index != -1) {
    echo "'$search' found at index: $index\n";
} else {
    echo "'$search' not found in the array.\n";
}
?>