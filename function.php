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

    if (strlen($_POST['prenom']) > 25 || strlen($_POST['prenom']) < 3) {
        $inputsLenghtOk = false;
    }

    if (strlen($_POST['nom']) > 25 || strlen($_POST['nom']) < 3) {
        $inputsLenghtOk = false;
    }

    if (strlen($_POST['email']) > 25 || strlen($_POST['email']) < 5) {
        $inputsLenghtOk = false;
    }

    if (strlen($_POST['adresse']) > 40 || strlen($_POST['adresse']) < 5) {
        $inputsLenghtOk = false;
    }

    if (strlen($_POST['code_postal']) !== 5) {
        $inputsLenghtOk = false;
    }

    if (strlen($_POST['ville']) > 25 || strlen($_POST['ville']) < 3) {
        $inputsLenghtOk = false;
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

// function inscription()
// {
//     $db = getConnection();
//     if (checkEmptyFields() == true) {
//         echo "Attention un ou plusieurs champs vides";
//     } else {

//         if (checkInputsLenght() == false) {
//             echo "Attention longueur incorrect d'un ou plusieurs champs";
//         } else {

//             if (emailExist() == true) {
//                 echo "Attention email déjà utilisé";
//             } else {

//                 if (checkPassword(strip_tags($_POST["mot_de_passe"])) == false) { //verif si le mdp est correct
//                     echo "Mot de passe pas sécurisé";
//                 } else {

//                     ///!\   hachage du mot de passe -> on le stock dans une variabe      //!\
//                     $hashedPassword = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT); //   https://www.php.net/manual/en/function.password-hash
//                     $nom = $_POST['nom'];
//                     $prenom = $_POST['prenom'];
//                     $email = $_POST['email'];
//                     $mot_de_passe = $_POST['mot_de_passe'];
//                     // je prépare ma requete: INSERT INTO "ma table" (le nom exact des champs de ma table)VALUE ()
//                     // $query = $db->prepare("INSER INTO clients (nom, prenom, email, mot_de_passe) VALUES(?,?,?,?)");
//                     // $query->execute([$nom, $prenom, $email, $mot_de_passe]);

//                     //2ème Syntaxe: tableau associatif
//                     $query = $db->prepare('insert into clients(nom, prenom, email, mot_de_passe');
//                     $query->execute([
//                         'nom' => $nom,
//                         'prenom' => $prenom,
//                         'email' => $email,
//                         'mot_de_passe' => $mot_de_passe,
//                     ]);


//                     //Adresse

//                     //une autre fonction possible 

//                     $id = $db->lastInsertId();


//                     creatAddress($id);
//                     //On renvoie un message de succès 
//                     echo '<script>alert(\'le compte a bien été créé ! \')</script>';
//                 }
//             }
//         }

        //Créer une nouvelle adresse

        function creatAddress($user_id)
        {
            $db = getConnection();

            $query = $db->prepare('INSERT INTO adresses (id_client, adresse, code_postal, ville) VALUES(:id_client, :adresse, :code_postal, :ville)');
            $query->execute(array(
                'id_client' => $user_id,
                'adresse' => strip_tags($_POST['addresse']),
                'code_postal' => strip_tags($_POST['code_postal']),
                'ville' => strip_tags($_POST['ville']),

            ));}

//******************     Informations de connexion à la base de données     *************************
    function connexion(){
        $servername = "localhost";
        $nom_utilisateur = "nom_utilisateur";
        $motDePasse = "mot_de_passe";
        $dbname = "nom_base_de_donnees";

        // Création de la connexion
        $db = new mysqli($servername, $mot_de_passe, $dbname);

        // Vérification de la connexion
        if ($connexion->connect_error) {
            die("Erreur de connexion à la base de données : " . $connexion->connect_error);
        }

        // Données de l'utilisateur à sauvegarder
        $nom = "John Doe";
        $email = "john.doe@example.com";
        $motDePasse = "MonMotDePasse123";

        // Requête SQL pour insérer l'utilisateur dans la table
        $sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES ('$nom', '$email', '$motDePasse')";

        // Exécution de la requête
        if ($db->query($sql) === TRUE) {
            echo "Utilisateur sauvegardé avec succès";
        } else {
            echo "Erreur lors de la sauvegarde de l'utilisateur : " . $db->error;
        }

        // 8) Fermeture de la requête et de la connexion
        $requete->close();
        $connexion->close();

        // récupération de son id : $id = $db->lastInsertId();
        $id = $db->lastInsertId();

        $query = "INSERT INTO utilisateurs (nom, email) VALUES ('John Doe', 'john.doe@example.com')";
            // $db->($query)
        ;
        // Récupération de l'ID généré pour l'insertion précédente
        $id = $db->lastInsertId();

        // Affichage de l'ID
        echo "L'ID généré est : " . $id;
    }

//******************     Je crée une fonction de connection     *************************

function createConnection(){


    // je connecte à la base

$db = getConnection();


//je recupere le client si il existe

$client = emailExist();
if($client == true){
    if (password_verify($_POST["mot_de_passe"], $client ["mot_de_passe"])){
        $_SESSION['client'] = $client;
        echo "vous êtes connecté !";
    }
    else {
        echo "votre mot de passe est incorrect";
        }
    }
    else {
    echo "vous n'avez pas de compte";
    }
}


// ***************** Créer un utilisateur *************

function createUser()
{
    //je me connecte à la bdd
    $db = getConnection();

    // je vérifie que les champs ne sont pas vides 
    if (checkEmptyFields()) {

        // je vérifie la longueur des champs 
        if (checkInputsLenght() == true) {

            // je vérifie si l'email existe déjà
            if (emailExist() == false) {

                // je vérifie si le mot de passe est suffisamment sécurisé grâce à la regex et je le hache avec password_hash()
                if (checkPassword($_POST['mot_de_passe'])) {
                    $password = password_hash(strip_tags($_POST['mot_de_passe']), PASSWORD_DEFAULT);

                    // je prépare ma requette d'insertion
                    $query = $db->prepare("INSERT INTO clients(nom,prenom,email, mot_de_passe)
                VALUES (:nom,:prenom,:email,:mot_de_passe)");

                    // j'execute ma requete
                    $query->execute([
                        'nom' => strip_tags($_POST['nom']),
                        'prenom' => strip_tags($_POST['prenom']),
                        'email' => strip_tags($_POST['email']),
                        'mot_de_passe' => strip_tags($password),
                    ]);
                    // récupération de l'id de l'utilisateur crée avec :  $id = $db->lastInsertId(); (fonction native php) 
                    $id = $db->lastInsertId();

                    // insertion de son adresse dans la table adresses
                    creatAddress($id);

                    // On renvoie un message de succès
                    echo '<script>alert Le compte a bien été créé </script>';
                } else {
                    echo "Mot de passe non sécurisé";
                }
            } else {
                echo "Votre email existe déjà";
            }
        } else {
            echo "la longueur des champs n'est pas valide";
        }
    } else {
        echo "Des champs ne sont pas remplis";
    }
}



?>