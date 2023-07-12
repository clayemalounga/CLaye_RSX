<?php
require_once "./config/database.php";
$sql='INSERT INTO `commentaire`(`commentaire`,`idu`,`id_poste`)VALUES(:commentaire,:idu,:id_poste)';
$rec=$PDO->prepare($sql);
$rec->bindParam(":commentaire",$com,PDO::PARAM_STR);
$rec->bindParam(":idu",$idu,PDO::PARAM_INT);
$rec->bindParam(":id_poste",$idp,PDO::PARAM_INT);
$rec->execute();
header("location:".ROUTPATH);
?>