function validateForm() {
    let name = document.getElementById("prname").value;
    let price = document.getElementById("prpric").value;
    let qty = document.getElementById("prqty").value;
    let image = document.getElementById("file-image").value;
    let desc = document.getElementById("desc").value;

    if (name == "") {
        alert("Please insert product name");
        return false;
    }
    if (price == "") {
        alert("Please insert product price");
        return false;
    }
    if (qty == "") {
        alert("Please insert product quantity");
        return false;
    }
    if (image == "") {
        alert("Please insert product image");
        return false;
    }
    if (desc == "") {
        alert("Please insert product image");
        return false;
    }
}