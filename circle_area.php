<?php
define("PI", 3.14159);

$radius = "";
$area = "";

if (isset($_POST['radius'])) {
    $radius = $_POST['radius'];  
    $area = PI * $radius * $radius;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Area of Circle</title>
</head>
<body>
    <h2>Calculate Area of Circle</h2>
    <form method="post">
        Enter Radius: 
        <input type="number" step="0.01" name="radius" value="<?php echo $radius; ?>" required>
        <input type="submit" value="Calculate">
    </form>

    <?php if ($radius !== ""): ?>
        <h3>Results:</h3>
        <p>Entered Radius: <?php echo $radius; ?></p>
        <p>Area of Circle: <?php echo $area; ?></p>
    <?php endif; ?>
</body>
</html>