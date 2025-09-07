<?php
function calculatePoints($wins, $draws, $losses) {
    return ($wins * 3) + ($draws * 1) + ($losses * 0);
}

$totalPoints = 0;

if (isset($_POST['submit'])) {
    $wins = $_POST['wins'];
    $draws = $_POST['draws'];
    $losses = $_POST['losses'];

    $totalPoints = calculatePoints($wins, $draws, $losses);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Football Team Points Calculator</title>
</head>
<body>
    <h2>Calculate Total Points of a Football Team</h2>
    <form method="post">
        Number of Wins: <input type="number" name="wins" value="<?php echo isset($wins) ? $wins : 0; ?>" required><br><br>
        Number of Draws: <input type="number" name="draws" value="<?php echo isset($draws) ? $draws : 0; ?>" required><br><br>
        Number of Losses: <input type="number" name="losses" value="<?php echo isset($losses) ? $losses : 0; ?>" required><br><br>
        <input type="submit" name="submit" value="Calculate">
    </form>

    <?php if (isset($_POST['submit'])): ?>
        <h3>Results:</h3>
        <p>Wins: <?php echo $wins; ?> → Points: <?php echo $wins * 3; ?></p>
        <p>Draws: <?php echo $draws; ?> → Points: <?php echo $draws * 1; ?></p>
        <p>Losses: <?php echo $losses; ?> → Points: <?php echo $losses * 0; ?></p>
        <p><strong>Total Points: <?php echo $totalPoints; ?></strong></p>
    <?php endif; ?>
</body>
</html>