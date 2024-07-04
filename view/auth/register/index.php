<?php
include "../../../data/index.php";

$message = "";
$err_user = "";
$err_email = "";
$err_pass = "";


if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($username)) {
        $err_user = "username masih kosong";
    }
    if (empty($email)) {
        $err_email = "email masih kosong";
    }
    if (empty($password)) {
        $err_pass = "password masih kosong";
    } else {
        try {
            $sql = "INSERT INTO user(username, email, password) VALUES ('$username', '$email', '$password')";
            $q = mysqli_query($db, $sql);
            if ($q) {
                $message = "daftar berhasil";
            } else {
                $message = "daftar gagal";
            }
        } catch (mysqli_sql_exception $e) {
            $message = "email sudah digunakan";
        }
    }
    $db->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../style/register.css">
    <title>Register</title>
</head>

<body>
    <div class="auth-container">
        <a href="../../homepage/index.php">
            <img src="../../../assets/images/Logo.png" alt="err" width=76 height=94>
        </a>
        
        <form action="../../../view/auth/register/index.php" method="post" class="form-container">
            <span class="btn-switch">
                <a href="../login/index.php" class="btn-swc-login">Login</a>
                <a href="#" class="btn-swc-register">Register</a>
            </span>
            <i class="text-danger"><?= $message ?></i>
            <label>Username</label>
            <input type="text" name="username" placeholder="Enter your username">
            <i class="text-danger"><?= $err_user ?></i>
            <label>Email</label>
            <input type="Email" name="email" placeholder="Enter your email">
            <i class="text-danger"><?= $err_email ?></i>
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password">
            <i class="text-danger"><?= $err_pass ?></i>
            <button type="submit" name="register" class="btn-register">Register</button>
        </form>
    </div>
</body>

</html>