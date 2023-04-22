
<?php

include_once '../config/connect.php';
include_once '../page/head.php';
if(isset($_POST['submit'])){
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
            else
                

        }
}
?>

