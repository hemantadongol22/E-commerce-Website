<?php
require_once './connection/conn.php';
$dbConnection = DatabaseConnection::getInstance();
$conn = $dbConnection->getConnection();
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <script src="https://kit.fontawesome.com/9c2fab3cd9.js" crossorigin="anonymous"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
     crossorigin="anonymous"></script> -->

    <!-- <script src="https://code.jquery.com/jquery-3.7.0.js"
    integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script> -->

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<style>
    * {
        z-index: 0;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="company_logo/HD logo.png" alt="#">
                HD Company
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">
                            <i class="fa-solid fa-house" style="color: #fafafa;"></i>
                            &nbspHome
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="product.php">
                            <i class="fa-brands fa-product-hunt" style="color: #ffffff;"></i>&nbspProducts
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="categories.php">
                            <i class="fa-solid fa-filter" style="color: #ffffff;"></i>&nbspCategory
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Orders
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="cart.php">
                                    <i class="fa-solid fa-cart-shopping"></i>&nbspCart</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="order_details.php">
                                    <i class="fa-solid fa-circle-check"></i>&nbspOrder Details</a>
                            </li>
                        </ul>
                    </li>

                </ul>

                <form class="d-flex" role="search" action="search.php" method="post">
                    <input class="form-control me-2" type="search" placeholder="Enter Product Name" aria-label="Search" name="search" required>
                    <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


</body>

</html>