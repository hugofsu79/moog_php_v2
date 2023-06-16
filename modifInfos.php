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
?>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb p-2">
    <li class="breadcrumb-item"><a href="./mon_compte.php">Mon compte</a></li>
    <li class="breadcrumb-item active" aria-current="page">Modifier mes infos</li>
  </ol>
</nav>

<h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Modifier mes informations</h1>
<div class="container">
  <form action="./modifInfos.php" method="post">

    <div class="row">

      <div class="col">
        <div class="form-group pb-2">
          <label for="prenom" style="color: white;">Prénom</label>
          <input type="text" required class="form-control" name="prenom" value="<?php echo $_SESSION['client']['prenom']?>">
        </div>
      </div>


      <div class="col">
        <div class="form-group pb-2">
          <label for="nom" style="color: white;">Nom</label>
          <input type="text" required class="form-control" name="nom" value="<?php echo $_SESSION['client']['nom']?>">
        </div>
      </div>


      <div class="col">
        <div class="form-group pb-2">
          <label for="inputEmail">
            <label for="adresse_email" required style="color: white;">Adresse email</label>
            <input required name="email" type="email" class="form-control " id="inputExampleInputEmail1" aria-describedby="emailHelp" placeholder="email" value="<?php echo $_SESSION['client']['email']?>">
            <div id="emailHelp" class="form-text pt-2" style="color: white; opacity: 0.33;"><i>* Nous ne partagerons jamais votre adresse e-mail avec qui que ce soit d'autre.</i></div>
        </div>
      </div>
    </div>
    <button class="col-md-4 btn btn-outline-danger mb-5" type="submit" name="inscription" value="true">Modifier</button>
  </form>
</div>








<?php
include 'footer.php';
?>



