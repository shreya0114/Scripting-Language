<?php
$message = "";
$fileLink = "";
$uploadedFile = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_FILES['cv']['name'])) {
        $fileName = $_FILES['cv']['name'];
        $fileTmp  = $_FILES['cv']['tmp_name'];
        $fileSize = $_FILES['cv']['size'];
        $fileExt  = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $allowed = ["pdf", "doc", "docx"];

        if ($fileSize > 1048576) {
            $message = "❌ File must be less than 1 MB.";
        } elseif (!in_array($fileExt, $allowed)) {
            $message = "❌ Only PDF, DOC, or DOCX allowed.";
        } else {
            if (!is_dir("uploads")) mkdir("uploads");
            $newName = time() . "_" . preg_replace("/[^a-zA-Z0-9\._-]/", "", $fileName);
            $target = "uploads/" . $newName;

            if (move_uploaded_file($fileTmp, $target)) {
                $message = "✅ Your CV was uploaded successfully!";
                $fileLink = $target;
                $uploadedFile = $newName; // keep file name
            } else {
                $message = "❌ Error uploading file.";
            }
        }
    } else {
        $message = "❌ Please choose a file.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload CV</title>
</head>
<body>
<h2>Upload Your CV</h2>

<?php if (empty($uploadedFile)): ?>
    <!-- Show form only if no file uploaded yet -->
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="cv" required>
        <input type="submit" value="Upload">
    </form>
<?php endif; ?>

<p><?php echo $message; ?></p>

<?php if (!empty($fileLink)): ?>
    <p><b>Uploaded File:</b> <a href="<?php echo $fileLink; ?>" target="_blank"><?php echo $uploadedFile; ?></a></p>
<?php endif; ?>

</body>
</html>