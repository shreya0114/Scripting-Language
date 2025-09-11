<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect values from form
    $principal = $_POST['principal'];
    $rate      = $_POST['rate'];
    $time      = $_POST['time'];

    $si = ($principal * $rate * $time) / 100;

    echo "<h2 style='text-align:center;'>Simple Interest Calculator</h2>";
    echo "<table border='1' cellpadding='10' cellspacing='0' align='center'>";
    echo "<tr><td><b>Principal</b></td><td>$principal</td></tr>";
    echo "<tr><td><b>Rate (%)</b></td><td>$rate</td></tr>";
    echo "<tr><td><b>Time (years)</b></td><td>$time</td></tr>";
    echo "<tr><td><b>Simple Interest</b></td><td>$si</td></tr>";
    echo "</table>";
} else {

    ?>
    <h2 style="text-align:center;">Simple Interest Calculator</h2>
    <form method="post" action="" style="width:300px;margin:auto;">
        <label>Principal Amount:</label><br>
        <input type="number" name="principal" required><br><br>
        <label>Rate of Interest (%):</label><br>
        <input type="number" name="rate" step="0.01" required><br><br>
        <label>Time (in years):</label><br>
        <input type="number" name="time" required><br><br>
        <input type="submit" value="Calculate">
    </form>
    <?php
}

?>
