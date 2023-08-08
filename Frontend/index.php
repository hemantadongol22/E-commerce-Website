<?php
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HD Products</title>

    <link rel="stylesheet" href="css/indexstyle.css">
    <link rel="stylesheet" href="css/recent_view.css">
    <style>
        h3#recent {
            text-align: center;
            background-color: rgb(33, 37, 41);
            color: white;
            padding-top: 3vh;
            padding-bottom: 3vh;
        }

    </style>
</head>

<body>
    <?php
    // Assuming you have a valid database connection in $conn

    $sql = "SELECT * FROM product";
    $active = true;

    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="carousel" style="display: flex; align-items: center; justify-content: center;">';
            echo '<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" style="width: 100%;">';
            echo '<div class="carousel-inner">';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="carousel-item';
                if ($active) {
                    echo ' active';
                    $active = false;
                }
                echo '"data-bs-interval="5000">';

                // Display image on the left side
                echo '<div style="display: flex; align-items: center; justify-content: center; background-color:black;">';
                echo '<img src="../admin/image/' . $row['image'] . '" class="d-block w-50" alt="...">';

                // Display description on the right side
                echo '<div class="p-3 w-50" style="background-color:black;">';
                echo '<h3 style="color:white;">' . $row['name'] . '</h3>';
                $desc = $row['description'];
                $unescapedString = stripcslashes($desc);
                $description = nl2br(str_replace('\r\n', PHP_EOL, $unescapedString));

                echo '<p style="text-align:justify; color:white;">' . $description . '</p>';
                echo '</div>';
                echo '</div>'; // Close the flex container

                echo '</div>';
            }

            echo '</div>';
            echo '<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">';
            echo '<span class="carousel-control-prev-icon visually-hidden" aria-hidden="true"></span>';
            echo '<span class="visually-hidden">Previous</span>';
            echo '</button>';
            echo '<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">';
            echo '<span class="carousel-control-next-icon visually-hidden" aria-hidden="true"></span>';
            echo '<span class="visually-hidden">Next</span>';
            echo '</button>';
            echo '</div>';
            echo '</div>';

            // Free result set
            mysqli_free_result($result);
        } else {
            echo "No records found";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    ?>

    <h3 id="recent">Recents</h3>
    <main>

        <?php

        if (isset($_COOKIE['recently_viewed'])) {
            $arrRecentView = unserialize($_COOKIE['recently_viewed']);
            // Count the number of recently viewed items
            $countRecentView = count($arrRecentView);

            // If there are more than 4 recently viewed items, slice the array to only keep the last 4 items

            $arrRecentView = array_slice($arrRecentView, 0, 4);

            // Create a comma-separated string of the recently viewed item IDs
            $recentViewId = array_reverse($arrRecentView);
            $recentViewId = implode(",", $arrRecentView);

            // Fetch the product details for the recently viewed items from the database
            // ORDER BY FIELD(id, $recentViewId):
            // This part specifies the order in which the selected rows should be sorted.
            // It uses the "FIELD" function to sort the rows based on the order of the ids in
            // the "$recentViewId" variable.

            $res = mysqli_query($conn, "SELECT * FROM product WHERE id IN ($recentViewId)
            ORDER BY FIELD(id, $recentViewId)");

            while ($row = mysqli_fetch_assoc($res)) {
                echo "<div id='product'>";
                echo '<img src="../admin/image/' . $row['image'] . '" height="330px" width="330px" id="primg">';
                echo '<p id="name_bold">' . $row['name'] . '</p>';
                echo '<p id="name"> Available quantity: ' . $row['quantity'] . '</p>';
                echo '<p id="name"> Price: ' . $row['price'] . '</p>';
                echo '<a class="buton_view" href="prod_detail.php?id=' . $row['id'] . '">Order now</a><br>';
                echo "</div>";
            }
        } else {
            echo "No recent items";
        }
        ?>
    </main>
</body>
<?php
include 'includes/footer.php'
?>

</html>

