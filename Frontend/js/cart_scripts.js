function update_product(productId, inputId) {
    let newQuantity = document.getElementsByName('quantity_' + inputId)[0].value;
    let id = productId;
    let qty = encodeURIComponent(newQuantity);
    console.log(qty, id);
    window.location.href = 'cart.php?id=' + id + '&qty=' + qty;
}

function openModal() {
    let modal = document.getElementById("myModal");
    let modalContent = modal.querySelector(".modal-content");

    // Use AJAX to load content from modal-content.php
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "bill_ship.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            modalContent.innerHTML = xhr.responseText;
            modal.style.display = "block";
        }
    };
    xhr.send();
}

function closeModal() {
    let modal = document.getElementById("myModal");
    modal.style.display = "none";
}

// Close the modal when clicking outside the modal content
window.onclick = function (event) {
    let modal = document.getElementById("myModal");
    if (event.target === modal) {
        modal.style.display = "none";
    }
}

document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
        closeModal();
    }
});