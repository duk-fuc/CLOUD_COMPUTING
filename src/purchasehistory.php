


<!DOCTYPE html>
<html>
<head>
    <title>Purchase history</title>
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
                        <div style="padding-left: 15px; padding-top: 10px; padding-right: 15px">
                            <h4>Purchase history</h4>

                            <table style="width: 100%; margin: 5px;">

                                <thead style="height: 40px;background: #ccc;font-weight: 900; color: #000; font-size: 10px">
                                <th style="font-weight: 900; color: #222; font-size: 12px">STT</th>
                                <th style="font-weight: 900; color: #222; font-size: 12px">PRODUCT'S NAME</th>
                                <th style="font-weight: 900; color: #222; font-size: 12px">QUANTITY PURCHASED</th>
                                <th style="font-weight: 900; color: #222; font-size: 12px">TOTAL PAYMENT</th>
                                <th style="font-weight: 900; color: #222; font-size: 12px">PAYMENTS</th>
                                <th style="font-weight: 900; color: #222; font-size: 12px">ORDER DATE</th>
                                <th style="font-weight: 900; color: #222; font-size: 12px">DELIVERY DATE</th>
                                <th style="font-weight: 900; color: #222; font-size: 12px">RECEIVING ADDRESS</th>
                                </thead>
                                <?php
                                require_once './controller/PurchaseHistory_Control.php';
                                $purchaseHistory = new PurchaseHistory_Control();
                                $dataPurchase =  $purchaseHistory->getListPurchaseHistorybyIdUser();
                                ?>

                                <?php
                                $dem=0;
                                foreach($dataPurchase as $line){
                                    ?>
                                    <style>
                                        td{
                                            font-size: 14px;
                                        }
                                    </style>
                                    <tr style="background:<?php if($dem%2 == 1) echo '#efefef'; else echo 'fcfcfc';?>">
                                        <td style="font-weight: 600; text-align: center"><?php echo $dem+1?></td>
                                        <td><?php echo $line['sanpham'] ?></td>
                                        <td style="text-align: center; font-weight: 600"><?php echo $line['soluong'] ?></td>
                                        <td style="color: #fd7e14"><?php echo number_format($line['thanhtoan'],0,',','.')?>đ</td>
                                        <td><?php
                                            if($line['hinhthucthanhtoan']==0) echo "<span style='background: #444444; color: #fff; padding: 0px 5px'>Cash</span>";
                                            else if($line['hinhthucthanhtoan']==1) echo "<span style='background: #c69500; color: #fff; padding: 0px 5px'>Bank</span>";
                                            else if($line['hinhthucthanhtoan']==2) echo "<span style='background: #ad006c; color: #fff; padding: 0px 5px'>Momo</span>";
                                            ?></td>
                                        <td>
                                            <?php echo $line['ngaydat'] ?>
                                        </td>
                                        <td>
                                            <?php echo $line['ngaygui'] ?>
                                        </td>
                                        <td>
                                            <textarea><?php echo $line['diachigiaohang'] ?></textarea>
                                        </td>
                                    </tr>
                                    <?php
                                    $dem++;
                                }
                                ?>

                                <script>
                                    var n=(parseInt(document.getElementById('num-rows').textContent));

                                </script>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
