<?php
// inclure le fichier des fonctions pour pouvoir les appeler ici
include 'function.php';

//Initialiser la session et accéder à la superglobale $_SESSION (tableau associatif)
session_start();

//J'inclus le head avec les balises de base + la balise head (pour ne pas répéter le code qu'il contient)
include 'head.php';


if(isset($_POST["connexion"])){
    createConnection();
}
if(isset($_POST['inscription'])) {
    inscription();
}

include 'header.php';

?>

<?php
// Vérification des erreurs lors de l'inscription
$errors = [];

// // Vérification des données soumises lors de l'inscription
// if (empty($_POST['prenom'])) {
//     $errors[] = "Veuillez fournir un prénom.";
// }
// // Vérification des données soumises lors de l'inscription
// if (empty($_POST['nom'])) {
//     $errors[] = "Veuillez fournir un nom.";
// }

// if (empty($_POST['email'])) {
//     $errors[] = "Veuillez fournir une adresse e-mail.";
// }

// if (empty($_POST['mot_de_passe'])){
//     $errors[] = "Veuillez fournir un mot de passe correct";
// }

// paramètres de connexion à la base de données
$nom = 'nom';
$prenom = 'prenom';
$password_db = 'votre_mot_de_passe';

//connexion à la base de données
// $pdo = new PDO("mysql:name=$name;db=$db", $username_db, $password_db);

// Vérif si l'adresse e-mail existe déjà
$query = "SELECT COUNT(*) as count FROM utilisateurs WHERE email = :email";

// Affichage des erreurs sur la page de connexion
if (!empty($errors)) {
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
}

?>


<?php
include 'footer.php';
?>