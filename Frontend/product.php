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
        $sql = "SELECT * FROM product order by `name`";
        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                $i = 1;

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div id='product'>";
                    echo '<img src="../admin/image/' . $row['image'] . '" height="330px" width="400px" id="primg">';
                    echo '<p id="name_bold">' . $row['name'] . '</p>';
                    echo '<p id="name"> Available quantity: ' . $row['quantity'] . '</p>';
                    echo '<p id="name"> Price: ' . $row['price'] . '</p>';
                    echo '<a class="buton_view" href="prod_detail.php?id=' . $row['id'] . '">Order now</a><br>';

                    echo "</div>";
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
        ?>
    </main>
</body>

</html>

<?php include 'includes/footer.php' ?>
