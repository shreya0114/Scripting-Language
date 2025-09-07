<?php
$integerVar = 25;         
$floatVar = 12.5;          
$stringVar = "Hello PHP";  
$booleanVar = true;        
$arrayVar = array(1, 2, 3, "apple", "banana"); 
$nullVar = NULL;          

echo "Integer Value: $integerVar <br>";
echo "Float Value: $floatVar <br>";
echo "String Value: $stringVar <br>";
echo "Boolean Value: " . ($booleanVar ? 'true' : 'false') . "<br>";
echo "Null Value: "; echo $nullVar; echo "<br>";

print "Using print - Integer: $integerVar <br>";
print "Using print - Float: $floatVar <br>";
print "Using print - String: $stringVar <br>";
print "Using print - Boolean: " . ($booleanVar ? 'true' : 'false') . "<br>";
print "Using print - Null: $nullVar <br>";


echo "<h3>Array Display</h3>";
echo "Using print_r:<br>";
print_r($arrayVar);
echo "<br><br>Using var_dump:<br>";
var_dump($arrayVar);
echo "<br>";


echo "<h3>Data Type Checking</h3>";
echo "Is \$integerVar integer? " . (is_int($integerVar) ? 'Yes' : 'No') . "<br>";
echo "Is \$floatVar float? " . (is_float($floatVar) ? 'Yes' : 'No') . "<br>";
echo "Is \$stringVar string? " . (is_string($stringVar) ? 'Yes' : 'No') . "<br>";
echo "Is \$booleanVar boolean? " . (is_bool($booleanVar) ? 'Yes' : 'No') . "<br>";
echo "Is \$arrayVar array? " . (is_array($arrayVar) ? 'Yes' : 'No') . "<br>";
echo "Is \$nullVar null? " . (is_null($nullVar) ? 'Yes' : 'No') . "<br>";
?>