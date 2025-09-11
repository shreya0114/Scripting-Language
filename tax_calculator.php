<?php
// Initialize variables
$tax = 0;
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $income = (float) $_POST["income"];
    $marital = $_POST["marital"];
    $gender = $_POST["gender"];

    if ($income <= 0) {
        $result = "<span style='color:red;'>Please enter a valid annual income.</span>";
    } else {
        // Married slabs
        if ($marital == "married") {
            if ($income <= 450000) {
                $tax = $income * 0.01;
            } elseif ($income <= 550000) {
                $tax = (450000 * 0.01) + (($income - 450000) * 0.10);
            } elseif ($income <= 750000) {
                $tax = (450000 * 0.01) + (100000 * 0.10) + (($income - 550000) * 0.20);
            } elseif ($income <= 1300000) {
                $tax = (450000 * 0.01) + (100000 * 0.10) + (200000 * 0.20) + (($income - 750000) * 0.30);
            } else {
                $tax = (450000 * 0.01) + (100000 * 0.10) + (200000 * 0.20) + (550000 * 0.30) + (($income - 1300000) * 0.35);
            }
        }
        // Unmarried slabs
        else {
            if ($income <= 400000) {
                $tax = $income * 0.01;
            } elseif ($income <= 500000) {
                $tax = (400000 * 0.01) + (($income - 400000) * 0.10);
            } elseif ($income <= 750000) {
                $tax = (400000 * 0.01) + (100000 * 0.10) + (($income - 500000) * 0.20);
            } elseif ($income <= 1300000) {
                $tax = (400000 * 0.01) + (100000 * 0.10) + (250000 * 0.20) + (($income - 750000) * 0.30);
            } else {
                $tax = (400000 * 0.01) + (100000 * 0.10) + (250000 * 0.20) + (550000 * 0.30) + (($income - 1300000) * 0.35);
            }
        }

        // Female discount
        if ($gender == "female") {
            $tax -= $tax * 0.10;
        }

        // Final result message
        $result = "Annual Income: Rs. " . number_format($income) . "<br>";
        $result .= "Calculated Tax: Rs. " . number_format($tax, 2);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Tax Calculator</title>
</head>
<body>
    <h2>Tax Calculator Form</h2>
    <form method="post">
        <label>Annual Income (Rs.):</label>
        <input type="number" name="income" required 
               value="<?php echo isset($_POST['income']) ? $_POST['income'] : ''; ?>"><br><br>

        <label>Marital Status:</label>
        <select name="marital" required>
            <option value="married" <?php if(isset($_POST['marital']) && $_POST['marital']=="married") echo "selected"; ?>>Married</option>
            <option value="unmarried" <?php if(isset($_POST['marital']) && $_POST['marital']=="unmarried") echo "selected"; ?>>Unmarried</option>
        </select><br><br>

        <label>Gender:</label>
        <select name="gender" required>
            <option value="male" <?php if(isset($_POST['gender']) && $_POST['gender']=="male") echo "selected"; ?>>Male</option>
            <option value="female" <?php if(isset($_POST['gender']) && $_POST['gender']=="female") echo "selected"; ?>>Female</option>
        </select><br><br>

        <input type="submit" value="Calculate Tax">
    </form>

    <h3><?php if(!empty($result)) echo $result; ?></h3>
</body>
</html>