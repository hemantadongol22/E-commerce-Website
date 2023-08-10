<?php
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>Order History</title>

</head>

<body class="cnt-home">
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li class='active'>Shopping Cart</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row inner-bottom-sm">
                <div class="shopping-cart">
                    <div class="col-md-12 col-sm-12 shopping-cart-table ">
                        <div class="table-responsive">
                            <form name="cart" method="post">

                                <table class="table table-bordered">


                                    <?php
                                    $query = mysqli_query($conn, "SELECT op.oid as orderid, op.qty as orderqty,
                                            op.price as totprice, op.order_date as ordate, p.name as prname, p.image as primg,
                                            p.price as prprice, p.id as pr_id,
                                            shipping.address as shipadd,
                                            billing.address as billadd
                                            FROM ordered_product op
                                            JOIN product p ON op.pid = p.id
                                            JOIN shipping ON op.oid = shipping.oid
                                            JOIN billing on op.oid = billing.oid");
                                    if (mysqli_num_rows($query) > 0) { ?>
                                        <thead>
                                            <tr>
                                                <th class="cart-romove item">S.N</th>
                                                <th class="cart-romove item">Order ID</th>

                                                <th class="cart-description item">Image</th>
                                                <th class="cart-product-name item">Product Name</th>

                                                <th class="cart-qty item">Quantity</th>
                                                <th class="cart-sub-total item">Price Per unit</th>
                                                <th class="cart-total item">Grandtotal</th>
                                                <!-- <th class="cart-total item">Payment Method</th> -->
                                                <th class="cart-description item">Shipping Address</th>
                                                <th class="cart-description item">Billing Address</th>
                                                <th class="cart-description item">Order Date</th>
                                                <!-- <th class="cart-total last-item">Action</th> -->
                                            </tr>
                                        </thead><!-- /thead -->
                                        <?php

                                        $cnt = 1;
                                        while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $row['orderid']; ?></td>
                                                <td class="cart-image">
                                                    <img src="../admin/image/<?php echo $row['primg']; ?>" alt="#" width="200vw" height="150vh">
                                                </td>
                                                <td class="cart-product-name-info">
                                                    <h6 class='cart-product-description'>
                                                        <a href="prod_detail.php?id=<?php echo $row['pr_id']; ?>">
                                                            <?php echo $row['prname']; ?>
                                                        </a>
                                                    </h6>
                                                </td>
                                                <td class="cart-product-quantity">
                                                    <?php echo $row['orderqty']; ?>
                                                </td>
                                                <td class="cart-product-sub-total"><?php echo $row['prprice']; ?></td>
                                                <td class="cart-product-grand-total"><?php echo $row['totprice']; ?></td>
                                                <td class="cart-product-sub-total"><?php echo $row['shipadd']; ?></td>
                                                <td class="cart-product-sub-total"><?php echo $row['billadd']; ?></td>
                                                <td class="cart-product-sub-total"><?php echo $row['ordate']; ?></td>
                                            </tr>
                                    <?php
                                            $cnt = $cnt + 1;
                                        }
                                    }
                                    ?>

                                    </tbody><!-- /tbody -->
                                </table><!-- /table -->

                        </div>
                    </div>

                </div><!-- /.shopping-cart -->
            </div> <!-- /.row -->
            </form>
        </div><!-- /.container -->
    </div><!-- /.body-content -->

</body>

</html>

<?php include 'includes/footer.php' ?>