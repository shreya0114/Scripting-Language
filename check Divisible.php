<?php
function isDivisibleBy5($num) {
    return $num % 5 == 0;
}
echo "Enter a number: ";
$number = trim(fgets(STDIN));
if (isDivisibleBy5($number)) {
    echo "$number is divisible by 5.";
} else {
    echo "$number is not divisible by 5.";
}
?>