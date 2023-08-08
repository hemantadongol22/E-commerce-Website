<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (file_exists('includes/header.php')) {
    include 'includes/header.php';
}
ob_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="./css/cart.css">
</head>

<?php
// Function to add product to the cart (you can implement other cart operations as well)
function addToCart($productDetails)
{
    // Check if the cart exists in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Check if the product already exists in the cart
    foreach ($_SESSION['cart'] as &$cartItem) {
        if ($cartItem['id'] === $productDetails['id']) {
            // If the product exists, update the quantity
            $cartItem['quantity'] += $productDetails['quantity'];
            return; // Exit the function
        }
    }

    // If the product is not found in the cart, add it
    $_SESSION['cart'][] = $productDetails;
}

// Check if the cookie exists and has cart data
if (isset($_COOKIE['cartData'])) {
    $cartData = json_decode($_COOKIE['cartData'], true); // Decode the JSON string to an associative array
    addToCart($cartData);

    // Remove the cartData cookie after it's been processed
    setcookie('cartData', '', time() - 3600, "/");
}


// Function to calculate the total cart price
function calculateTotalPrice()
{
    $totalPrice = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product) {
            $totalPrice += $product['price'] * $product['quantity'];
        }
    }
    return $totalPrice;
}

const tab = "<td></td>";
?>

<body>
    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
        <div class="container-fluid">
            <div class="row">
                <div class="card col-md-12 mt-3">
                    <div class="card-body">
                        <table class="table table-hover">
                            <caption></caption>
                            <thead>
                                <tr>
                                    <th class="text-center">S.N.</th>
                                    <th class="text-center">Product Image</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total Price</th>
                                    <th scope='col'>Options</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ($_SESSION['cart'] as $product) {
                                    $id = $product['id'];
                                    $ret = mysqli_query($conn, "select * from `product` where id='$id'");
                                    $row = mysqli_fetch_array($ret);
                                ?>
                                    <tr>
                                        <td>
                                            <center>
                                                <?php echo $i++ ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <img id="imageDesign" src="../admin/image/<?php echo $row['image']; ?>" alt="#">
                                            </center>

                                        </td>
                                        <td>
                                            <center>
                                                <?php echo $product['name']; ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php echo $product['price']; ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php echo $product['quantity']; ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php echo $product['price'] * $product['quantity']; ?>
                                            </center>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger">Action</button>
                                                <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span class="visually-hidden">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <?php
                                    echo tab;
                                    echo tab;
                                    echo tab;
                                    echo tab;
                                    ?>
                                    <td>
                                        <center>
                                            <?php echo calculateTotalPrice(); ?>
                                        </center>
                                    </td>
                                    <?php echo tab; ?>
                                </tr>
                        </table>
                        <a href="checkout.php">Proceed to Checkout</a>
                    <?php } else { ?>
                        <p>Your cart is empty.</p>
                    <?php } ?>

                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include 'includes/footer.php';
        ob_end_flush();
        ?>
</body>

</html>