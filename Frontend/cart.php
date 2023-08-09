<?php
session_start();
include 'includes/header.php';
include 'cart_functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="stylesheet" href="./css/modal_checkout.css">
</head>

<body>
    <?php print_r($_SESSION) ?>
    <div class="container-fluid">
        <div class="row">
            <div class="card col-md-12 ">
                <div class="card-body">
                    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
                        <?php renderCartTable(); ?>
                        <button id="checkout_button" onclick="openModal()">Checkout</button>
                    <?php } else { ?>
                        <div id='fill'>
                            <h2 class="text-danger">Cart is empty.</h2>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <h5 class="modal-title">Edit products</h5>
            <span class="close">&times;</span>
            <!-- AJAX content will be displayed here -->
        </div>
    </div>

    <?php
    include 'includes/footer.php';
    ob_end_flush();
    ?>

    <script src="./js/cart_scripts.js"></script>
</body>

</html>