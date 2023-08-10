<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./css/bill_ship_Style.css">
</head>

<body>
    <div id="head_modal">
        <h4 id="title">Billing/Shipping Details</h4>
        <span class='close' onclick='closeModal()'>&times;</span>
    </div>

    <div id="body_modal">
        <form action="checkout_process.php" id="modal_form" method="post">
            <div class="item">
                <p>Email Address</p>
                <div class="name-item">
                    <input type="email" name="email" id="inp" required />
                </div>
            </div>
            <div class="item">
                <p>Billing Address</p>
                <input type="text" name="bill_add" id="inp" required />
            </div>
            <div class="item">
                <p>Shipping Address</p>
                <textarea rows="3" id="modal_ship" name="ship_add" required></textarea>
            </div>
            <div class="btn-block">
                <input type="submit" id="modal_button" value="Confirm">
            </div>
        </form>
    </div>
</body>

</html>