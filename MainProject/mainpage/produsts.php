<?php
include_once '../test.php';
require_once '../config/connect.php';
require_once '../page/head.php';
$product_id = $_GET['id'];
$product = mysqli_query($connect, "select * from `products` where `id` = '$product_id'");
$product = mysqli_fetch_assoc($product);
?>
<style>
    p{
        margin-left: 30px;
        margin-top: 20px;
        font-size: 30px;
    }
</style>
<div class="container">
    <p><?echo $product['name'] ?></p>
    <p><? echo $product['price']?></p>
    <p><?echo $product['description']?></p>
</div>
