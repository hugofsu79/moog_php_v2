

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
        <div class="container-fluid pb-3">
            <div class="row text-center">
                <img id="watchPhoto" src="images/watchturquoise.jpg" style="width: 100vw">
            </div>
        </div>

        <div class="container mt-3 text-center">
            <h3>Détails commande <?php echo $_POST['orderNumber'] ?></h3>
        </div>

        <div class="container-fluid p-5">

            <div class="row text-center mb-5 justify-content-center">
                </b> - montant total : <b><?php echo $_POST['orderTotal'] ?> €</b></h4>
            </div>
            <div class="row text-center justify-content-center">
                <?php displayOrderArticles(getOrderArticles($_POST['orderId'])); ?>
            </div>
        </div>

        <div class="container text-center">
            <a href="account.php">
                <button class="btn btn-dark">Retour au compte</button>
            </a>
        </div>
    </main>


    <?php
    include('./footer.php');
    ?>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>