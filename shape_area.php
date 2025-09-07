<?php

function calculateArea($base, $height, $shape) {
    $shape = strtolower($shape); 

    if ($shape == "triangle") {
        return 0.5 * $base * $height;
    } elseif ($shape == "parallelogram") {
        return $base * $height;
    } else {
        return "Invalid shape!";
    }
}
echo "Area of triangle (base=10, height=5): " . calculateArea(10, 5, "triangle") . "\n";
echo "Area of parallelogram (base=8, height=6): " . calculateArea(8, 6, "parallelogram") . "\n";
?>