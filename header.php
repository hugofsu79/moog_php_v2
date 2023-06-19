<header>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="./index.php">
        <img src="./Rscs/png/moog_music_logo.png" alt="Bootstrap" width="80" height="auto">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="panier" href="./panier.php">Panier</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active" aria-current="inscriptionconnexion" href="./gammes.php">Gammes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="panier" href="./Boutique.php">Boutique</a>
          </li>
        </ul>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <div class="dropdown">
              <?php
              if (!isset($_SESSION['id']) && isset($_SESSION['prenom']) && isset($_SESSION['nom'])) {  // si l'utilisateur n'est pas connecté
                echo "<li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"connection.php\">Connexion / créer compte</a>
                          </li>";
              } else {
                echo "<li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"mon_comptex.php\">Mon compte</a>
                          </li>
                          <li class=\"nav-item\">
                            <form action=\"index.php\" method=\"post\" class=\"nav-link\">
                              <input type=\"hidden\" name=\"logout\">
                              <input class=\"bg-light\" style=\"border: none\" type=\"submit\" value=\"Déconnexion\">
                            </form>
                          </li>";
              } ?>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>