<?php
function carsNeeded($n) {
    return ceil($n / 5);
}

$people = 17;

echo "Number of people: " . $people . "<br>";
echo "Number of cars needed: " . carsNeeded($people) . "<br>";
?>