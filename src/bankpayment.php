<!DOCTYPE html>
<html>
<head>
    <title>Payment of orders via bank</title>
    <link rel="icon" href="./upload/img/logochuongmobile.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="script/js/myJS.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="script/css/mystyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>
<?php
if(isset( $_POST['idpay'])){
    $id = $_POST['idpay'];
    require_once './controller/Purchase_Control.php';
    $purchase = new Purchase_Control();
    $data = $purchase->getPurchaseById($id);
    $iduser = $data['id_user'];
    $sumTT = $data['thanhtoan'];
    $MHD = $data['noidungTT'];
}else{
    $iduser = $_COOKIE['login'];
    $sumTT = 0;
    if(isset($_GET['pay'])) $sumTT = $_GET['pay'];
    $MHD = "THANHTOAN MHD".$iduser.$sumTT;
}
require_once "./controller/Option_Control.php";
$temp  = new  Option_Control();
$dataTT= $temp->GetBillingInformation1();
?>
<?php include 'views/header.html' ?>
<div class="between">
    <div class="content">
        <div class="container">
            <div class="bg-white" style="margin-top: 20px;padding-bottom: 25px ; padding: 15px; text-align: center;">
                <H2 style="margin-top: 15px; color: #fd7e14">PROCESSING BANK TRANSFER PAYMENT</H2>
                <br>
                <div style="width: 100%; max-width: 600px; margin: auto">
                <p style="background: #027dc1; color: #fff; font-weight: 400; font-size: 20px; border-left: solid 5px #fd7e14;">Please transfer money to our account using the information below so that we can confirm your payment</p>
                </div>
                <div style="width: 100%; max-width: 600px; margin: auto">
                    <br>
                <div style="background: #f0f5f5; border: solid 2px #a2c5c5; border-radius: 5px; text-align: left; padding: 10px; ">
                   <p>
                       <span style="font-size: 18px">Bank name:</span><br>
                       <span style="font-size: 25px; font-weight: 700"><?php echo $dataTT->bankname ?></span>
                   </p>
                    <p>
                        <span style="font-size: 18px">Account number:</span><br>
                        <span style="font-size: 25px; font-weight: 700"><?php echo $dataTT->stk ?></span>
                    </p>
                    <p>
                        <span style="font-size: 18px">Account name:</span><br>
                        <span style="font-size: 25px; font-weight: 700"><?php echo $dataTT->ctkbank ?></span>
                    </p>
                    <p>
                            <span style="font-size: 18px">Amount to transfer:</span><br>
                        <span style="font-size: 25px; font-weight: 700"><?php echo number_format($sumTT,0,',','.')?> VND</span>
                    </p>
                    <p>
                        <span style="font-size: 18px">Transfer content:</span><br>
                        <span style="font-size: 25px; font-weight: 700"><?php echo $MHD?></span>
                    </p>
                    <p style="color: #ff2222">Warning: You MUST use <span style="font-weight: 600"><?php echo $MHD?></span> in the transfer content and transfer the correct amount as above, otherwise we will not be able to process your payment...</p>
                </div>
                    <br><br>
                    <a href="./finishedorder.php"><button class="btn btn-info" style="width: 100%; font-weight: 600">CONFIRMED PAYMENT</button></a>
                    <br>  <br>
                    <button onclick="huyThanhToan()" class="btn btn-outline-info" style="width: 100%; font-weight: 600">CANCEL PAYMENT</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'views/footer.html'?>
<script>
    function huyThanhToan(){
        alert("You canceled the payment, to pay it back to Order Status...");
        window.location='./'
    }
    $(window).load(function(){
        responsive();
        $(window).resize(function(){
            responsive();
        });
    });
</script>
</body>
</html>