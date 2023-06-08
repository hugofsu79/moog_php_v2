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
    $db = getGammes();
}
