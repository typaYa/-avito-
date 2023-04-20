<?php
include_once '../config/connect.php';
include_once '../page/head.php'
?>
<style>
    *, *::before, *::after {
        box-sizing: border-box;
    }
    .wrapper{
        margin-top: 100px;
        width: 600px;
       margin-left: auto;
        margin-right: auto;
    }
    .input1{
        width: 100px;
    }
    .wrapper{
        margin-bottom: 1rem;
    }
    .text-field__input{
        display: block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        font-family: inherit;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #bdbdbd;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .input1{
        background-color: white;
        width: 100px;
        height: 50px;
        border: 1px solid black;
        border-radius: 10%;
    }
    .input1:hover{
        background-color: #8c8b8b;
    }
</style>
<form action="../config/create.php" method="post">
    <div class="wrapper">

        <input type="text" name="name" class="text-field__input" placeholder="Название товара" required><br>

        <input type="text" name="description" class="text-field__input" placeholder="Описание товара" required><br>

        <input type="text" name="price" class="text-field__input" placeholder="Цена товара" required><br>
        <label for="">Добавить изображение</label>
        <input type="file" name="file" class="text-field__input" ">
        <input type="submit" name="submit" value="Разместить" class="input1">
    </div>
</form>
