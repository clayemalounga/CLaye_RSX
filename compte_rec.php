<?php
    require_once "./config/database.php";
    $idu=$_SESSION['idu'];
    $sql='SELECT * FROM `utilisateur` WHERE idu=:idu';
    $req=$PDO->prepare($sql);
    $req->bindParam(":idu", $idu, PDO::PARAM_INT);
    // Execute this request
    $req->execute();
    $row = $req->fetch(PDO::FETCH_ASSOC);
?>