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
        // 4ème article
        [
            'name' => 'Model 10',
            'id' => 4,
            'price' => 13999.00,
            'description' => 'Il permet de créer et contrôler entièrement le son à partir de zéro.',
            'detailedDescription' => 'La nouvelle machine pourrait décomposer les éléments fondamentaux du son, offrant à l\'opérateur la capacité de contrôler chaque aspect de sa sortie - essentiellement construire le son à partir de zéro.',
            'picture' => 'model_10_black-1.jpeg'
        ],
        // 5ème article        
        [
            'name' => 'Mother-32',
            'id' => 5,
            'price' => 703.00,
            'description' => 'Son moteur sonore est basé sur la synthèse soustractive.',
            'detailedDescription' => 'Le synthétiseur Moog Mother-32 est sorti en 2015. Il s\'agit d\'un synthétiseur analogique monophonique. Le Mother-32 possède 1 oscillateur, 1 enveloppe, 1 lfo.',
            'picture' => 'moog-mother-32_2.jpeg'
        ],
        // 6ème article       
        [
            'name' => 'Moog One',
            'id' => 6,
            'price' => 10899.00,
            'description' => 'l\'ultime synthétiseur Moog, tri-timbral, polyphonique et analogique, source infinie d\'inspiration sonore.',
            'detailedDescription' => 'Moog One est l\'ultime synthétiseur Moog - un synthétiseur analogique, tri-timbral et polyphonique, conçu pour inspirer l\'imagination, stimuler la créativité et ouvrir des portails vers de vastes nouveaux univers de possibilités sonores',
            'picture' => 'moogone.jpeg'
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

function addToCart($article)
{

    //on attribue une quantité de 1 (par défaut) à l'article 
    $article['quantite'] = 1;
    //$i = index de la boucle
    //$i< count ($_SESSION['panier']) = condition de maintien de a boucle (évaluée AVANT chaque tour)
    //(Si condition vraie => on lance la boucle)
    //je vérifie si l'article n'est pasdéjà présent
    for ($i = 0; $i < count($_SESSION['panier']); $i++) {

        // si présent => quantité +1
        if ($_SESSION['panier'][$i]['id'] == $article['id']){

            // $articlePanier['quantite'] = $articlePanier['quantite'] + 1; //pire technique niveau opti
            // $articlePanier['quantite'] += 1; //meilleure méthode mais peut mieux faire
            $_SESSION['panier'][$i]['quantite']++;
            
            return; // permet de sortir de la fonction
        }
    }

    //si pas présent =>  ajout classique via array_push


    array_push($_SESSION['panier'], $article);
}
