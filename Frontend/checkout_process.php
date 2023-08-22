<?php
session_start();
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $billingAddress = $_POST['bill_add'];
    $shippingAddress = $_POST['ship_add'];
    $email = $_POST['email'];
    $item = array();

    date_default_timezone_set('Asia/Kathmandu');
    $ldateFormatted = date('Y-m-d H:i:s');

    $orderId = time();

    // Insert into billing_details table
    $billingInsertQuery = "INSERT INTO billing (address, oid) VALUES ('$billingAddress','$orderId')";
    if ($conn->query($billingInsertQuery) !== true) {
        echo 'Failed to insert billing details';
    }

    // Insert into shipping_details table
    $shippingInsertQuery = "INSERT INTO shipping (address, oid) VALUES ('$shippingAddress','$orderId')";
    if ($conn->query($shippingInsertQuery) !== true) {
        echo 'Failed to insert shipping details';
    }

    // Insert into final_order table
    $finalOrderInsertQuery = "INSERT INTO final_order (oid, billing_id, shipping_id, email) VALUES ('$orderId', LAST_INSERT_ID(), LAST_INSERT_ID(), '$email')";
    if ($conn->query($finalOrderInsertQuery) !== true) {
        echo 'Failed to insert final order';
    }

    // Insert into ordered_products table (loop through each product)
    foreach ($_SESSION['cart'] as $productId => $cartItem) {
        $quantity = $cartItem['quantity'];
        $price = $cartItem['price'];
        $totalprice = $quantity * $price;

        $orderedProductInsertQuery = "INSERT INTO ordered_product (oid, pid, qty, price, order_date) VALUES ('$orderId', '$productId', '$quantity', '$totalprice', '$ldateFormatted')";
        if ($conn->query($orderedProductInsertQuery) !== true) {
            echo 'Failed to insert ordered product';
        }

        $item = array(
            "item_id" => $cartItem['id'],
            "item_name" => $cartItem['name'],
            "price" => floatval($cartItem['price']),
            "quantity" => intval($cartItem['quantity'])
        );
        $items[] = $item;
    }

    unset($_SESSION['cart']);
    header('location:order_details.php');

    foreach ($items as $item) {
?>
        <!-- Place the gtag code snippet inside the loop -->
        <script>
            gtag('event', 'checkout_begin', {
                currency: 'USD',
                value: <?php echo $item['price']; ?>,
                items: [{
                    item_id: '<?php echo $item['item_id']; ?>',
                    item_name: '<?php echo $item['item_name']; ?>',
                    quantity: <?php echo $item['quantity']; ?>,
                    price: <?php echo $item['price']; ?>,
                    billadd: $billingAddress,
                    shipadd: $shippingAddress
                }]
            });
        </script>
<?php
    }
}
