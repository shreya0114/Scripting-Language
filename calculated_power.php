<?php
function calculatePower($voltage, $current) {
    return $voltage * $current; 
}
$voltage = 10;
$current = 3;  
$power = calculatePower($voltage, $current);

echo "Voltage: $voltage V <br>";
echo "Current: $current A <br>";
echo "Calculated Power: $power W";
?>