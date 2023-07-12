<?php 
    require_once "./config/database.php";
    $sql="SELECT * FROM `utilisateur` WHERE email_u='$email'";
    $sql1=$PDO->prepare($sql);
    $sql1->execute();
    if($r=$sql1->fetch(PDO::FETCH_ASSOC)){
        ?>
        <script>
            alert("Nous vous avons trouvee !!!! continuez please");
        </script>
        <?php
    }else{
        header("location:".ROUTPATH."nous-inscrire.html");
    }
?>