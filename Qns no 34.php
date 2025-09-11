<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name   = htmlspecialchars($_POST['name']);
    $roll   = htmlspecialchars($_POST['roll']);
    $class  = htmlspecialchars($_POST['class']);

    $subjects = ['english', 'math', 'science', 'computer', 'nepali'];
    $marks = [];
    $error = "";

    foreach ($subjects as $sub) {
        if (isset($_POST[$sub]) && is_numeric($_POST[$sub]) && $_POST[$sub] >= 0 && $_POST[$sub] <= 100) {
            $marks[$sub] = (float)$_POST[$sub];
        } else {
            $error = "Invalid marks for " . ucfirst($sub) . ". Enter 0-100.";
            break;
        }
    }

    if ($error) {
        echo "<p style='color:red;'>$error</p>";
        echo "<p><a href='javascript:history.back()'>Go Back</a></p>";
        exit;
    }

    $total = array_sum($marks);
    $percentage = $total / count($subjects);
    
    if ($percentage >= 80) {
        $division = "Distinction";
    } elseif ($percentage >= 60) {
        $division = "First Division";
    } elseif ($percentage >= 45) {
        $division = "Second Division";
    } elseif ($percentage >= 35) {
        $division = "Third Division";
    } else {
        $division = "Fail";
    }

    echo "<h2>Mark Sheet</h2>";
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr><td><b>Name</b></td><td>$name</td></tr>";
    echo "<tr><td><b>Roll No</b></td><td>$roll</td></tr>";
    echo "<tr><td><b>Class</b></td><td>$class</td></tr>";

    foreach ($marks as $sub => $mark) {
        echo "<tr><td><b>" . ucfirst($sub) . "</b></td><td>$mark</td></tr>";
    }

    echo "<tr><td><b>Total Marks</b></td><td>$total</td></tr>";
    echo "<tr><td><b>Percentage</b></td><td>" . number_format($percentage, 2) . "%</td></tr>";
    echo "<tr><td><b>Division</b></td><td>$division</td></tr>";
    echo "</table>";

} else {
    ?>
    <h2>Student Marksheet Entry</h2>
    <form method="post" action="" style="width:300px;">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>
        <label>Roll No:</label><br>
        <input type="text" name="roll" required><br><br>
        <label>Class:</label><br>
        <input type="text" name="class" required><br><br>
        <label>English:</label><br>
        <input type="number" name="english" min="0" max="100" required><br><br>
        <label>Math:</label><br>
        <input type="number" name="math" min="0" max="100" required><br><br>
        <label>Science:</label><br>
        <input type="number" name="science" min="0" max="100" required><br><br>
        <label>Computer:</label><br>
        <input type="number" name="computer" min="0" max="100" required><br><br>
        <label>Nepali:</label><br>
        <input type="number" name="nepali" min="0" max="100" required><br><br>
        <input type="submit" value="Generate Marksheet">
    </form>
    <?php
}

?>
