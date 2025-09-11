<?php
$result = "";
$uploadedFile = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_FILES['profile']['name'])) {
        $fileTmp  = $_FILES['profile']['tmp_name'];
        $fileName = $_FILES['profile']['name'];
        $fileSize = $_FILES['profile']['size'];
        $fileExt  = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $allowedExt = ["png", "jpg", "jpeg"];
        $maxSize = 500 * 1024; // 500 KB

        if (!in_array($fileExt, $allowedExt)) {
            $error = "Only PNG and JPEG files are allowed.";
        } elseif ($fileSize > $maxSize) {
            $error = "File size must be less than 500 KB.";
        } else {
            $fileName = time() . "_" . preg_replace("/[^a-zA-Z0-9\._-]/", "", $fileName);
            $targetDir = "uploads/";
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
            $targetFile = $targetDir . $fileName;

            if (move_uploaded_file($fileTmp, $targetFile)) {
                $uploadedFile = $targetFile;
                $result = "Profile image uploaded successfully!";
            } else {
                $error = "There was a problem uploading your file.";
            }
        }
    } else {
        $error = "Please select an image to upload.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Profile Image</title>
</head>
<body>

<h2>Upload Profile Image</h2>

<?php if (empty($uploadedFile)): ?>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="profile" /><br><br>
    <input type="submit" value="Upload">
</form>
<?php endif; ?>

<?php
if ($error) echo "<p style='color:red;'>$error</p>";
if ($result) {
    echo "<p style='color:green;'>$result</p>";
    echo "<p>Uploaded File: " . htmlspecialchars(basename($uploadedFile)) . "</p>";
    echo "<img src='$uploadedFile' style='max-width:200px;'/>";
}
?>

</body>
</html>