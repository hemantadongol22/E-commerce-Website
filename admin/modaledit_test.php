<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/adminstyle.css">
  <script src="js/validate.js"></script>
  <title></title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    /* The Modal (background) */
    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      /* padding-top: 100px;  */
      left: 0;
      top: 0;
      /* width: 100px;
  height: 10px; */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
    }

    /* Modal Content */
    div.modal-content {
      position: relative;
      display: block;
      flex-direction: column;
      width: 30%;
      pointer-events: auto;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid rgba(0, 0, 0, .2);
      border-radius: 0.3rem;
      outline: 0;
      margin: auto;
      margin-top: 5%;
    }

    /* The Close Button */
    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    .center {
      width: 100%;
    }

    .navbar {
      width: 100%;
    }

    h5.modal-title {
      margin: auto;
    }
  </style>
</head>

<body>

  <h2>Modal Example</h2>

  <!-- Trigger/Open The Modal -->
  <a href="#" id="myBtn">Open Modal</a>

  <!-- The Modal -->
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <span span class='close' onclick='closeModal()'>&times;</span>

      </div>

      <?php include 'navbar.php'; ?>
      <form action="add_prod.php" method="post" class="center" onsubmit="return validateForm()">
        <p>Enter Product name</p>
        <input type="text" class="cent" name="prname" id="prname">

        <br>

        <p>Enter Product price</p>
        <input type="number" class="cent" name="prpric" id="prpric">

        <br>

        <p>Input Product Image</p>
        <input type="file" class="cent" id="file-image" accept="image/*" name="primg" placeholder="Images"><br>


        <input type="submit" id="submit" value="Add Product">
      </form>
    </div>

  </div>
  <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];


    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>

</body>

</html>