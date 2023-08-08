<?php
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <link rel="stylesheet" href="css/productstyle.css">
    <link rel="stylesheet" href="css/searchstyle.css">
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        $srch = $_POST['search'];
        if ($srch != null) {
            $qry = "select * from `product` where CONCAT(name) LIKE '$srch%'";
            $result = mysqli_query($conn, $qry);
            if ($result) {
                echo '<div id="srcitem">';
                echo '<p id="result" class="text-success">Search results for <i>' . $srch . '</i></p>';
                echo '</div>';
                if (mysqli_num_rows($result) > 0) {
                    $i = 1; ?>
                    <main>
        <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div id='product'>";
                        echo '<img src="../admin/image/' . $row['image'] . '" height="330px" width="330px" id="primg">';
                        echo '<p id="name_bold">' . $row['name'] . '</p>';
                        echo '<p id="name"> Available quantity: ' . $row['quantity'] . '</p>';
                        echo '<p id="name"> Price: ' . $row['price'] . '</p>';
                        echo '<a class="buton_view" href="prod_detail.php?id=' . $row['id'] . '">Order now</a><br>';
                        echo "</div>";
                        $i += 1;
                    }
                    mysqli_free_result($result);
                } else {
                    echo "<div id='fill'>";
                    echo '<h2 class=text-danger>Item not found</h2>';
                    echo '</div>';
                }
            }
        }
    } else {
        echo "ERROR: Could not able to execute sql. " . mysqli_error($connect);
    }
    mysqli_close($conn);
        ?>
                    </main>
                    <br>
</body>
<?php include 'includes/footer.php' ?>

<style>
    footer#footer {
        min-height: 17vh;
    }
</style>

</html>

