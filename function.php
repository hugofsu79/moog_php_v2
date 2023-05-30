<?php

// ***************Renvoyer un tableau d'articles*************** //

function getArticles(){
    return [
        // 1ère article
        [
        'name' => 'Minimoog Model D Serial',
        'id' => 1,
        'price' => 5999.00,
        'description' => 'Authentique sound',
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
        'description' => 'Le summum de la famille semi-modulaire de synthétiseurs analogiques de Moog.',
        'detailedDescription' => 'Matriarch est un synthétiseur analogique axé sur l\'imagination. Le summum de la famille semi-modulaire de synthétiseurs de Moog, l\'architecture patchable de Matriarch et les circuits Moog vintage offrent une exploration ouverte aux possibilités sonores infinies et à un son analogique inégalé.',
        'picture' => 'matriarch_dark.jpeg'
    ],
    ];
}

?>

