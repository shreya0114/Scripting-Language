<?php
function stringLength($str) {
      if ($str === "") {
        return 0;
    } else {
       
        return 1 + stringLength(substr($str, 1));
    }
}
$text = "Hello World";
echo "The length of '$text' is: " . stringLength($text);
?>