<?php
try {
    $sql = 'INSERT INTO `poste`(`auteur`,`des_poste`,`media`,`idu`)VALUES(:auteur, :des_poste, :media, :idu)';
    $req = $PDO->prepare($sql);
    $req->bindParam(":auteur", $auteur, PDO::PARAM_STR);
    $req->bindParam(":des_poste", $description, PDO::PARAM_STR);
    $req->bindParam(":media", $dest, PDO::PARAM_STR);
    $req->bindParam(":idu", $idu, PDO::PARAM_INT);
    $req->execute();
    header("location:" . ROUTPATH);
}catch (PDOException $e) {
    echo"erreur d'envoie".$e->getMessage();
}
?>