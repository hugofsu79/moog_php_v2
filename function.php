<?php

// ***************Renvoyer un tableau d'articles*************** //

function getArticles()
{
    return [
        // 1ère article
        [
            'name' => 'Minimoog Model D Serial',
            'id' => 1,
            'price' => 5999.00,
            'description' => 'Son authentique qui lie futur et passé.',
            'detailedDescription' => 'Cette réédition présente le même moteur sonore et le même cheminement du signal que le Model D des années 1970.',
            'picture' => 'minimoog_model_d.png'
        ],

        // 2ème article
        [
            'name' => 'Etherwave Theremin',
            'id' => 2,
            'price' => 799.00,
            'description' => 'Manipulez le son sans toucher l\'instrument.',
            'detailedDescription' => 'La simplicité élégante et l\'expressivité inégalée du thérémine ont alimenté l\'amour de Bob Moog pour cet instrument tout au long de sa vie, depuis la construction de son premier thérémine à l\'âge de 14 ans jusqu\'à la réalisation de sa dernière conception de thérémine à l\'âge de 70 ans. Aujourd\'hui, l\'Etherwave Theremin perpétue cet héritage avec un design optimisé pour le musicien de thérémine moderne.',
            'picture' => 'theremin.jpeg'
        ],

        // 3ème article
        [
            'name' => 'Matriarch dark',
            'id' => 3,
            'price' => 1999.00,
            'description' => 'Le summum de la famille semi-modulaire de synthétiseurs.',
            'detailedDescription' => 'Matriarch est un synthétiseur analogique axé sur l\'imagination. Le summum de la famille semi-modulaire de synthétiseurs de Moog, l\'architecture patchable de Matriarch et les circuits Moog vintage offrent une exploration ouverte aux possibilités sonores infinies et à un son analogique inégalé.',
            'picture' => 'matriarch_dark.jpeg'
        ],
        // 3ème article
        [
            'name' => 'Model 10',
            'id' => 4,
            'price' => 13999.00,
            'description' => 'Il permet de créer et contrôler entièrement le son à partir de zéro.',
            'detailedDescription' => 'La nouvelle machine pourrait décomposer les éléments fondamentaux du son, offrant à l\'opérateur la capacité de contrôler chaque aspect de sa sortie - essentiellement construire le son à partir de zéro.',
            'picture' => 'model_10_black-1.jpeg'
        ],
    ];
}

// *************** Recupérer le produit qui correspond à l'id fourni en paramètre *************** //

function getArticleFromId($id)
{

    // Récuperer la liste des articles
    $articles = getArticles();

    // Aller chercher dedans l'article qui comporte l'id en paramètre
    foreach ($articles as $article) {
        if ($article['id'] == $id) {
            // Le renvoyer avec return
            return $article;
        }
    }
}

// *************** Initialiser le panier *************** //

function createCart()
{
    if (isset($_SESSION['panier']) == false) {
        $_SESSION['panier'] = [];
    }
}

function addToCart($article){
    array_push($_SESSION['panier'], $article);
}