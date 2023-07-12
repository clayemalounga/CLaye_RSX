<?php
session_start();
require_once "./config/constante.php";
if (isset($_SESSION) && !empty($_SESSION)){
    unset($_SESSION['idu']);
    unset($_SESSION['auth']);
    header("location:".ROUTPATH);
}else{
    header("location:".ROUTPATH);
}   
?>