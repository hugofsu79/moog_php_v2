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

 <body>
     <div class="row justify-content-evenly">
         <div class="col-4">
             <fieldset>
                 <h1>Connexion</h1>
                 <form action="./connexion.php" method="post">
                     <a class="visually-hidden-focusable" href="#content">Skip to main content</a>
                     <div class="container">
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="mb-3">
                                     <label name="email" for="exampleInputEmail1" class="form-label">
                                         <h3 style="color: white;">Email</h3>
                                     </label>
                                     <input type="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
                                     <div id="emailHelp" class="form-text pt-2" style="color: white; opacity: 0.33;"><i>* Nous ne partagerons jamais votre adresse e-mail avec qui que ce soit d'autre.</i></div>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="mb-3">
                                     <label for="InputPassword1" class="form-label">
                                         <h3 style="color: white;">Mot de passe</h3>
                                     </label>
                                     <input name="mot_de_passe" type="password" class="form-control mb-5" id="eInputPassword1" placeholder="Mot de passe">
                                     <div class="form-check">
                                         <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                         <label class="form-check-label" for="flexCheckDefault">
                                             Retenir le mot de passe
                                         </label>
                                     </div>
                                     <button type="button" class="btn btn-outline-danger mt-3">Connexion</button>
                                 </div>
                             </div>
                         </div>
                     </div>
             </fieldset>
         </div>
         <div class="col-4">
             <h1>Inscription</h1>
             <div class="container">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="mb-3">
                             <div class="row gx-5">
                                 <div class="col">
                                     <div class="form-group pb-2">
                                         <label for="prenom" style="color: white;">Entrez votre prénom</label>
                                         <input type="text" class="form-control" name="prenom" placeholder="Prénom">
                                     </div>
                                 </div>
                                 <div class="col">
                                     <div class="form-group pb-2">
                                         <label for="nom" class="entrez_votre_nom" name="nom" style="color: white;">Entrez votre nom</label>
                                         <input type="text" class="form-control" name="nom" placeholder="Nom">
                                     </div>
                                 </div>
                             </div>
                             <!-- Email -->
                             <label for="inputEmail">
                                 <label for="adresse_email" style="color: white;">Adresse email</label>
                             </label>
                             <input name="email" type="email" class="form-control " id="inputExampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
                             <div id="emailHelp" class="form-text pt-2" style="color: white; opacity: 0.33;"><i>* Nous ne partagerons jamais votre adresse e-mail avec qui que ce soit d'autre.</i></div>
                         </div>
                         <div class="row">
                             <div class="col">
                                 <div class="mb-3">
                                     <div class="form__element__label"><label for="id_password" style="color: white;">Mot de passe</label></div>
                                     <input name="mot_de_passe" type="password" class="form-control mb-2" id="exampleInputPassword1" placeholder="Mot de passe">
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col">
                         <label for=adresse>Adresse</label>
                         <textarea id=adresse name="adresse" rows=1 required class="form-control" placeholder="Votre adresse"></textarea>
                     </div>
                     <div class="col-md-3">
                         <label for=codepostal>Code postal</label>
                         <input name="codepostal" type=text required class="form-control mb-5 text-center" placeholder="Code">
                     </div>
                     <div class="col-md-4">
                         <label for=ville>Ville</label>
                         <input name="ville" type=text required class="form-control mb-5"  placeholder="Asheville">
                     </div>
                     <div>
                         <button class="col-md-4 btn btn-outline-danger mb-5" type="submit">Inscription</button>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     </div>
     </form>
     </div>
     </div>
 </body>

 <?php
    var_dump($_SESSION);
    ?>


 <?php
    include 'footer.php';
    ?>