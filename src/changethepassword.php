<!DOCTYPE html>
<html>
<head>
    <title>Change account password</title>
    <link rel="icon" href="./upload/img/logochuongmobile.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="script/js/myJS.js"></script>
    <link rel="stylesheet" href="script/css/mystyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>

<?php
if(isset($_COOKIE['login'])){
    if(isset($_POST['oldpassword'])){
        require_once "./controller/Account_Control.php";
        $temp  =new  Account_Control();
        $temp -> ChangePasswordUser();
    }
}else{
    echo '
        <H2 style="margin-top: 15px; margin-left: 15px">You are not logged into your account!</H2>
            <script>setTimeout(function(){ window.location="./login.php" }, 3000);</script>';
    die();
}
?>
<?php include 'views/header.html' ?>
<div class="between">
    <div class="content">
        <div class="container">
            <div class="row" style="margin: 15px 0px">
                <div class="col-md-3" style="padding: 4px">
                    <div class="bg-white" style="padding: 5px 15px">
                        <?php include "./views/menuacount.html" ?>
                    </div>
                </div>
                <div class="col-md-9" style="padding: 4px">
                    <div class="bg-white" style="padding: 15px 15px">
                        <H4>CHANGE THE PASSWORD</H4>
                        <div style="width: 40%; height: 3px; background:  #ccc"></div>
                       <br>   <br>
                        <p style="width: 100%; text-align: center"><img src="upload/img/login1.png" style="height: 150px; width: auto"><br></p>
                        <form method="post">
                            <div class="form-group">
                                <label  for="exampleInputEmail1">Enter old password</label><br>
                                <input type="password" class="form-control-sm" style="width: 400px; max-width: 90%" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập mật khẩu cũ" required name="oldpassword">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Enter your new password</label><br>
                                <input type="password" class="form-control-sm" style="width: 400px; max-width: 90%" id="exampleInputPassword1" placeholder="Nhập mật khẩu mới" name="new1password" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm new password</label><br>
                                <input type="password" class="form-control-sm" style="width: 400px; max-width: 90%" id="exampleInputPassword1" placeholder="Xác nhận mật khẩu mới" name="new2password" required>
                            </div>
                            <button type="submit" class="btn btn-info">Act</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'views/footer.html'?>
<script>
    $(window).load(function(){
        responsive();
        $(window).resize(function(){
            responsive();
        });
    });
</script>
</body>
</html>
