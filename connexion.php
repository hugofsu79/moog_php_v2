<?php
// inclure le fichier des fonctions pour pouvoir les appeler ici
include 'function.php';

//Initialiser la session et accéder à la superglobale $_SESSION (tableau associatif)
session_start();



//J'inclus le head avec les balises de base + la balise head(pour ne pas répeter le code qu'il contient)
include 'head.php';
?>

 <?php
    include 'header.php';
    ?>
<?php
if (isset($_POST["mail"])) {
    echo "Yes, mail is set";    
} else {    
    echo 
    "<div class=\"col text-center pt-5 pb-5\">
    <h1 name=\"h1_with_bg\">Merci pour votre inscription 🦾</h1></div>
    <div class=\"text-center\">
    <div><iframe class=\"rounded-2\" src=\"https://i.giphy.com/media/3o7btZ3T6y3JTmjg4w/giphy.webp\"></iframe></div>
        </div>
    </div>
    <div class=\"text-center\">
    <a type=\"button\" class=\"btn btn-danger btn-lg mt-5 mb-5\" href=\"index.php?param=<?php?>\">Retour au menu</a> "
    ;
    
}
?>



 <?php
    include 'footer.php';
    ?>

    