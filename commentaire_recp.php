<?php
require_once "./config/database.php";
$id=$_SESSION['idu'];
$commentaires='SELECT `commentaire` FROM `commentaire` WHERE idu=:idu';
$comments=$PDO->prepare($commentaires);
$comments->bindParam(":idu",$id,PDO::PARAM_INT);
$comments->execute();
$comment= $comments->fetchALL(PDO::FETCH_ASSOC);
?>