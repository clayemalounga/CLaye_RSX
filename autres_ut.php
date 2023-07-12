<?php
require_once "./config/database.php";
$id = $_SESSION['idu'];
$sql = 'SELECT * FROM `utilisateur` WHERE NOT idu=:idu';
$req = $PDO->prepare($sql);
$req->bindParam(":idu", $id, PDO::PARAM_INT);
// Execute this request
$req->execute();
$r = $req->fetchALL(PDO::FETCH_ASSOC);
?>