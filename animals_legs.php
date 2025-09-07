<?php
$totalLegs = 0;
if (isset($_POST['submit'])) {
    $chickens = $_POST['chickens'];
    $cows = $_POST['cows'];
    $pigs = $_POST['pigs'];

    $totalLegs = ($chickens * 2) + ($cows * 4) + ($pigs * 4);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Animal Legs Calculator</title>
</head>
<body>
    <h2>Calculate Total Number of Legs</h2>
    <form method="post">
        Number of Chickens: <input type="number" name="chickens" value="<?php echo isset($chickens) ? $chickens : 0; ?>" required><br><br>
        Number of Cows: <input type="number" name="cows" value="<?php echo isset($cows) ? $cows : 0; ?>" required><br><br>
        Number of Pigs: <input type="number" name="pigs" value="<?php echo isset($pigs) ? $pigs : 0; ?>" required><br><br>
        <input type="submit" name="submit" value="Calculate">
    </form>

    <?php if (isset($_POST['submit'])): ?>
        <h3>Results:</h3>
        <p>Chickens: <?php echo $chickens; ?> → Legs: <?php echo $chickens * 2; ?></p>
        <p>Cows: <?php echo $cows; ?> → Legs: <?php echo $cows * 4; ?></p>
        <p>Pigs: <?php echo $pigs; ?> → Legs: <?php echo $pigs * 4; ?></p>
        <p><strong>Total Legs: <?php echo $totalLegs; ?></strong></p>
    <?php endif; ?>
</body>
</html>