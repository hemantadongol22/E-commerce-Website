<?php
include 'navbar.php';

function uploadImage($tempname, $folder)
{
    move_uploaded_file($tempname, $folder);
}

function insertProduct($conn, $pname, $image, $qty, $pprice, $desc)
{
    $sql = "INSERT INTO product values(NULL, '$pname', '$image','$qty', '$pprice', '$desc')";
    mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method

    $image = $_FILES["primg"]["name"];
    $tempname = $_FILES["primg"]["tmp_name"];
    $folder = "./image/" . $image;

    $pname = $_POST['prname'];
    $pprice = $_POST['prpric'];
    $qty = $_POST['prqty'];

    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $unescapedString = stripcslashes($desc);
    $description = str_replace('\r\n', PHP_EOL, $unescapedString);
    
    move_uploaded_file($tempname, $folder);
    $sql = "INSERT INTO product values(NULL, '$pname', '$image','$qty', '$pprice', '$description')";
    mysqli_query($conn, $sql);

    header('location:products.php');
}
