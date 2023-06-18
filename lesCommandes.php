<?php
// inclure le fichier des fonctions pour pouvoir les appeler ici
include 'function.php';

session_start();

// Pour initialiser le panier 
createCart();
// var_dump($_SESSION);

//J'inclus le head avec les balises de base + la balise head(pour ne pas répeter le code qu'il contient)
include 'head.php';
?>

<body>
    <header>
        <?php
        include('header.php');

        if (isset($_POST['livraison'])) {
            $_SESSION['displayedOrderDelivery'] = $_POST['livraison'];
        }
        ?>
    </header>


    <main>

        <div class="container mt-3 text-center">
            <h3>Détails commande <?php echo $_POST['orderNumber'] ?></h3>
        </div>

        <div class="container-fluid p-5">

            <div class="row text-center mb-5 justify-content-center">
                <h5>Date et heure : <b><?php
                                        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                                        echo utf8_encode(strftime("%A %d %B %Y - %r", strtotime($_POST['orderDate'])));
                                        ?>
                    </b> - montant total : <b><?php echo $_POST['orderTotal'] ?> €</b></h4>
            </div>
            <div class="row text-center justify-content-center">
                <?php displayOrderArticles(getOrderArticles($_POST['orderId'])); ?>
            </div>
        </div>
    </main>


</body>

<?php
include 'footer.php';
?>