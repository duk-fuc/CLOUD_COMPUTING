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
        <H2 style="margin-top: 15px; margin-left: 15px">You have logged into your account!</H2>
        <script>setTimeout(function(){ window.location="./" }, 3000);</script>';
    die();
}
?>
<div class="box">
    <form method="post" action="#" >
        <img src="upload/img/register1.png" style="height: 150px; width: auto"><br>
        <input type="text" placeholder="Tên: 'Nguyen Van A'" required name="name">
        <input type="email" placeholder="Email" required name="email">
        <div id="emaill" style="color: #f00; line-height: 14px; margin-bottom: 10px; margin-top: -5px; font-size: 14px; display: none">Invalid email</div>
        <input type="password" placeholder="Password" required  name="password">
        <input type="password" placeholder="Confirm password" required name="password2">
        <div id="passerror" style=" display: none;color: #f00; line-height: 14px; margin-bottom: 10px; margin-top: -5px; font-size: 14px">password incorrect</div>
        <input type="text" placeholder="Phone number" required name="phonenumber">
            <div id="sdt" style=" display: none;color: #f00; line-height: 14px; margin-bottom: 10px; margin-top: -5px; font-size: 14px">invalid phone number</div>
        <input type="text" placeholder="Địa chỉ" name="address">
        <input type="submit" value="ĐĂNG Ký" >
    </form>
    <hr>
    <span>If you already have an account <a href="login.php" >Login</a></span>
    <?php    require_once "./controller/Account_Control.php";
    $temp  =new  Account_Control();
    $temp -> userRegistration();
    ?>

</div>
</body>
</html>