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
            <?php if (isset($_SESSION['client']['id'])) { ?>
              <li class="nav-item">
                <div class="dropdown">
                  <button class="btn btn-light dropdown-toggle pr-5" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php if (isset($_SESSION['client']['id'])) { ?>
                      <p>&#127772;<?= $_SESSION['client']['prenom'] ?>
                      </p>
                    <?php }
                    ?>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-light">
                    <li class="nav-item"><a href="mon_compte.php">Mon compte</a></li>
                    <form action="./index.php" method="post">
                      <button type="submit" name="deconnection" class="btn btn-outline-dark">Déconnexion</button>
                    </form>
                    <li class="nav-item"><?php } else {
                                          echo "<a href=\"./inscription.php\">connexion/inscription</a>";
                                        } ?></li>
                  </ul>
                </div>
              </li>
          </ul>
      </div>
    </div>
  </nav>
</header>