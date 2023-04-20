<style>
    .wrapper{
        margin-left: 300px;
        margin-top: 50px;
        background-color: #adacac;
        padding-top:50px;
        padding-bottom: 50px;
    }
    a{
        color: black;
    }
</style>
<?php
include_once '../config/connect.php';

$login = $_SESSION['login'];

$req = mysqli_query($connect, "SELECT * FROM products WHERE `nameUser`='$login'");
while($row = mysqli_fetch_assoc($req)){
    ?>
    <a href="">
    <div class="wrapper">
        <div class="name"><? echo $row['name']?></div>
        <div class="price"><? echo $row['price']?></div>
        <div class="description"><? echo $row['description']?></div>
    </div>
    </a>
    <?php
}

?>
