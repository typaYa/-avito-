<?php
include_once '../page/head.php';

if(isset($_POST['submit'])){
if (!empty($_POST)) {
    $errosLogin = [];
    $errosPassword = [];
    $errors =[];
    $errors1 = & $errors[];
    if (empty($_POST['login'])) {
        $errosLogin[] = 'Ошибка';

    }

    if (empty($_POST['password'])) {
        $errosPassword[] = 'Ошибка';

    }
}
    $password = $_POST['password'];
    $login=$_POST['login'];
    $query =mysqli_query($connect,"SELECT * FROM `login` WHERE login = '$login' and password='$password'");

    while ($row = mysqli_fetch_assoc($query)) {
        if (!empty($row))
            print_r($row);
        $dblogin = $row['login'];
        $dbpassword = $row['password'];
        $username = $row['username'];
        if ($dblogin = $login and $dbpassword = $password) {
            $_SESSION['username'] = $username;
            $_SESSION['login']=$login;
            header('Location:../mainpage/lk.php');
        }
        else{
            $errors1 = 'Ошибка';
        }

    }
    if (!empty($errosLogin)) {
        $flagLogin = 1;
    }

    if (!empty($errosPassword)) {
        $flagPassword = 1;
    }
    if (!empty($errors)) {
        $flagErrors = 1;
    }
}
?>

<style>

    .container{

    }
    .wrapper{
        border: 1px solid black;
        height: 300px;
        margin: auto;
        display: flex;
        flex-direction: column;
        padding: 50px;
        position: fixed; top: 50%; left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    }
    .login{
        width: 300px;
        height: 30px;
        margin-bottom: 30px;
    }
    .label{
        margin-bottom: 20px;
        width: 90px;
        text-align: center;
    }
    form{
        margin: 200px;
    }
    input{
        outline: none;
    }
    .login1{
        background-color: white;
        border: none;
        border:1px solid black;
        height: 30px;
        transition: 0.3s;
    }

    .login1:hover{
        background-color: #8c8b8b;
        border: 1px solid #ababab;
    }

    .reg{
        margin-top: 10px;
        text-align: center;
    }
    .reg a{
        color: black;
        transition: 0.3s;
    }
    .reg a:hover{
        color: #6a6a6a;
    }



</style>
<form action="" method="post">
    <div class="container">
        <div class="wrapper">
            <label for="" class="label" "><h2>Авторизация</h2></label>
            <?
            if($flagLogin ==1){
                ?><span style="color: red">*Пожалуйста, введите логин*</span>
                <?
            }?>
            <input type="text" class="login" name="login" placeholder="Логин" >
            <?
            if($flagPassword ==1){
                ?><span style="color: red">*Пожалуйста, введите пароль*</span>
                <?
            }?>
            <input type="password" class="login" name="password" placeholder="Пароль" >
            <?if($flagErrors ==1){
            ?><span style="color: red">*Неправильный логин или пароль*</span>
            <?
            }?>
            <input type="submit" class="login1" name="submit" required>
            <label for="" class="reg"><a href="../mainpage/register.php">Еще не зарегестрированы?</a></label>
        </div>
    </div>
</form>