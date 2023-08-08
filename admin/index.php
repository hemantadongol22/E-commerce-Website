<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>

    <link rel="stylesheet" href="css/adminstyle.css">
    <?php include 'navbar.php'; ?>

    <script src="js/validate.js"></script>
</head>

<body>

    <img src="profile-pic/logo-admin.png" alt="Image" width="90px" height="50px" id="image">
    <h1 id="head">Add Products</h1>

    <form action="add_prod.php" method="post" class="center"
    onsubmit="return validateForm()" enctype="multipart/form-data">
        <p>Enter Product name</p>
        <input type="text" class="cent" name="prname" id="prname">

        <br>

        <p>Enter Product price</p>
        <input type="number" class="cent" name="prpric" id="prpric">

        <br>

        <p>Enter Product quantity</p>
        <input type="number" class="cent" name="prqty" id="prqty">

        <br>

        <p>Input Product Image</p>
        <input type="file" class="cent" id="file-image" accept="image/*" name="primg" placeholder="Images"><br>

        <!-- textarea flexible to fill form -->
        <p>Enter Product Description</p>
        <div class="wrapper">
            <textarea cols="30" rows="15" name="desc" id="desc"></textarea>
        </div>
        <br>
        <input type="submit" id="submit" value="Add Product">
    </form>
    <?php include 'footer.php'; ?>

    <style>
        textarea {
            width: 100%;
            height: 70px;
        }
    </style>
</body>

</html>
