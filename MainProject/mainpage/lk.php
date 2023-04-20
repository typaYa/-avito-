<?php
session_start();
include_once '../page/head.php';
?>

<style>
    h1{
        padding-top: 50px;
        padding-left: 70px;

    }
    .my {
        padding-left: 70px;
        font-size: 30px;
    }
    .my1{
        font-size: 30px;
        transition: 0.3s;
        max-width: 300px;
        padding-left: 70px;
    }
    .my1 a:hover{
        color: #8c8b8b;
    }


    .exit{
        outline: none;
        background-color: white;
        border: none;
        padding: 10px;
        margin-left: 70px;
        font-size: 17px;
        transition: 0.3s;
    }
    .exit:hover{
        background-color: #8c8b8b;
    }

</style>
<p><h1>Привет <? echo $_SESSION['username'] ?></h1></p>


<form action="../config/exit.php" method="post">
    <input type="submit" name="exit" value="Выход" class="exit">
</form>
<p class="my">Мои обявления:</p>
<?php include '../config/myproducts.php'?>
<p class="my1"><a href="../mainpage/add.php">Разместить обявление</a></p>