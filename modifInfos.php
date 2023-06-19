<?php
// inclure le fichier des fonctions pour pouvoir les appeler ici
include 'function.php';

//Initialiser la session et accéder à la superglobale $_SESSION (tableau associatif)
session_start();

// Pour initialiser le panier 
createCart();

//J'inclus le head avec les balises de base + la balise head(pour ne pas répeter le code qu'il contient)
include 'head.php';
?>
<?php
include 'header.php';

// Pour initialiser le panier 
// createCart();
// var_dump($_SESSION);

if (isset($_POST['nom'])) {
  modifInfo();
}

if (isset($_POST['userModified'])) {
    updateUser();
}

?>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb p-2">
    <li class="breadcrumb-item text-light"><a href="./mon_compte.php">Mon compte</a></li>
    <li class="breadcrumb-item active text-light" aria-current="page">Modifier mes infos</li>
  </ol>
</nav>

<h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Modifier mes informations</h1>

<main>

  <?php displayInformations("changeInformations.php"); ?>


</main>









<?php
include 'footer.php';
?>