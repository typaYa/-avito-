<?php
include_once 'config/connect.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="script" href="config/script.js">
    <title>Document</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        text-decoration: none;
        list-style: none;
    }

    header ul {
        display: flex;
        justify-content: space-around;
        padding: 5px;
        background: black;
    }
    header ul li a{
        color: white;
        font-size: 20px;
        padding: 5px;
        transition: 0.3s;
    }
    header ul li a:hover{
        color: #484848;
    }
    .form{

    }
    .search{
        margin-top: 10px;
        margin-left: 50px;
        color: black;
        width: 700px;
        height: 30px;
        font-size: 1vw;
        border: none;
        padding: 5px;
        border-radius: 20px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    }
    .search:hover{
        border: none;
    }
    input {outline:none;}

    .wrapper{
        width: 100%;
    }
    .data{

    }

    .wrapper1{
        width: 100%;
        color: black;
        display: flex;
        flex-direction: column;
        margin-left: 100px;
        margin-top: 20px;
        background-color: #adacac;
        padding-top:10px;
        padding-bottom: 10px;
        padding-left: 10px;
    }
    .search1{
        background-color: white;
        border: none;
        width: 5rem;
        height: 30px;
        border-radius: 10px;
    }

    .nav{
        display: flex;
        height: 50px;
        background-color: #8c8b8b;
    }
    .menu{
        font-size: 20px;
        margin-top:10px;
        padding-bottom: 10px;
        padding-left: 40px;
    }
    .menu a{
        color: black;
        transition: 0.3s;
    }
    .menu a:hover{
        color: #181818;
        background-color: #afafaf;
        padding: 10px;
        font-size: 25px;
    }
    .dropbtn {
        background-color: #3498DB;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    /* Dropdown button on hover & focus */
    .dropbtn:hover, .dropbtn:focus {
        background-color: #838383;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        margin-left: 20px;
        position: relative;
        display: inline-block;

    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {

        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {

        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {background-color: #ddd}

    /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
    .show {display:block;}
</style>
<body>

<header>
    <nav>
        <ul>
            <li><a href="../index.php">Главная</a></li>

            <?php
            if (isset($_SESSION['username'])){
                ?>
                <li><a href="../mainpage/lk.php">Личный кабинет</a></li>
                <?php
            }
            else{
                ?>
                <li><a href="../mainpage/login.php">Авторизация</a></li>
                <?php
            }
            ?>

        </ul>
    </nav>
</header>

<div class="nav">
    <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">Все категории</button>
        <div id="myDropdown" class="dropdown-content">
            <a href="">Недвижимость</a>
            <a href="">Транспорт</a>
            <a href="">Работа</a>
            <a href="">Услуги</a>
            <a href="">Животные</a>
            <a href="">Хобби и отдых</a>
            <a href="">Для дома и дачи</a>
            <a href="">Запчасти и аксессуары</a>
            <a href="">Электроника</a>
            <a href="">Вещи</a>

        </div>
    </div>
    <form action="config/searching.php " method="post" class="form">
        <input type="search" name="search" class="search" placeholder="Поиск..."><input type="submit" name="submit" class="search1" value="Найти">
    </form>
</div>
<?php
$req = mysqli_query($connect, "SELECT * FROM products");
while($row = mysqli_fetch_assoc($req)){
    ?>

    <div class="wrapper">
        <a href="mainpage/produsts.php?id=<?=$row['id']?>" class="wrapper1">
        <div class="data file"><img src="<? echo $row['file']?>" alt=""></div>
        <div class="data name"><? echo $row['name']?></div>
        <br>
        <div class="data price"><? echo $row['price']?></div>
        <br>
        <div class="data description"><? echo $row['description']?></div>
        </a>
    </div>

    <?php
}?>
<? include 'page/end.php' ?>
<script>
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }


    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {

            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

</script>
</body>
</html>