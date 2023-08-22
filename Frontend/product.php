<?php
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="css/productstyle.css">
</head>

<body>
    <main>
        <?php
        $item = array();
        $sql = "SELECT * FROM product order by `name`";
        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                $i = 1;

                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div id='product'>
                        <img src="../admin/image/<?php echo $row['image']; ?>" height="330px" width="400px" id="primg" alt="#">
                        <p id="name_bold"><?php echo $row['name']; ?></p>
                        <p id="name"> Available quantity: <?php echo $row['quantity']; ?></p>
                        <p id="name"> Price: <?php echo $row['price']; ?></p>
                        <a class="buton_view" href="prod_detail.php?id=<?php echo $row['id']; ?>">Order now</a><br>
                        <?php
                        $item = array(
                            "item_id" => $row["id"],
                            "item_name" => $row["name"],
                            "quantity" => intval($row["quantity"]),
                            "price" => floatval($row["price"]),
                            "description" => $row["description"]
                        );
                        $items[] = $item;
                        ?>
                    </div>
                    </a><?php

                        $i += 1;
                    }
                    // Free result set
                    mysqli_free_result($result);
                } else {
                    echo "No records found";
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
            // Close connection
            mysqli_close($conn);
            // print_r($items);
                        ?>
    </main>
</body>
<?php
foreach ($items as $item) {
?>
    <!-- Place the gtag code snippet inside the loop -->
    <script>
        gtag('event', 'view_item', {
            currency: 'USD',
            value: <?php echo $item['price']; ?>,
            items: [{
                item_id: '<?php echo $item['item_id']; ?>',
                item_name: '<?php echo $item['item_name']; ?>',
                quantity: <?php echo $item['quantity']; ?>,
                price: <?php echo $item['price']; ?>,
                description: <?php echo $item['description']; ?>
            }]
        });
    </script>
<?php
}
?>

</html>

<?php include 'includes/footer.php' ?>