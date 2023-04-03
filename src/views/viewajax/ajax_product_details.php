<style>

    .tr1{
        background: #f5f5f5;
    }
    .tr2{
        background: #fff;
    }
    .td1{
        padding-left: 10px;
        width: 30%;
        font-weight: 500;
    }
    .td2{
        padding-left: 10px;
        width: 70%;
        font-weight: 400;
    }
    table{
        width: 100%;
        min-width: 100%;
        margin: auto;
        border-collapse: separate;
        border-spacing: 0;
    }


    table thead th {
        font-size:14px;
        background: #dedede;
        color: #4C68D7;
        position: sticky;
        top: 0;
        padding: 5px 5px;
    }

    .col-12 table th, .col-12 table td {
        padding: 5px 5px;
        vertical-align: top;
    }
    tr img{
        margin: 5px;
    }
</style>
<?php
   if(isset($_POST['id'])){
       $id = $_POST['id'];
       require_once '../../module/Product.php';
       $product = new Product();
       $getdata = $product->getProductById($id);
?>

<?php } ?>