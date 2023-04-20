<?php
include_once '../config/connect.php';
include_once '../page/head.php';


if (isset($_POST['submit'])) {
    if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['price'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $nameUser = $_SESSION['login'];
        $file = $_POST['file'];

        $req = mysqli_query($connect, "INSERT INTO `products`(`id`,`name`,`description`,`nameUser`,`price`, `file`) values (NULL, '$name','$description','$nameUser','$price', '$file')");
    }
    header('Location:../mainpage/lk.php');
}
    ?>

