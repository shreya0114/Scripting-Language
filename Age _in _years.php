<?php

function ageInDays($ageYears) {
    return $ageYears * 365; 
}
$ageYears = 25;
$days = ageInDays($ageYears);

echo "Age in Years: $ageYears <br>";
echo "Age in Days: $days";
?>
