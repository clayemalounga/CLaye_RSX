<?php
require_once "./model/like/verifie_like.php";
$r=$rec->fetch(PDO::FETCH_ASSOC);
$nombre=$r['nombre_like'];
if ($rec->rowCount()>0){
    if($nombre==0){
        $bool=true;
        $sql='UPDATE `aimes` SET `nombre_like`=:nombre_like, `bool`=:bool WHERE `idu`=:idu and `id_poste`=:id_poste';
        $rec=$PDO->prepare($sql);
        $rec->bindParam(":nombre_like",$like,PDO::PARAM_INT);
        $rec->bindParam(":idu",$idu,PDO::PARAM_INT);
        $rec->bindParam(":id_poste",$idp,PDO::PARAM_INT);
        $rec->bindParam(":bool", $bool,PDO::PARAM_BOOL);
        $rec->execute();
        $_SESSION['like']=true;
        header("location:".ROUTPATH);
    }else{
        $like--;
        $bool=false;
        $sql='UPDATE `aimes` SET `nombre_like`=:nombre_like, `bool`=:bool WHERE `idu`=:idu and `id_poste`=:id_poste';
        $rec=$PDO->prepare($sql);
        $rec->bindParam(":nombre_like",$like,PDO::PARAM_INT);
        $rec->bindParam(":idu",$idu,PDO::PARAM_INT);
        $rec->bindParam(":id_poste",$idp,PDO::PARAM_INT);
        $rec->bindParam(":bool", $bool,PDO::PARAM_BOOL);
        $rec->execute();
        unset($_SESSION['like']);
        header("location:".ROUTPATH);
    }
}else{
    echo"Nous pouvons faire une nouvelle insertion";
    $sql='INSERT INTO `aimes`(`nombre_like`,`idu`,`id_poste`,`bool`)VALUES(:nombre_like,:idu,:id_poste, :bool)';
    $bool=true;
    $_SESSION['like']=true;
    $rec=$PDO->prepare($sql);
    $rec->bindParam(":nombre_like",$like,PDO::PARAM_INT);
    $rec->bindParam(":idu",$idu,PDO::PARAM_INT);
    $rec->bindParam(":id_poste",$idp,PDO::PARAM_INT);
    $rec->bindParam(":bool", $bool,PDO::PARAM_BOOL);
    $rec->execute();
    header("location:".ROUTPATH);
}
?>