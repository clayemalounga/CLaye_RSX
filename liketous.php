<?php
    require_once "./config/database.php";
    $id=$_SESSION['idu'];
    $users='SELECT * FROM `aimes` WHERE idu=:idu';
    $likes=$PDO->prepare($users);
    $likes->bindParam(":idu", $id, PDO::PARAM_INT);
    $likes->execute();
    $likeusers= $likes->fetchALL(PDO::FETCH_ASSOC);
?>