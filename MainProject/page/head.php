<?php
include_once '../config/connect.php';
?>
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
        background-color: #000000;
        color: #8c8b8b;
    }
</style>
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
