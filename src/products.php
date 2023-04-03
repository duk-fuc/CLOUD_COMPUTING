
<?php
if(isset($_GET['receive'])){
    require_once "./module/Product.php";
    $Product = new Product();
    $id_product = $_GET['receive'];
    $getProduct = $Product->getProductById($id_product);
    if(sizeof($getProduct)==0) {
        echo "<h1 class='container'>Product does not exist</h1>"; die();
    }
}else{
    echo "<h1 class='container'>Product does not exist</h1>";
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="./upload/img/logochuongmobile.png">
    <title> <?php echo $getProduct['ten'] ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
    <script src="./include/script/ckeditorbasic/ckeditor.js"></script>
    <script src="script/js/myJS.js"></script>
    <link rel="stylesheet" href="script/css/mystyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

</head>
<body>
<?php include 'views/header.html' ?>
    <div class="between">
        <div class="content">
            <div class="container">
                <h2 style="margin-top: 15px"><?php echo $getProduct['ten']?></h2> <hr>
                <div class="box-gtpr ">
                    <div class="row">
                        <div class="col-md-7" style="padding-left: 0px">
                            <img class="img-avatarpr1" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGKjRIQELIfghpoMZXyKtl0ouWt0nJyMlHgz0oWZ552JYNj3nUEtH4ScpJ6v_RmNwez2g&usqp=CAU">
                        </div>
                        <div class="col-md-5 bg-white">
                            <h4 style="margin-top: 5px">TORDER INFORMATION</h4>
                            <br>
                            <p class="parameter-pr">Product's name: <span style="font-weight: 900;"><?php echo $getProduct['ten']?></span></p>
                            <p class="parameter-pr" id="giaban">Price: <span style="font-weight: 900; color:#fd7e14"><?php echo number_format($getProduct['giaban'],0,'1','.')?>đ</span></p>
                            <p class="parameter-pr">Status: <span style="font-weight: 900;"><?php echo $getProduct['tinhtrang']?></span></p>
                            <p class="parameter-pr">Quantity remaining: <span style="font-weight: 900;"><?php echo $getProduct['soluong']?></span></p>
                            <p class="parameter-pr">Purchase Quantity: <span style="font-weight: 900;">
                            <input name="soluong" id="soluong" type="number" style="width: 40px;font-weight: 700; border: solid 1px #000; color: #000; border-radius: 5px;" value="1">
                            <p class="parameter-pr">Total payment: <span style="font-weight: 900; color:#c82333" id="tongthanhtoan">18.550.000đ</span></p>
                            <div class="row" style="margin-top: 30px; margin-bottom: 15px">
                               <?php
                                if(isset($_COOKIE['login'])){ echo'
                                    <div class="col-6">
                                        <input name="id_user" value="'.$_COOKIE['login'].'" type="hidden">
                                        <input name="id_product" value="'.$_GET['receive'].'" type="hidden">
                                        <button onclick="addCart()" class="btn btn-outline-info" style="width: 100%;font-weight: 600">ADD CART</button>
                                    </div>
                                    <div class="col-6">
                                        <form action="purchase.php" method="get">
                                            <button class="btn btn-info" style="width: 100%; font-weight: 600" onclick="addCart1()">BUY NOW</button>
                                        </form>
                                    </div>
                                ';} else echo '
                                    <div class="col-12" style="text-align: center">
                                       <a href="./login.php" >
                                         <button class="btn btn-danger" style="font-weight: 600; max-width: 100%"> You need to be logged in to purchase</button>
                                        </a>
                                    </div>'
                                ?>
                            </div>
                            </div>
                        </div>
                        <script>
                            function addCart1() {
                                $hehe = document.getElementById('cart-number');
                                $setVl =  $hehe.textContent.slice(1,-1);
                                $hehe.textContent = "("+(Number($setVl) + 1) +")";
                                var sol = $('#soluong').val();
                                $.ajax({
                                    url : "./views/viewajax/add_product_cart.php",
                                    type : "post",
                                    dataType:"text",
                                    data : {
                                        id_user:'<?php echo $_COOKIE['login']?>',
                                        id_product:'<?php echo $_GET['receive']?>',
                                        soluong: sol,
                                    },
                                    success : function (result){
                                    }
                                });

                            }
                            function addCart() {
                                $hehe = document.getElementById('cart-number');
                                $setVl =  $hehe.textContent.slice(1,-1);
                                $hehe.textContent = "("+(Number($setVl) + 1) +")";
                                var sol = $('#soluong').val();
                                $.ajax({
                                    url : "./views/viewajax/add_product_cart.php",
                                    type : "post",
                                    dataType:"text",
                                    data : {
                                        id_user:'<?php echo $_COOKIE['login']?>',
                                        id_product:'<?php echo $_GET['receive']?>',
                                        soluong: sol,
                                    },
                                    success : function (result){
                                    }
                                });

                                alert("The product has been added to cart");
                            }</script>
                        <div class="col-12 bg-white" style="margin-top: 25px; padding-top: 8px; padding-bottom: 18px">
                                <H5>DETAILED SPECIFICATIONS</H5>
                            
                        </div>
                        <div class="col-12 bg-white" style="margin-top: 25px; padding-top: 8px">
                            <H5></H5>
                            <?php echo $getProduct['posts'];
                            ?>
                        </div>
                        <div class="col-12 bg-white" style="margin-top: 25px; padding-top: 8px">
                            <H5>US PRODUCT COMMENTS</H5>
                                <div style="width: 100%; border-radius: 3px; padding: 10px">
                                    <?php if(isset($_COOKIE['login'])) echo '
                       
                            <input id="cmt" name="cmt" style="width: 100%; height: 60px;border-radius: 5px">
                            <div style="text-align: right; margin-top: 15px">
                            <button onclick="addCommet()" class="btn btn-secondary">Comment</button> </div>
                        
                       ';

                                    else {
                                        echo '<span>Hãy <a href="./login.php">Login</a>to comment!</span>
<input type="hidden" id="cmt" name="cmt">';
                                    }
                                    ?>

                                    <hr>
                                    <div class="view_ajax" id="view_ajax">HAHA
                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
    </div>
<script>
    ajaxcmt();
    function addCommet() {
        ajaxcmt();
    }
function ajaxcmt(){
    var cmt = document.getElementById('cmt').value;
    document.getElementById('cmt').value = "";
    $.ajax({
        url : "./views/viewajax/ajax_comment.php",
        type : "post",
        dataType:"text",
        data : {
            cmt:cmt,
            id_product: '<?php echo $_GET['receive']?>',
        },
        success : function (result){
          document.getElementById('view_ajax').innerHTML = result;
        }
    });
}
</script>
    <?php include 'views/footer.html'?>
    <script>
        function formatCash(str) {
            return str.split('').reverse().reduce((prev, next, index) => {
                return ((index % 3) ? next : (next + '.')) + prev
            })
        }
        function tongtien(a){
            return formatCash((a * <?php echo $getProduct['giaban'] ?>).toString());
        }

        $(document).ready(function(){
            $('#tongthanhtoan').html(tongtien($('#soluong').val()) +"đ");
            $('#soluong').change(function (){
                $('#tongthanhtoan').html(tongtien($('#soluong').val()) +"đ");
                if($('#soluong').val() < 1) {
                    $('#tongthanhtoan').html(tongtien(1) +" ");
                    $('#soluong').val(1);
                    alert("You need to buy at least 1 product");
                }
                else if($('#soluong').val()  > <?php echo $getProduct['soluong'] ?>) {
                    $('#soluong').val(<?php echo $getProduct['soluong'] ?>);
                    $('#tongthanhtoan').html(tongtien($('#soluong').val()) +"đ");
                    alert("You cannot buy more than the remaining products");
                }
            })
        });
        $(window).load(function(){
            responsive();
            $(window).resize(function(){
                responsive();
            });
        });
    </script>

</body>
</html>
