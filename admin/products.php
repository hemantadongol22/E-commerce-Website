<?php
include 'navbar.php';
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <!-- Remember to include jQuery :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    <title>Products List</title>
</head>

<body>
    <?php
    const td_end = "</td>";

    $sql = "SELECT * FROM product order by `name`";
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo '<table class="table table-striped table-bordered">';
            echo "<tr>";
            echo "<th scope='col'>ID</th>";
            echo "<th scope='col'>Product Name</th>";
            echo "<th scope='col'>Image</th>";
            echo "<th scope='col'>Quantity</th>";
            echo "<th scope='col'>Price</th>";
            echo "<th scope='col'>Options</th>";
            echo "</tr>";
            $i = 1;

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $i . td_end;

                echo "<td>" . $row['name'] . td_end;
                echo '<td>';
                echo '<img src="./image/' . $row['image'] . '" height="300px" width="330px">';
                echo td_end;

                echo "<td>" . $row['quantity'] . td_end;
                echo "<td>" . $row['price'] . td_end;


                echo "<td>";
                $i += 1;
    ?>

                <div class="btn-group">
                    <button type="button" class="btn btn-danger">Action</button>
                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></li>
                        <li><a class="dropdown-item" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></li>
                    </ul>
                </div>



    <?php
                echo td_end;
                echo "</tr>";
            }
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else {
            echo "No records found";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    }
    // Close connection
    mysqli_close($conn);
    ?>
    <!-- Normal link -->
    <?php include 'footer.php'; ?>
</body>

</html>
