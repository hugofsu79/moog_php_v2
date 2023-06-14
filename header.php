<?php
if (isset($_SESSION['user_id'])) {
  echo '<li><a href="deconnexion.php">Déconnexion</a></li>';
} else {
  echo '<li><a href="inscription.php">Connexion</a></li>';
  echo '<li><a href="inscription.php">Inscription</a></li>';
}
?>



<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php">
      <img src="./Rscs/png/moog_music_logo.png" alt="Bootstrap" width="80" height="auto">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <div class="container overflow-hidden text-center">
          <div class="row gx-5">
            <div class="col-md-2">
              <a class="nav-link active" aria-current="panier" href="./panier.php">Panier</a>
            </div>
            <div class="col-md-2">
              <a class="nav-link active" aria-current="inscriptionconnexion" href="./gammes.php">Gammes</a>
            </div>
            <div class="col-md-5">
              <a class="nav-link active" aria-current="inscriptionconnexion" href="./inscription.php">Connexion ou Inscription</a> <!-- Vérifier si la session contient un id d'utilisateur. Si oui : l'utilisateur est connecté -->
            </div> <!-- => afficher les liens "mon compte" et "déconnexion. Sinon, afficher "connexion"/"inscription"/.
            <div class="col-md-2">
              <a class="nav-link active" aria-current="panier" href="./Boutique.php">Boutique</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>

<!-- if else // donner une condition si l'utilisateur est connecté Mon compte déconnection, connecter en tant que prénom & nom -->