<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Toy Store</title>
    <link rel="icon" href="./upload/img/logochuongmobile.png">
    <link rel="stylesheet" href="script/css/loginuser.css">
</head>
<body>
<?php
if(isset($_COOKIE['login'])){
    echo '
        <H2 style="margin-top: 15px; margin-left: 15px">You are logged into your account!</H2>
        <script>setTimeout(function(){ window.location="./" }, 3000);</script>';
    die();
}
?>
<div class="box">
    <form method="post" action="#" >
        <img src="upload/img/login1.png" style="height: 150px; width: auto"><br>
        <input type="email" placeholder="Email" required  name="email">
        <input type="password" placeholder="Password" required name="password">
        <input type="submit" value="LOGIN">
    </form>
    <hr>
    <span>If you don't have an account yet<a href="register.php">Register</a></span><br>
</div>
<?php
if(isset( $_POST['email'])){
    $email = trim($_POST['email']);
    $pass =  md5($_POST['password']);
    require_once "./module/Account.php";
    $acccout = new Account();
    $access = $acccout->login($email,$pass);
    if($access === 0)  echo '<script>alert("Login failed, wrong account or password.....")</script>';
    else{
        setcookie('login', $access, time() + 360000);
        echo '<script> alert("Logged in successfully")</script>';
        echo '<script>window.location="./";</script>';
    }
}
?>
</body>
</html>