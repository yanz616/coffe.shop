<?php
include "../../../data/index.php";
$message = "";
$err_user = "";
$err_pass = "";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
    $result = $db -> query($sql);
    
    if($result->num_rows > 0){
        $data = $result->fetch_assoc();
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];
        $_SESSION['islogin'] = true;

        if($_SESSION['role'] == 'USER'){
            header("location: ../../homepage/index.php");
        }else{
            header("location: ../../dashboard/index.php");
        }
    }else{
        $message = "username tidak ditemukan";
    }
    $db->close();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../style/login.css">
    <title>Login</title>
</head>

<body>
    <div class="auth-container">
        <a href="../../homepage/index.php">
            <img src="../../../assets/images/Logo.png" alt="err" width=76 height=94>
        </a>
        <form action="" method="post" class="form-container">
            <span class="btn-switch">
                <a href="#" class="btn-swc-login">Login</a>
                <a href="../register/index.php" class="btn-swc-register">Register</a>
            </span>
            <i class="text-danger"><?= $message ?></i>
            <label>Username</label>
            <input type="text" name="username" placeholder="Enter your username">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password">
            <span class="remember">
                <input type="checkbox">
                <label>Remember me</label>
            </span>
            <button type="submit" name="login" class="btn-login">Login</button>
        </form>
    </div>
</body>

</html>