<?php
include 'navbar.php';
$id = $_REQUEST['id'];
$query = "SELECT * from product where id='" . $id . "'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>

    <link rel="stylesheet" href="css/adminstyle.css">
    <script src="js/validate.js"></script>
</head>

<body>
    <br>
    <a href="products.php" id="backarrow"><i class="fa-solid fa-circle-arrow-left fa-xl"></i></a>

    <h1 id="head">Edit Products&nbsp<i class="fa-sharp fa-solid fa-pen-to-square"></i></h1>

    <form action="editAction.php" method="POST" class="center" onsubmit="return validateForm()" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <p>Enter Product name</p>
        <input type="text" class="cent" name="prname" id="prname" value="<?php echo $row['name']; ?>">

        <br>

        <p>Enter Product price</p>
        <input type="number" class="cent" name="prpric" id="prpric" value="<?php echo $row['price']; ?>">

        <br>

        <p>Enter Product quantity</p>
        <input type="number" class="cent" name="prqty" id="prqty" value="<?php echo $row['quantity']; ?>">

        <br>
        <!-- Code to make <br> tags appear in text -->
        <?php
        $stored_text = $row['description'];
        $unescapedString = stripcslashes($stored_text);
        $formattedString = str_replace('\r\n', PHP_EOL, $unescapedString);
        $formatted_text = nl2br(htmlspecialchars($formattedString));
        ?>
        <p>Input Product Image</p>
        <input type="file" class="cent" id="file-image" accept="image/*" name="upimg" placeholder="Images" value="<?php echo $row['image']; ?>">
        <br>

        <p>Enter Product Description</p>
        <div class="wrapper">
            <textarea cols="30" rows="15" name="desc" id="desc"><?php echo strip_tags($formatted_text); ?></textarea>
        </div>
        <br>
        <input type="submit" id="submit" value="Edit Product" name="Update">
    </form>

    <?php include 'footer.php' ?>
    <style>
        textarea {
            width: 100%;
            height: 70px;
        }
    </style>
</body>

</html>
