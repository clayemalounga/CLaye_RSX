<?php
    //We gonna to take all informations of posts
    require_once "./config/database.php";
    // We start with the request
    $sql='SELECT * FROM `poste`';
    $rq= $PDO->prepare($sql);
    $rq->execute();
    $utilisat= $rq->fetchAll(PDO::FETCH_ASSOC);
?>