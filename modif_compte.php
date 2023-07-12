<?php
require_once "./config/database.php";
// We start with the request
$id=$_SESSION['idu'];
$sql='UPDATE `utilisateur` SET `nom_u`=:nom_u ,`prenom_u`=:prenom_u , `email_u`=:email_u , `motdepass_u`=:motdepass_u,`image`=:image WHERE idu=:idu';
$rq=$PDO->prepare($sql);
$rq->bindParam(":idu",$id,PDO::PARAM_INT);
$rq->bindParam(":nom_u",$nom,PDO::PARAM_STR_CHAR);
$rq->bindParam(":prenom_u",$prenom,PDO::PARAM_STR_CHAR);
$rq->bindParam(":email_u",$email,PDO::PARAM_STR_CHAR);
$rq->bindParam(":motdepass_u",$motdepasse,PDO::PARAM_STR_CHAR);
$rq->bindParam(":image",$dest,PDO::PARAM_STR);
$rq->execute();
?>