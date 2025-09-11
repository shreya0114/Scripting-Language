<?php
if (isset($_COOKIE['username'])) {
    session_start();
    $_SESSION['username'] = $_COOKIE['username'];
    header('location:dashboard.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $err = [];
   if (isset($_POST['username']) && !empty($_POST['username'])
    && trim($_POST['username'])) {
    $username = $_POST['username'];
   } else {
    $err['username'] = 'Enter username';
   }

   if (isset($_POST['password']) && !empty($_POST['password'])) {
    $password = $_POST['password'];
   } else {
    $err['password'] = 'Enter password';
   }
   if (count($err) == 0) {
    if ($username == 'admin' && $password == 'ram123') {
        session_start();
        $_SESSION['username'] = $username;

        if (isset($_POST['remember'])) {
            setcookie('username',$username,time()+7*24*3600);
        }

        header('location:dashboard.php');
    } else {
        echo 'Login failed';
    }
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h1>Form Example</h1>
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Enter username"
        value="<?php echo isset($username)?$username:''; ?>" />
        <?php echo isset($err['username'])?$err['username']:'' ?>
        <br />
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter password" />
        <?php echo isset($err['password'])?$err['password']:'' ?>
        <br />
        <input type="checkbox" name="remember" value="remember" />Remember Me for 7 days
<br />
        <input type="submit" name="btnSubmit" value="Login" />
    </form>
</body>
</html>