<?php
include_once '../page/head.php';
include_once '../config/connect.php';


include_once '../test.php';

if (isset($_POST['submit'])) {

    $errosLogin = [];
    $errosPassword = [];
    $errosUsername = [];
    if (!empty($_POST)) {
        if (empty($_POST['login'])) {
            $errosLogin[] = 'Ошибка';

        }
        if (empty($_POST['username'])) {
            $errosUsername[] = 'Ошибка';

        }
        if (empty($_POST['password'])) {
            $errosPassword[] = 'Ошибка';

        }
        if (empty($errosLogin)&&empty($errosPassword) &&empty($errosPassword)) {
                if (isset($_POST['login'])&&isset($_POST['username'])&&isset($_POST['password'])){
                echo htmlspecialchars($_POST['login']);
                $login = $_POST['login'];
                $username = $_POST['username'];
                $password = $_POST['password'];

                $req = mysqli_query($connect, "SELECT * FROM `login` WHERE `login` = '$login'");
                $row = mysqli_fetch_assoc($req);

                if ($login == $row['login']) {
                    $flagLogin1=1;

                } else {
                    $user = new test($password, $login, $username);


                    $user->createNewUser($connect);

                    $_SESSION['username'] = $username;

                    header('Location:../mainpage/lk.php');
                 }
            }
        }
    }
    if (!empty($errosLogin)) {
            $flagLogin = 1;
    }
    if (!empty($errosUsername)) {
        $flagUsername = 1;
    }
    if (!empty($errosPassword)) {
        $flagPassword = 1;
    }



}

?>
<style>
    .wrapper{
        border: 1px solid black;
        height: 350px;
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
            <label for=""class="label"><h2>Регистрация</h2></label>
            <?
            if($flagLogin ==1){
                ?><span style="color: red">*Пожалуйста, введи логин*</span>
                <?
            }?>
            <?
            if($flagLogin1 ==1){
                ?><span style="color: red">*Такой логин уже существует*</span>
                <?
            }?>
            <input type="text" name="login" class="login" placeholder="Логин..." value='<?$_POST['login']?>'>

            <?
            if($flagUsername ==1){
                ?><span style="color: red">*Пожалуйста, имя пользователя*</span>
                <?
            }?>
            <input type="text" name="username" class="login"placeholder="Имя пользователя..." >
            <?
            if($flagPassword ==1){
                ?><span style="color: red">*Пожалуйста, введи пароль*</span>
                <?
            }?>
            <input type="password" name="password" class="login" placeholder="Пароль..." value="<?$password?>">

            <input type="submit" name="submit" class="login1">
            <label for="" class="reg"><a href="../mainpage/login.php">Уже зарегестрированы?</a></label>

        </div>
    </div>
</form>


