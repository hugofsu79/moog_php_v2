 <?php
    // inclure le fichier des fonctions pour pouvoir les appeler ici
    include 'function.php';

    //Initialiser la session et accéder à la superglobale $_SESSION (tableau associatif)
    session_start();




    //J'inclus le head avec les balises de base + la balise head(pour ne pas répeter le code qu'il contient)
    include 'head.php';
    ?>

 <body>
     <?php
        include 'header.php';
        ?>
     <div class="row justify-content-evenly">
         <div class="col-5">
             <fieldset>
                 <h1>Connexion</h1>
                 <div class="container">
                     <div class="row">
                         <div class="col-md-12">
                             <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">
                                     <h2 style="color: white; border-bottom: solid white;">Email</h2>
                                 </label>
                                 <input type="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
                                 <div id="emailHelp" class="form-text" style="color: white;"><i>Nous ne partagerons jamais votre adresse e-mail avec qui que ce soit d'autre.</i></div>
                             </div>
                         </div>
                         <div class="col-md-12">
                             <div class="mb-3">
                                 <label for="InputPassword1" class="form-label">
                                     <h2 style="color: white; border-bottom: solid white;">Mot de passe</h2>
                                 </label>
                                 <input type="password" class="form-control mb-5" id="eInputPassword1" placeholder="Password">
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
                                         <label for="nom" style="color: white;">Entrez votre prénom</label>
                                         <input type="text" class="form-control" id="nom" placeholder="Prénom">
                                     </div>
                                 </div>
                                 <div class="col">
                                     <div class="form-group pb-2">
                                         <label for="nom" style="color: white;">Entrez votre nom</label>
                                         <input type="text" class="form-control" id="nom" placeholder="Nom">
                                     </div>
                                 </div>
                             </div>
                             <!-- Email -->
                             <label for="exampleInputEmail1" class="form-label">
                                 <h5 style="color: white;">Adresse email</h5>
                             </label>
                             <input type="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
                             <div id="emailHelp" class="form-text" style="color: white;"><i> ne partagerons jamais votre adresse e-mail avec qui que ce soit d'autre.</i></div>
                         </div>
                         <div class="row">
                             <div class="col">
                                 <div class="mb-3">
                                     <div class="form__element__label"><label for="id_password" style="color: white;">Mot de passe</label></div>
                                     <input type="password" class="form-control mb-2" id="exampleInputPassword1" placeholder="Mot de passe">
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col">
                         <label for=adresse>Adresse</label>
                         <textarea id=adresse name=adresse rows=1 required class="form-control" placeholder="Votre adresse"></textarea>
                     </div>
                     <div class="col">
                         <label for=codepostal>Code postal</label>
                         <input id=codepostal name=codepostal type=text required class="form-control mb-5" placeholder="&#8230;">
                     </div>
                 </div>
             </div>


         </div>
     </div>
     </div>
     </div>
     </div>
 </body>

 <?php
    include 'footer.php';
    ?>