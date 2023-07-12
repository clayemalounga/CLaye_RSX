<?php
require_once "./config/database.php";
$sql='SELECT * FROM `aimes` WHERE `idu`=:idu AND `id_poste`=:id_poste';
$rec=$PDO->prepare($sql);
$rec->bindParam(":idu",$idu,PDO::PARAM_INT);
$rec->bindParam(":id_poste",$idp,PDO::PARAM_INT);
$rec->execute();
//header("location:".ROUTPATH);
?>