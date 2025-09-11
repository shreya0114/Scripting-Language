<?php
$host = "localhost";
$db   = "user_registration"; 
$user = "root";             
$pass = "";                  

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errors = [];
$username = $email = $dob = $phone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $dob      = trim($_POST['dob']);
    $phone    = trim($_POST['phone']);

    if (strlen($username) < 8) {
        $errors[] = "Username must be at least 8 characters long.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $dob) || !strtotime($dob)) {
        $errors[] = "Invalid date of birth. Format: YYYY-MM-DD";
    }

    if (!preg_match("/^\d{10,15}$/", $phone)) {
        $errors[] = "Phone number must be 10 to 15 digits long.";
    }

    $stmt = $conn->prepare("SELECT id FROM users WHERE username=? OR email=?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $errors[] = "Username or email already exists.";
    }
    $stmt->close();

    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO users (username, email, dob, phone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $dob, $phone);

        if ($stmt->execute()) {
            echo "<p style='color:green;'>User registered successfully!</p>";
            $username = $email = $dob = $phone = "";
        } else {
            echo "<p style='color:red;'>Database error: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<form method="post" action="">
    <label>Username:</label><br>
    <input type="text" name="username" value="<?= htmlspecialchars($username) ?>"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($email) ?>"><br><br>

    <label>Date of Birth (YYYY-MM-DD):</label><br>
    <input type="date" name="dob" value="<?= htmlspecialchars($dob) ?>"><br><br>

    <label>Phone:</label><br>
    <input type="text" name="phone" value="<?= htmlspecialchars($phone) ?>"><br><br>

    <input type="submit" value="Register">
</form>

<?php

if (!empty($errors)) {
    echo "<ul style='color:red;'>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
}
?>