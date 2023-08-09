<?php
include 'includes/header.php';

$id = $_REQUEST['id'];
$query = "SELECT * FROM product WHERE id='" . $id . "'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($result);

//Do not delete cookies below
setcookie("amp_6e403e", "", time() - 3600, "/");
ob_start();

function formatDescription($description)
{
    $unescapedString = stripcslashes($description);
    $formattedString = str_replace('\r\n', PHP_EOL, $unescapedString);
    return nl2br($formattedString);
}

function getAvailabilityText($quantity)
{
    if ($quantity == 0) {
        return "<p class='text-danger'>Out of stock</p>";
    } elseif ($quantity <= 10) {
        return '<p class="text-danger">Limited stock</p>';
    } else {
        return "<p class='text-success'>Available</p>";
    }
}

function cookieCheck($productId)
{
    $arrRec = [];
    if (isset($_COOKIE['recently_viewed']) && !empty($_COOKIE['recently_viewed'])) {
        $arrRec = unserialize($_COOKIE['recently_viewed']);

        // Add an additional check to ensure that $arrRec is always an array
        if (!is_array($arrRec)) {
            $arrRec = [];
        }
    }
    if (!in_array($productId, $arrRec)) {
        $arrRec[] = $productId;
    } else {
        $key = array_search($productId, $arrRec);
        print_r($key);
        $before = array_slice($arrRec, 0, $key);
        $after = array_slice($arrRec, $key + 1);
        $newArr = array_merge(array($productId), $before, $after);
        $arrRec = $newArr;
    }
    setCookie('recently_viewed', serialize($arrRec), time() + 60 * 60);
}

$productId = $row['id'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $row['name']; ?>
    </title>
    <link rel="stylesheet" href="css/prod_detailstyle.css">
    <script src="js/prod_detailstyle.js"></script>
</head>

<body style="min-height:100vh; display:flex; flex-direction:column;">
    <br>
    <div>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="shadow">
                        <img src="../admin/image/<?php echo $row['image']; ?>" class="w-100" alt="#">
                    </div>
                </div>
                <div class="col-md-8">
                    <input type="text" value="<?php echo $row['id']; ?>" style="display:none;" id="ident">
                    <h4 class="fw-bold"><?php echo $row['name']; ?></h4>
                    <hr>

                    <b>Description</b>
                    <p style="text-align: justify;"><?php echo formatDescription($row['description']); ?></p>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" value="<?php echo $row['id']; ?>" style="display:none;">
                            <p><b>Price: </b><?php echo 'NPR. ' . $row['price']; ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div style="display: flex;">
                                <p><b>Availability:&nbsp</b></p>
                                <?php echo getAvailabilityText($row['quantity']); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p><b>Quantity</b></p>
                            <div class="form-outline">
                                <input class="form-control" type="number" min="1" value="1" id="qty" max=<?php echo $row['quantity']; ?>>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <input id="buton_view" onclick="addToCart('<?php echo htmlspecialchars($row['id'], ENT_QUOTES); ?>', '<?php echo htmlspecialchars($row['name'], ENT_QUOTES); ?>', '<?php echo htmlspecialchars($row['price'], ENT_QUOTES); ?>')" type="submit" name="add_to_cart" value="Add to Cart">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <marquee>
            Get your <?php echo $row['name']; ?> today! Order now!
            <i class="fa-solid fa-tags" style="color: #000000;"></i>
        </marquee>
    </div>

</body>
<?php
cookieCheck($productId);
include 'includes/footer.php';
ob_end_flush();
?>
<script>
    function addToCart(productId, productName, productPrice) {

        prod = parseInt(productId);
        price = parseInt(productPrice); // Sanitize the input to prevent SQL injection

        console.log(price);
        // Create a JSON object representing the product details
        var productDetails = {
            id: prod,
            name: productName,
            price: price,
            quantity: document.getElementById('qty').value
        };
        // Convert the JSON object to a string
        var productDetailsString = JSON.stringify(productDetails);

        // Store the product details in a cookie
        document.cookie = "cartData=" + encodeURIComponent(productDetailsString) + "; path=/";
        // Show a confirmation message (optional)
        alert('Product has been added to the cart');
    }
</script>

</html>