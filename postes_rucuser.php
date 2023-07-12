<?php

    require_once "./config/database.php";
    $id=$_SESSION['idu'];
    $user='SELECT * FROM `poste` WHERE idu=:idu';
    $poste=$PDO->prepare($user);
    $poste->bindParam(":idu", $id, PDO::PARAM_INT);
    $poste->execute();
    $postes= $poste->fetchAll(PDO::FETCH_ASSOC);
?>