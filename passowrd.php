<?php
if (isset($_POST['envoyer'])) {
    $erreur = 0;
    //nous pouvons voir si nous avons recuperer l'email
    if (!empty(trim($_POST['emailUtilisateur'])) and isset($_POST['emailUtilisateur'])) {
        if (preg_match('#^[a-z|A-Z]+[a-z|A-Z0-9-._]*@([a-z|A-Z]){2,}\.([a-z|A-Z0-9-_.]){2,5}$#', strtolower($_POST['emailUtilisateur']))) {
            //Nous pouvons prendre l'email
            $email = trim(strtolower($_POST['emailUtilisateur']));
        } else {
            $erreur_email = "l'email ne respect pas le format d'une adresse correct";
            $erreur++;
        }
    } else {
        $erreur_email = "l'email est incorrect";
        $erreur++;
    }
    if ($erreur == 0) {
        //Verifions si il est bien dans la base de donnee
        include_once("./model/password.php");
        //nous pouvons consulter notre fichier
        $file = file_get_contents("./controleur/register/connexion.txt");
        $ut = explode("\n", $file);
        $bool = false;
        $util = array();
        foreach ($ut as $key) {
            $util = explode(" ; ", $key);
            //var_dump($util);
            @$pass = $util[1];
            //echo $pass;
            if (@password_verify($pass, $r['motdepass_u'])){
                //echo "Les mot de passes sont identiques";
                $bool = true;
                if ($bool) {
                    require_once("./view/register/password.php");
                    return;
                    // $to = "clayemalounga@gmail.com";
                    // $sujet = "Demande de mot de passe";
                    // $message = "Nous vous remercions pour votre fideliter a notre egard votre mot de passe est le suivant : ".$util[1];
                    // // En-tete du mail
                    // $entete = "From: clayemalounga31@gmail.com";
                    // $entete .= "Reply-To: expediteur@example.com\r\n";
                    // $entete .= "MIME-Version: 1.0\r\n";
                    // $entete .= "Content-Type: text/plain; charset=utf-8\r\n";
                    // // nous validons
                    // if (mail($to, $sujet, $message, $entete)){
                    //     //header("location:" . ROUTPATH);
                    //     echo"valider";
                    //     return;
                    // } else {
                    //     require_once("./view/error/404.php");
                    // }
                }
            }
        }
    } else {
        require_once("./view/register/password.php");
    }
}

?>