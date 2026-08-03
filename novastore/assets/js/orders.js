document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("viewOrdersForm");

    if (!form) 
        return;

    form.addEventListener("submit", function (e) {
        window.location.href = "index.php?action=getUserOrders";
    });

});