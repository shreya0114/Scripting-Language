<?php
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST['number'];

    if (empty($input)) {
        $result = "<span style='color:red;'>Please enter a number.</span>";
    } elseif (!is_numeric($input) || intval($input) != $input) {
        $result = "<span style='color:red;'>Please enter a valid integer.</span>";
    } else {
        $number = intval($input);

        function isDivisibleByFive($num) {
            return $num % 5 === 0;
        }

        if (isDivisibleByFive($number)) {
            $result = "<span style='color:green;'>$number is divisible by 5.</span>";
        } else {
            $result = "<span style='color:red;'>$number is NOT divisible by 5.</span>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Divisibility by 5 Checker</title>
</head>
<body>
    <h2>Check if a Number is Divisible by 5</h2>

    <form method="post">
        <label>Enter an integer:</label>
        <input type="text" name="number" value="<?php echo isset($_POST['number']) ? htmlspecialchars($_POST['number']) : ''; ?>" required>
        <input type="submit" value="Check">
    </form>

    <p><?php echo $result; ?></p>
</body>
</html>
