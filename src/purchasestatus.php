<!DOCTYPE html>
<html>
<head>
    <title>My order</title>
    <link rel="icon" href="./upload/img/logochuongmobile.png">
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
    require_once './controller/Purchase_Control.php';
    $purchase = new Purchase_Control();
    if(isset($_POST['dele'])){
        $purchase->delePurchaseByI();
    }
?>
<?php
if(isset($_COOKIE['login'])){

    $dataPurchase =$purchase->getPurchaseByIdUser();
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
                        <H4>Đơn hàng của tôi</H4>
                        <div style="color: #999; font-size: 13px; line-height: 13px">*You can only do CANCEL for orders that have not been dispatched*</div>
                        <div style="color: #999;font-size: 13px; line-height: 13px;">*If you pay by MOMO or bank transfer, it takes time for us to process. There will still be a "Checkout" button pending, if you have already paid ignore it.*</div>
                        <style>
                            td{
                                font-size: 13px;
                                padding:5px 0px;
                            }
                        </style>
                        <table style="margin-top: 10px">
                            <thead style="height: 40px;background: #ccc;font-weight: 900; color: #000; font-size: 10px">
                            <th style="font-weight: 900; color: #222; font-size: 12px">STT</th>
                            <th style="font-weight: 900; color: #222; font-size: 12px">PRODUCT'S NAME</th>
                            <th style="font-weight: 900; color: #222; font-size: 12px">QUANTITY PURCHASED</th>
                            <th style="font-weight: 900; color: #222; font-size: 12px">TOTAL PAYMENT</th>
                            <th style="font-weight: 900; color: #222; font-size: 12px">PAYMENTS</th>
                            <th style="font-weight: 900; color: #222; font-size: 12px">PAID</th>
                            <th style="font-weight: 900; color: #222; font-size: 12px">SHIPPING STATUS</th>
                            <th style="font-weight: 900; color: #222; font-size: 12px">ORDER DATE</th>
                            <th style="font-weight: 900; color: #222; font-size: 12px">RECEIVING ADDRESS</th>
                            <th style="font-weight: 900; color: #222; font-size: 12px">ACT</th>
                            </thead>
                            <?php
                            $dem=0;
                            foreach($dataPurchase as $line){
                                ?>
                                <tr class="<?php if ($dem%2==0) echo 'tr2'; echo 'tr1'?>">
                                    <td style="font-weight: 600; text-align: center"><?php echo $dem+1?></td>
                                    <td><?php echo $line['sanphham'] ?></td>
                                    <td style="text-align: center; font-weight: 600"><?php echo $line['soluong'] ?></td>
                                    <td style="color: #fd7e14"><?php echo number_format($line['thanhtoan'],0,',','.')?>đ</td>
                                    <td><?php
                                        if($line['hinhthucthanhtoan']==0) echo "<span style='background: #444444; color: #fff; padding: 0px 5px'>Cash</span>";
                                        else if($line['hinhthucthanhtoan']==1) echo "<span style='background: #c69500; color: #fff; padding: 0px 5px'>Bank</span>";
                                        else if($line['hinhthucthanhtoan']==2) echo "<span style='background: #ad006c; color: #fff; padding: 0px 5px'>Momo</span>";
                                        ?></td>
                                    <td style="text-align: center">
                                        <?php
                                        if($line['tinhtrangthanhtoan']==0) echo "<span style='background: #c82333; color: #fff; padding: 0px 5px'>Not yet</span>";
                                        else if($line['tinhtrangthanhtoan']==1) echo "<span style='background: #28a745; color: #fff; padding: 0px 5px'>Already</span>";
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if($line['ttgiaohang']==0) echo "<span style='background: #6f42c1; color: #fff; padding: 0px 5px'>Not yet</span>";
                                        else if($line['ttgiaohang']==1) echo "<span style='background: #2e9ad0; color: #fff; padding: 0px 5px'>Sent</span>";
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $line['ngaymua'] ?>
                                    </td>
                                    <td>
                                        <textarea><?php echo $line['diachigiaohang'] ?></textarea>
                                    </td>
                                    <td style="text-align: center">
                                        <?php
                                        if($line['ttgiaohang']==0) {?>
                                            <button title="Hủy đơn hàng" id="<?php echo $line['id'] ?>" onclick="deleteitemn(<?php echo $line['id'] ?>)" class="btn btn-outline-danger" style="font-size: 13px; padding: 2px 3px" >
                                            Cancel
                                            </button>
                                            <?php if($line['tinhtrangthanhtoan'] == 0 && $line['hinhthucthanhtoan']!=0) { if($line['hinhthucthanhtoan']==1) {?>
                                                <button title="Pay" id="<?php echo $line['id'] ?>" onclick="payBank(<?php echo $line['id'] ?>)" class="btn btn-info" style="font-size: 13px; padding: 2px 3px; margin-top: 5px" >
                                                Pay
                                                </button>
                                                <?php } else {?>
                                                <button title="Pay" id="<?php echo $line['id'] ?>" onclick="payMomo(<?php echo $line['id'] ?>)" class="btn btn-info" style="font-size: 13px; padding: 2px 3px; margin-top: 5px" >
                                                Pay
                                                </button>
                                        <?php } }}
                                        else if($line['ttgiaohang']==1) echo "<span style='background: #444444; color: #fff; padding: 0px 5px; margin: 0px 2px'>Không có hành động</span>";
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                $dem++;
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<dialog id="xacnhanxoa" style="padding: 10px 15px;border: none; width: 100%; max-width: 600px;  box-shadow: 0px 0px 15px 0px #aaa; border-radius: 5px; display: none; ">
    <p style="font-size: 16px;">You can cancel this order, because it has not been shipped yet!. In case if you have paid via momo or bank transfer, we will refund if any fees incurred will be borne by you.</p>
    <p style="font-weight: 600">Are you sure you want to cancel?</p>
    <hr style="margin-top: -7px; margin-bottom: 7px">
    <button class="btn btn-danger" style="float: right; margin-left: 10px; padding: 2px; font-size: 14px" id="huydelete">Cancel</button>
    <form style="float: right" method="post">
        <input name="select" value="account-management" style="display: none">
        <input id = "dele" name="dele" value="" style="display: none">
        <button style="padding: 2px; font-size: 14px" class="btn btn-info" name="act" value="dele">Confirm</button>
    </form>
</dialog>
<script>function deleteitemn(clicked_id)
    {
        var xacnhan = document.getElementById('xacnhanxoa');
        var huydelete = document.getElementById('huydelete');
        var dele = document.getElementById('dele');
        dele.value = clicked_id;
        huydelete.addEventListener('click', function() {
            xacnhan.style.display='none';
            xacnhan.close();
        });
        xacnhan.style.display='block';
        xacnhan.showModal();
    }</script>
<dialog id="paybank" style="padding: 15px 10px;border: none;width: 100%; max-width: 600px;  box-shadow: 0px 0px 15px 0px #aaa; border-radius: 5px; display: none;position: fixed; top:50%;left: 50%;  transform: translate(-50%,-50%);">
    <p style="font-size: 17px; font-weight: 400">We need time to process your payment, if you have already paid before please skip this action. We will process your payment as soon as possible.</p>
    <p style="font-size: 17px; font-weight: 600">Make payment or click cancel</p>
    <hr style="margin-top: -5px; margin-bottom: 5px">
    <button class="btn btn-danger" style="float: right; margin-left: 10px; padding: 2px; font-size: 14px" id="huypay">Cancel</button>
    <form method="post" action="./bankpayment.php" style="text-align: left">
        <input type="hidden" id = "idpay" name="idpay" value="" style="display: none" >
        <button   class="btn btn-info" id="xacnhanedit" style="float: right; padding: 2px 5px">Pay</button>
    </form>
</dialog>
<script>function payBank(clicked_id)
    {
        var xacnhan = document.getElementById('paybank');
        var huyedit = document.getElementById('huypay');
        document.getElementById('idpay').value = clicked_id;
        huyedit.addEventListener('click', function() {
            xacnhan.close();
            xacnhan.style.display='none';
        });
        xacnhan.showModal();
        xacnhan.style.display='block';
    }</script>

<dialog id="paymomo" style="padding: 15px 10px;border: none;width: 100%; max-width: 600px;  box-shadow: 0px 0px 15px 0px #aaa; border-radius: 5px; display: none;position: fixed; top:50%;left: 50%;  transform: translate(-50%,-50%);">
    <p style="font-size: 17px; font-weight: 400">We need time to process your payment, if you have already paid before please skip this action. We will process your payment as soon as possible.</p>
    <p style="font-size: 17px; font-weight: 600">Make payment or click cancel</p>
    <hr style="margin-top: -5px; margin-bottom: 5px">
    <button class="btn btn-danger" style="float: right; margin-left: 10px; padding: 2px; font-size: 14px" id="huypaymomo">Cancel</button>
    <form method="post" action="./momopayment.php" style="text-align: left">
        <input type="hidden" id = "idpaymomo" name="idpay" value="" style="display: none" >
        <button   class="btn btn-info" id="xacnhanedit" style="float: right; padding: 2px 5px">Pay</button>
    </form>
</dialog>
<script>function payMomo(clicked_id)
    {
        var xacnhan = document.getElementById('paymomo');
        var huyedit = document.getElementById('huypaymomo');
        document.getElementById('idpaymomo').value = clicked_id;
        huyedit.addEventListener('click', function() {
            xacnhan.close();
            xacnhan.style.display='none';
        });
        xacnhan.showModal();
        xacnhan.style.display='block';
    }</script>


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
