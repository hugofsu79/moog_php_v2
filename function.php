<?php




// ************************connexion à la base de données//

function getConnection()
{
    //try : je tente une connexion//
    try {
        $db = new PDO(
            'mysql:host=localhost;dbname=boutique_en_ligne;charset=utf8', //<-info : sgbd, nom base, adresse (host) +
            'hugo_fsu', // pseudo utilisateur (root en local)
            '', // mot de passe (aucun en local)
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC) //affiche les erreures
        ); //option PDO : 1) affichage erreurs /2) récupération des données simplifiée
        //Si ça ne marche pas, je mets fin au code php en affichant l'erreur
    } catch (Exception $erreur) { // Je récupère l'erreur en paramètre
        die('ERREUR : ' . $erreur->getMessage()); // Je l'affiche et je mets fin au script
    }
    // Je retourne la connexion stockée dans une variable
    return $db;
}






// *************** Renvoyer un tableau d'articles ***************


function getArticles()
{
    //Je me connecte à la base de données
    $db = getConnection();

    //J'éxécute une requête qui va récupérer tous les articles
    $results = $db->query('SELECT * FROM articles');

    //Je recupère les résultats et je les renvoie grâce à return
    return $results->fetchAll();
}




// *************** Recupérer un article à partir de son id *************** 

function getArticleFromId($id)
{
    $db = getConnection(); // Je me connect à la bdd

    // /!\ JAMAIS DE VARIABLE PHP DIRECTEMENT DANS UNE REQUETTE /!\(RISQUE D'INJECTION SQL)
    // Je mets en place une requête pr&parée

    $query = $db->prepare('SELECT * FROM Articles WHERE id = ?'); //Je prépare ma requète 
    $query->execute([$id]); // Je l'exécute avec le bon paramètre
    return $query->fetch(); // quand il y a 1 resultat possible il n'est pas obligé de faire un fetchAll, ainsi on a directemnt l'élément souhaité
}



// *************** Initialiser le panier *************** //

function createCart()
{
    if (isset($_SESSION['panier']) == false) {
        $_SESSION['panier'] = [];
    }
}

function addToCart($article)
{

    //on attribue une quantité de 1 (par défaut) à l'article 
    //$i = index de la boucle
    //$i< count ($_SESSION['panier']) = condition de maintien de a boucle (évaluée AVANT chaque tour)
    //(Si condition vraie => on lance la boucle)
    //je vérifie si l'article n'est pasdéjà présent
    for ($i = 0; $i < count($_SESSION['panier']); $i++) {

        // si présent => quantité +1
        if ($_SESSION['panier'][$i]['id'] == $article['id']) {

            // $articlePanier['quantite'] = $articlePanier['quantite'] + 1; //pire technique niveau opti
            // $articlePanier['quantite'] += 1; //meilleure méthode mais peut mieux faire
            $_SESSION['panier'][$i]['quantite']++;

            return; // permet de sortir de la fonction
        }
    }

    $article['quantite'] = 1;
    array_push($_SESSION['panier'], $article);
}
//si pas présent =>  ajout classique via array_push


//MODIFIER LA QUANTITE DU PANIER



// function montantGlobal(){
// $liste = get_allproduits();
//    $total=0;
//    foreach ($liste as $produit);
//    {
//       $total += $produit['prix'] * $produit['qt'];
//    }
//    return $total;
// }

function updateQuantity()
{
    // Je boucle sur le panier => je cherche l'article à modifier
    for ($i = 0; $i < count($_SESSION['pannier']); $i++) {

        // dès que je trouve mon article
        if ($_SESSION['panier'][$i]['id'] == $_POST['modifiedArticleId']) {

            // Je remplace son ancienne quantité par la nouvelle
            $_SESSION['panier']['$i']['quantity'] = $_POST['newQuantity'];

            // J'affiche un message de succès dans une petite fenêtre via JavaScript
            echo "<script> alert(\"Quantité modifiée\"); </script>";

            // Je sort de la fonction pour éviter de  boucler
            return;
        }
    }
}

function deleteArticle()
{
    for ($i = 0; $i < count($_SESSION['panier']); $i++) {

        // dès que je trouve mon article
        if ($_SESSION['panier'][$i]['id'] == $_POST['deleArticleId']) {

            array_splice($_SESSION['panier'], $i, 1);

            // Je sort de la fonction pour éviter de  boucler
            return;
        }
    }
}


function viderPanier()

{
    $_SESSION['panier'] = [];
}

function fraisDeLivraison()
{
    $frais = 0; // Montant des frais de livraison
    foreach ($_SESSION['panier'] as $article) {
        $frais += $article['quantite'] * 3;
    }
    return $frais;
}

function totalArticles()
{
    $total = 0;

    foreach ($_SESSION['panier'] as $article) {
        $total += $article['quantite'] * $article['prix'];
    }
    return $total;
}


function retourAlaccueil()
{
    $_SESSION['panier'] = [];
    header('Location: index.php');
    exit;
}

function getGammes()
{
    //synthétiseur modulaire 
    //Synthétiseur semi-modulaire
    //....\\\
    $db = getConnection();
    $results = $db->query('SELECT * FROM gammes');
    return $results->fetchAll();
}
function getArticlesByGamme($id)
{
    //prepare/execute
    $db = getConnection(); // Je me connect à la bdd

    // /!\ JAMAIS DE VARIABLE PHP DIRECTEMENT DANS UNE REQUETTE /!\(RISQUE D'INJECTION SQL)
    // Je mets en place une requête pr&parée

    $query = $db->prepare('SELECT * FROM articles WHERE id_gamme = ?'); //Je prépare ma requète 
    $query->execute([$id]); // Je l'exécute avec le bon paramètre
    return $query->fetchAll(); // quand il y a 1 resultat possible il n'est pas obligé de faire un fetchAll, ainsi on a directemnt l'élément souhaité
}

//************* Fonction permetant de filtrer strlen qui calcule la taille d'une chaîne *************************


function checkInputsLenght()
{
    $inputsLenghtOk = true;
    if (isset($_POST['prenom'])) {
        if (strlen($_POST['prenom']) > 25 || strlen($_POST['prenom']) < 3) {
            $inputsLenghtOk = false;
        }
    }


    if (isset($_POST['nom'])) {
        if (strlen($_POST['nom']) > 25 || strlen($_POST['nom']) < 3) {
            $inputsLenghtOk = false;
        }
    }

    if (isset($_POST['email'])) {
        if (strlen($_POST['email']) > 25 || strlen($_POST['email']) < 5) {
            $inputsLenghtOk = false;
        }
    }


    if (isset($_POST['adresse'])) {
        if (strlen($_POST['adresse']) > 40 || strlen($_POST['adresse']) < 5) {
            $inputsLenghtOk = false;
        }
    }


    if (isset($_POST['code_postal'])) {
        if (strlen($_POST['code_postal']) !== 5) {
            $inputsLenghtOk = false;
        }
    }


    if (isset($_POST['ville'])) {
        if (strlen($_POST['ville']) > 25 || strlen($_POST['ville']) < 3) {
            $inputsLenghtOk = false;
        }
    }

    return $inputsLenghtOk;
}


function emailExist()
{
    // je me connecte à la base
    $db = getConnection();

    // je prépare ma requete pour recuperer si déjà un email
    $query = $db->prepare('SELECT * FROM clients WHERE email = ?');
    $query->execute([$_POST['email']]);
    $client = $query->fetch();
    if ($client) {
        return $client;
    }
}


//*************  test mot de passe avec les regex permetant de filtrer avec les caractères injecté *************************

function checkPassword($password)
{
    // minimum 8 caractères et maximum 15, minimum 1 lettre, 1 chiffre et 1 caractère spécial
    $regex = "^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[@$!%*?/&])(?=\S+$).{8,15}$^";
    return preg_match($regex, $password);
}



//************* test email, afin de filtrer les mail's déjà *************************

function checkEmail($email)
{
    $db = getConnection();

    $query = $db->prepare("SELECT * FROM clients WHERE email = ?");
    $query->execute([$email]);

    $user = $query->fetch();

    return $user;
}



function checkEmptyFields()
{
    foreach ($_POST as $field) {
        if (empty($field)) {
            return true;
        }
    }
    return false;
}
//******************     Inscription     *************************

function inscription()
{
    $db = getConnection();
    if (checkEmptyFields() == true) {
        echo "Attention un ou plusieurs champs vides";
    } else {

        if (checkInputsLenght() == false) {
            echo "Attention longueur incorrect d'un ou plusieurs champs";
        } else {

            if (emailExist() == true) {
                echo "Attention email déjà utilisé";
            } else {

                if (checkPassword(strip_tags($_POST["mot_de_passe"])) == false) { //verif si le mdp est correct
                    echo "Mot de passe pas sécurisé";
                } else {

                    ///!\   hachage du mot de passe -> on le stock dans une variabe      //!\
                    $hashedPassword = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT); //   https://www.php.net/manual/en/function.password-hash
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $email = $_POST['email'];
                    // je prépare ma requete: INSERT INTO "ma table" (le nom exact des champs de ma table)VALUE ()
                    // $query = $db->prepare("INSER INTO clients (nom, prenom, email, mot_de_passe) VALUES(?,?,?,?)");
                    // $query->execute([$nom, $prenom, $email, $mot_de_passe]);

                    //2ème Syntaxe: tableau associatif
                    $query = $db->prepare('INSERT INTO clients(nom, prenom, email, mot_de_passe) VALUES (:nom, :prenom, :email, :mot_de_passe)');
                    $query->execute([
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'email' => $email,
                        'mot_de_passe' => $hashedPassword,
                    ]);


                    //Adresse

                    //une autre fonction possible 

                    $id = $db->lastInsertId();


                    creatAddress($id);
                    //On renvoie un message de succès 
                    echo '<script>alert(\'le compte a bien été créé ! \')</script>';
                }
            }
        }
    }
}

//Créer une nouvelle adresse

function creatAddress($user_id)
{
    $db = getConnection();

    $query = $db->prepare('INSERT INTO adresses (id_client, adresse, code_postal, ville) VALUES(:id_client, :adresse, :code_postal, :ville)');
    $query->execute(array(
        'id_client' => $user_id,
        'adresse' => strip_tags($_POST['adresse']),
        'code_postal' => strip_tags($_POST['code_postal']),
        'ville' => strip_tags($_POST['ville']),
    ));
}

//******************     Informations de connexion à la base de données     *************************

//******************     Je crée une fonction de connexion     *************************

function createConnection()
{
    //je recupere le client si il existe

    $client = emailExist();
    if ($client == true) {
        if (password_verify($_POST["mot_de_passe"], $client["mot_de_passe"])) {
            $_SESSION['client'] = $client;
            echo "vous êtes connecté !";
        } else {
            echo "votre mot de passe est incorrect";
        }
    } else {
        echo "vous n'avez pas de compte";
    }
}

function deconnection()
{
    $_SESSION["client"] = [];
    echo "<script> alert(\"Déconnecté\"); </script>";
}



//******************     Modifier Profil    *************************

function modifInfo()
{
    if (checkEmptyFields() == true) {
        echo "<script> alert(\"erreure, un ou plusieurs champs vides\"); </script>";
    } else {
        if (checkInputsLenght() == false) {
            echo "<script> alert(\"erreure,Les longueures ne sont pas bonnes\"); </script>";
        } else {
            $db = getConnection();
            $query = $db->prepare('UPDATE clients SET nom=:nom, prenom=:prenom, email=:email WHERE id=:id');
            $query->execute([
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'id' => $_SESSION['client']['id'],
            ]);
            $_SESSION['client']['nom'] = $_POST['nom'];
            $_SESSION['client']['prenom'] = $_POST['prenom'];
            $_SESSION['client']['email'] = $_POST['email'];


            echo "<script> alert(\"modification validée\")</script>";
        }
    }
}



//******************     Modifier adresse    *************************

function modifAdresse()
{
    if (checkEmptyFields() == true) {
        echo "<script> alert(\"erreure, un ou plusieurs champs vides\"); </script>";
    } else {
        if (checkInputsLenght() == false) {
            echo "<script> alert(\"erreure,Les longueures ne sont pas bonnes\"); </script>";
        } else {
            $db = getConnection();
            $query = $db->prepare('UPDATE adresses SET adresse=:adresse, code_postal=:code_postal, ville=:ville WHERE id_client=:id_client');
            $query->execute([
                'adresse' => $_POST['adresse'],
                'code_postal' => $_POST['code_postal'],
                'ville' => $_POST['ville'],
                'id_client' => $_SESSION['client']['id'],
            ]);


            $_SESSION['client']['adresse'] = $_POST['adresse'];
            $_SESSION['client']['code_postal'] = $_POST['code_postal'];
            $_SESSION['client']['ville'] = $_POST['ville'];


            echo "<script> alert(\"Adresse modifiée\")</script>";
        }
    }
}



//WHERE client_id


function updatePassword()
{
    if (checkEmptyFields() == true) {
        echo "<script> alert(\"erreure, un ou plusieurs champs vides\"); </script>";
    } else {


        if (!password_verify($_POST['oldPassword'], $_SESSION['client']['mot_de_passe'])) {
            echo "<script> alert(\"Ancien mot de passe incorrect\"); </script>";
        } else {
            if (checkPassword(strip_tags($_POST["newPassword"])) == false) { //verif si le mdp est correct
                echo "<script> alert(\"Nouveau mot de passe pas assez sécurisé\"); </script>";
            } else {

                ///!\   hachage du mot de passe -> on le stock dans une variabe      ///!\
                $hashedPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);


                $db = getConnection();


                $query = $db->prepare('UPDATE clients SET mot_de_passe = :mot_de_passe WHERE id = :id');
                $query->execute([
                    'mot_de_passe' => $hashedPassword,
                    'id' => $_SESSION['client']['id'],
                ]);
                echo "<script> alert(\"Mot de passe changé\"); </script>";
            }
        }
    }
}

// **************************************************** ADRESSES ***********************************************************


// ***************** récupérer l'adresse du client en bdd ************************

function getUserAdresses()
{
    $db = getConnection();

    $query = $db->prepare('SELECT * FROM adresses WHERE id_client = ?');
    $query->execute([$_SESSION['id']]);
    return $query->fetchAll();
}


// ***************** définir / mettre à jour l'adresse de la session ************************

function setSessionAddresses()
{
    $_SESSION['adresses'] = getUserAdresses();
}


// ***************** afficher formulaire modification adresse  ************************

function displayAddresses($currentPage)
{
    $addresses = getUserAdresses();

    foreach ($addresses as $address) {
        echo "<div class=\"container p-5 w-50 border border-dark bg-light mb-4 p-4\">
            <form action=\"" . $currentPage . "\" method=\"post\">
                <input type=\"hidden\" name=\"addressChanged\">
                <input type=\"hidden\" name=\"addressId\" value=\"" . htmlspecialchars($address['id']) . "\">
                <div class=\"form-group\">
                    <label for=\"inputAddress\">Adresse</label>
                    <input name=\"address\" type=\"text\" class=\"form-control\" id=\"inputAddress\" value=\"" . htmlspecialchars($address['adresse']) . "\" required>
                </div>
                <div class=\"form-row\">
                    <div class=\"form-group col-md-6\">
                        <label for=\"inputZip\">Code Postal</label>
                        <input name=\"zipCode\" type=\"text\" class=\"form-control\" id=\"inputZip\"  value=\"" . htmlspecialchars($address['code_postal']) . "\" required>
                    </div>
                    <div class=\"form-group col-md-6\">
                        <label for=\"inputCity\">Ville</label>
                        <input name=\"city\" type=\"text\" class=\"form-control\" id=\"inputCity\" value=\"" . htmlspecialchars($address['ville']) . "\" required>
                    </div>
                </div>
                <div class=\"row justify-content-center mt-2\">
                <button type=\"submit\" class=\"btn btn-dark\">Valider</button>
                </div>
            </form>
        </div>";
    }
}


// ***************** mettre à jour l'adresse sauvegardée  ************************

function updateAddress()
{
    $db = getConnection();

    $query = $db->prepare('UPDATE adresses SET adresse = :adresse, code_postal = :code_postal, ville = :ville WHERE id = :id');
    $query->execute(array(
        'adresse' =>  strip_tags($_POST['address']),
        'code_postal' => strip_tags($_POST['zipCode']),
        'ville' =>  strip_tags($_POST['city']),
        'id' => strip_tags($_POST['addressId'])
    ));

    echo '<script>alert(\'Nouvelle adresse validée !\')</script>';
}


// *******************  Commande    *******************************



// ***************** afficher le détail d'une commande  ************************

function displayOrderArticles($orderArticles)
{
    echo "<table class=\"table\">
    <thead>
      <tr>
        <th scope=\"col\">Article</th>
        <th scope=\"col\">Prix</th>
        <th scope=\"col\">Quantité</th>
        <th scope=\"col\">Montant</th>
      </tr>
    </thead>
    <tbody>";

    // pour calculer les frais de port fixes (3€ * nombre de montres)
    //$articlesQuantity = 0;

    foreach ($orderArticles as $article) {

        //$articlesQuantity += $article['quantite'];

        echo "<tr>
                <td>" . htmlspecialchars($article["nom"]) . "</td>
                <td>" . htmlspecialchars($article["prix"]) . " € </td>
                <td>" . htmlspecialchars($article["quantite"]) . "</td>
                <td>" . htmlspecialchars($article["prix"]) * htmlspecialchars($article["quantite"]) . " €</td>
              </tr>";
    }
}

// ***************** récupérer les articles de chaque commande  ************************

function getOrderArticles($orderId)
{
    $db = getConnection();
    $query = $db->prepare('SELECT * FROM commande_articles AS ca 
                            INNER JOIN articles AS a 
                            ON a.id = ca.id_article 
                            WHERE id_commande = ?');
    $query->execute([$orderId]);
    return $query->fetchAll();
}
