<?php
    require_once "./config/database.php";
    $id=$_SESSION['idu'];
    $users='SELECT COUNT(*) AS `nombre_like` FROM `aimes` WHERE idu=:idu and nombre_like=:idu';
    $likes=$PDO->prepare($users);
    $likes->bindParam(":idu", $id, PDO::PARAM_INT);
    $likes->execute();
    $likeuser= $likes->fetchColumn();
?>