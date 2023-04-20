<?php
session_start();
if(isset($_POST['exit'])){
    unset($_SESSION['username']);
    unset($_SESSION['login']);
    header('Location:../index.php');
}

?>
