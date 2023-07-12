<?php
require_once "./config/database.php";
// REcuperons d'abord les utilisateurs de la base de donnees afin de ne pas l'inserer plusieurs fois
$users = "SELECT * FROM `utilisateur` WHERE `email_u`='$email'";
$user = $PDO->prepare($users);
$user->execute();
if ($r= $user->fetch()){
    if (strcmp($r['email_u'], $email) == 0) {
        //echo "Vous exister deja dans la base de donnee";
        require_once "./view/register/connexion.php";
        ?>
        <script>
            alert('Vous etes deja inscri, connecter vous !!!');
        </script>
        <?php
        return;
    } else {
        //Mettons dans le fichier
        if (file_exists("./controleur/register/utilisateurs.txt") && is_file("./controleur/register/utilisateurs.txt")) {
            if (($fichier = fopen("./controleur/register/utilisateurs.txt", "a")) !== false) {
                //nous pouvons ecrire dans le fichier
                fwrite($fichier, $utilisateur);
                fclose($fichier);
            }
        } else {
            $fichier = fopen("./controleur/register/utilisateurs.txt", "a");
            fclose($fichier);
        }
        //Mettons dans la session
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['email'] = $email;
        $_SESSION['motdepasse'] = $motdepasse;
        $_SESSION['image'] = $dest;
        //Mettons dans la base de donnee
        try {
            $sql = 'INSERT INTO `utilisateur`(`nom_u`,`prenom_u`,`email_u`,`motdepass_u`,`image`)VALUES(:nom,:prenom,:email,:motdepass,:dest)';
            $req = $PDO->prepare($sql);
            $req->bindValue(':nom', $nom, PDO::PARAM_STR);
            $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $req->bindValue(':email', $email, PDO::PARAM_STR);
            $req->bindValue(':motdepass', $motdepasse, PDO::PARAM_STR);
            $req->bindValue(':dest', $dest, PDO::PARAM_STR);
            $req->execute();
            header("location:" . ROUTPATH);
        } catch (PDOException $e) {
            echo "erreur" . $e->getMessage();
        }
    }
} else {
    //Mettons d'abord dans la session
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['email'] = $email;
    $_SESSION['motdepasse'] = $motdepasse;
    $_SESSION['image'] = $dest;
    //Mettons dans le fichier
    if (file_exists("./controleur/register/utilisateurs.txt") && is_file("./controleur/register/utilisateurs.txt")) {
        if (($fichier = fopen("./controleur/register/utilisateurs.txt", "a")) !== false) {
            //nous pouvons ecrire dans le fichier
            fwrite($fichier, $utilisateur);
            fclose($fichier);
        }
    } else {
        $fichier = fopen("./controleur/register/utilisateurs.txt", "a");
        fclose($fichier);
    }
    //Envois dans la base de donnee
    try {
        $sql = 'INSERT INTO `utilisateur`(`nom_u`,`prenom_u`,`email_u`,`motdepass_u`,`image`)VALUES(:nom,:prenom,:email,:motdepass,:dest)';
        $req = $PDO->prepare($sql);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':motdepass', $motdepasse, PDO::PARAM_STR);
        $req->bindValue(':dest', $dest, PDO::PARAM_STR);
        $req->execute();
        header("location:" . ROUTPATH);
    } catch (PDOException $e) {
        echo "erreur" . $e->getMessage();
    }
}