<h1>Inscription</h1>
<?php
if (isset($_POST['frmRegistration'])) {
    
   /* //syntaxe classique
    if(isset($_POST['nom'])) {
        $nom = $_POST['nom'];
    }

    else {
        $nom ="";
    }

    
    // Opérateur ternaire
    $nom = isset($_POST['nom']) ? $_POST['nom'] : "";*/


    //Opérateur Null coalescent PHP 7
    $nom = $_POST['nom'] ?? "";
    $prenom = $_POST['prenom'] ?? "";
    $email = $_POST['email'] ?? "";
    $motDePasse = $_POST['motDePasse'] ?? "";

    $erreurs = array();

    if($nom == "") {
        array_push($erreurs, "Veuillez saisir votre nom");
    }

    if ($prenom == "") {
        array_push($erreurs, "Veuillez saisir votre prenom");
    }

    if ($email == "") {
        array_push($erreurs, "Veuillez saisir votre email");
    }

    if ($motDePasse == "") {
        array_push($erreurs, "Veuillez saisir un mot de passe");
    }

    if (count($erreurs) > 0) {
        $message = "<ul>";

    $i = 0;

        while($i < count($erreurs)) {
            $message .= "<li>";
            $message .= $erreurs[$i];
            $message .= "</li>";
            $i++;
        }
        $message .= "</ul>";
        echo $message;
        include "frmRegistration.php";

    }

    else {
        $motDePasse = sha1($motDePasse);
        //mysqli_connect(adresse, utilisateur, mot de passe, base);
        $connection = mysqli_connect("localhost", "PHPDIEPPE", "21021997", "phpdieppe");
        $requete = "INSERT INTO t_users
                    (USE_NAME, USE_FIRSTNAME, USE_MAIL, USE_PASSWORD, IDROLE)
                    VALUES ('$nom', '$prenom', '$email', '$motDePasse', 3)";

      //  die($requete);

        

        if (!$connection) {
            die("Erreur MySQL" . mysqli_connect_errno() . " | " . mysqli_connect_error());
        }

        else {
            if (mysqli_query($connection, $requete)) {
                echo "Données Enregistrées";
            }
        
            else {
                echo "Erreur";
                include "frmRegistration.php";
            }

            mysqli_close($connection);
        }
    }
}

else {
    echo "Je ne viens pas du formulaire";
    include "frmRegistration.php";
}
