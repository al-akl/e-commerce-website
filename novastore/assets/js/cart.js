document.querySelectorAll(".addToCartForm").forEach(form => {

    if (!form)
        return;

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const barcode = this.querySelector("input[name='barcode']").value;

        const messageBox = this.querySelector(".cartMessage");

        let xhr = new XMLHttpRequest();

        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4 && xhr.status === 200) {

                let response = JSON.parse(xhr.responseText);

                if (response.success) {
                    messageBox.innerText = "Added to cart";
                    messageBox.style.color = "green";

                    setTimeout(() => {
                        messageBox.innerText = '';
                    }, 1000);

                } else {
                    messageBox.innerText = response.message;
                    messageBox.style.color = "red";
                }
            }
        };

        xhr.open("POST", "index.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("action=addToCart&barcode=" + encodeURIComponent(barcode));
    });
});


document.querySelectorAll(".updateQuantityForm").forEach(form => {

    if (!form)
        return;

    form.addEventListener("submit", function(e) {
        e.preventDefault();

        const barcode = this.querySelector("input[name='barcode']").value;
        const clickedButton = e.submitter;

        let data = "action=updateQuantity" + "&barcode=" + encodeURIComponent(barcode);

        if (clickedButton.name === "increaseQuantity") 
            data += "&increaseQuantity=true";
         else 
            data += "&decreaseQuantity=true";
        
        const quantityDiv = this.closest(".product-card").querySelector(".quantity");

        let xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {

            if (xhr.readyState === 4 && xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);

                if (response.success) {
                    const productCard = form.closest(".product-card");
                    const quantityDiv = productCard.querySelector(".quantity");
                    const totalDiv = document.querySelector("h2");

                    if (response.quantity > 0)
                        quantityDiv.textContent = "Quantity: " + response.quantity;
                    else
                        productCard.remove();

                    if (response.totalPrice == 0) {
                        document.querySelector(".products-grid").remove();
                        document.querySelector("#purchaseCartForm").remove();
                        document.querySelector("#cartTotal").remove();

                        location.reload();
                        return;
                    }

                    if (totalDiv) {
                        totalDiv.textContent = "Total: " + response.totalPrice + " USD";
                    }
                }
            }
        };

        xhr.open("POST", "index.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);
    });

});

document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("purchaseCartForm");

    if (!form)
        return;

    form.addEventListener("submit", function(e) {
        e.preventDefault();
        
        let data = "action=purchaseCart"; 
        
        let xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                if (response.success) {
                    location.reload(6);
                    alert(response.message);
                } else {
                    alert(response.message);
                }
            }
        };

        xhr.open("POST", "index.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);
    });
});

document.querySelectorAll(".purchaseItemForm").forEach(form => {

    if (!form)
        return;

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const barcode = this.querySelector("input[name='barcode']").value;

        let xhr = new XMLHttpRequest();

        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4 && xhr.status === 200) {

                let response = JSON.parse(xhr.responseText);

                if (response.success) {
                    const productCard = form.closest(".product-card");
                    const totalDiv = document.querySelector("h2");
                    productCard.remove();
                    if (response.totalPrice != 0) 
                        totalDiv.textContent = "Total: " + response.totalPrice + " USD";
                    else 
                        location.reload();
                    
                    alert("Item Purchased");
                } else {
                    alert(response.message);
                }
            }
        };

        xhr.open("POST", "index.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("action=purchaseItem&barcode=" + encodeURIComponent(barcode));
    });
});