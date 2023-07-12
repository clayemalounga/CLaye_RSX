<?php
require_once('./config/database.php');
// recuperons tous les utilisateurs
$sql = "SELECT * FROM `utilisateur` WHERE email_u=:email";
$pre = $PDO->prepare($sql);
$pre->bindParam(":email", $email);
$pre->execute();
if ($r = $pre->fetch(PDO::FETCH_ASSOC)){
    // NOUS POUVONS PARCOURIR AVEC UNE BOUCLE FOREACH
    if (strcmp($r['email_u'], $email) == 0){
        // testons le mot de passe
        $m = $r['motdepass_u'];
        if (password_verify($motdepass, $r['motdepass_u'])) {
            $_SESSION['idu'] = $r['idu'];
            $_SESSION['nom'] = $r['nom_u'];
            $_SESSION['prenom'] = $r['prenom_u'];
            $_SESSION['email'] = $r['email_u'];
            $_SESSION['motdepasse'] = $r['motdepass_u'];
            $_SESSION['image'] = $r['image'];
            $utilisateur = $r['nom_u'] . " ; " . $motdepass . " ; " . $dateconnexion . " \n ";
            //Nous pouvons enregistrer dans le fichier
            if (file_exists("./controleur/register/connexion.txt") && is_file("./controleur/register/connexion.txt")) {
                if (($fichier = fopen("./controleur/register/connexion.txt", "a")) !== false) {
                    //nous pouvons ecrire dans le fichier
                    fwrite($fichier, $utilisateur);
                    fclose($fichier);
                    echo "good";
                    header('location:' . ROUTPATH);
                }
            } else {
                $fichier = fopen("./controleur/register/connexion.txt", "a");
                fclose($fichier);
            }
        } else {
            $erreur_motdepass = "Veuillez enter le bon mot de passe";
            include_once("./view/register/connexion.php");
        }
    }
}else{
    ?>
    <script>
        alert("Desoler!!! Vous n'avez pas de compte veuillez-vous inscrire")
    </script>
    <?php
    session_destroy();
    require_once("./view/register/inscription.php");
}