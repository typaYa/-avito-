<?php
include_once '../test.php';
require_once '../config/connect.php';
if(isset($_POST['submit'])){

    $erros = [];
    if (!empty($_POST)) {
        if (empty($_POST['login'])) {
            $erros[] = 'Ошибка';
        }
        if (empty($erros)) {
            echo htmlspecialchars($_POST['login']);
            exit();
        }
    }
    if (!empty($erros)) {
        foreach ($erros as $err) {
            $flagLogin = 1;
        }
    }


    $login = $_POST['login'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $req = mysqli_query($connect, "SELECT * FROM `login` WHERE `login` = '$login'");
    $req = mysqli_fetch_assoc($req);

    if($login==$req['login']){
        echo 'Такой логин уже существупет';
        var_dump($password);
        header('Location:../mainpage/register.php');
        echo 'Неправильный лоигн или пароль';
    }
    else{
        $user = new test($password,$login,$username);


        $user->createNewUser($connect);

        $_SESSION['username']=$username;
        $_SESSION['login']=$login;

        header('Location:../mainpage/lk.php');
    }
}
?>


