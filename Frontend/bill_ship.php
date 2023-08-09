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
        <form action="/" id="modal_form">
            <div class="item">
                <p>Name</p>
                <div class="name-item">
                    <input type="text" name="name" placeholder="First" id="inp" />
                    <input type="text" name="name" placeholder="Last" id="inp" />
                </div>
            </div>
            <div class="item">
                <p>Billing Address</p>
                <input type="text" name="name" id="inp" />
            </div>
            <div class="item">
                <p>Shipping Address</p>
                <textarea rows="3" id="modal_ship" required></textarea>
            </div>
            <div class="btn-block">
                <button type="submit" href="/" id="modal_button">APPLY</button>
            </div>
        </form>
    </div>
</body>

</html>