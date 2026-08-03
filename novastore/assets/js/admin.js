document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("addCategoryForm");

    if (!form)
        return;

    form.addEventListener("submit", function(e) {
        e.preventDefault();

        const categoryName = document.getElementById("categoryName");
        
        let data = "action=addCategory" +
                "&categoryName=" + encodeURIComponent(categoryName.value);
        
        let xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                const message = document.getElementById("message");
                if (response.success) {
                    message.innerText = response.message;
                    message.style.color = "green";

                    setTimeout(() => {
                        message.innerText = '';
                    }, 1000);
                
                } else {
                    message.innerText = response.message;
                    message.style.color = "red";
                }

                categoryName.value = '';
            }
        };

        xhr.open("POST", "index.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.send(data);
    });
});

document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("addProductForm");

    if (!form)
        return;

    form.addEventListener("submit", function(e) {
        e.preventDefault();

        const barcode = document.getElementById("barcode");
        const productName = document.getElementById("productName");
        const productDescription = document.getElementById("productDescription");
        const productCategory = document.getElementById("productCategory");
        const productReference = document.getElementById("productReference");
        const unitPrice = document.getElementById("unitPrice");
        
        let data = "action=addProduct" +
                "&barcode=" + encodeURIComponent(barcode.value) +
                "&productName=" + encodeURIComponent(productName.value) +
                "&productDescription=" + encodeURIComponent(productDescription.value) +
                "&productCategory=" + encodeURIComponent(productCategory.value) +
                "&productReference=" + encodeURIComponent(productReference.value) +
                "&unitPrice=" + encodeURIComponent(unitPrice.value);
        
        let xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                const message = document.getElementById("message");

                if (response.success) {
                    message.innerText = response.message;
                    message.style.color = "green";

                    barcode.value = '';
                    productName.value = '';
                    productDescription.value = '';
                    productCategory.value = '';
                    productReference.value = '';
                    unitPrice.value = '';

                    setTimeout(() => {
                        message.innerText = '';
                    }, 1000);

                } else {
                    message.innerText = response.message;
                    message.style.color = "red";
                }
            }
        };

        xhr.open("POST", "index.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.send(data);
    });
});

document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("addStockForm");

    if (!form)
        return;

    form.addEventListener("submit", function(e) {
        e.preventDefault();

        const barcode = document.getElementById("barcode");
        const quantity = document.getElementById("stock");
        
        let data = "action=addStock" +
                "&barcode=" + encodeURIComponent(barcode.value) +
                "&quantity=" + encodeURIComponent(quantity.value);
        
        let xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                const message = document.getElementById("message");
                if (response.success) {
                    message.innerText = response.message;
                    message.style.color = "green";

                    barcode.value = '';
                    quantity.value = '';

                    setTimeout(() => {
                        message.innerText = '';
                    }, 1000)
                } else {
                    message.innerText = response.message;
                    message.style.color = "red";
                }
            }
        };

        xhr.open("POST", "index.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.send(data);
    });
});

document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("removeProductForm");

    if (!form)
        return;

    form.addEventListener("submit", function(e) {
        e.preventDefault();

        const barcode = document.getElementById("barcode");
        
        let data = "action=removeProduct" +
                "&barcode=" + encodeURIComponent(barcode.value);
        
        let xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                const message = document.getElementById("message");
                if (response.success) {
                    message.innerText = response.message;
                    message.style.color = "green";

                    barcode.value = '';

                    setTimeout(() => {
                        message.innerText = '';
                    }, 1000)

                } else {
                    message.innerText = response.message;
                    message.style.color = "red";
                }
            }
        };

        xhr.open("POST", "index.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.send(data);
    });
});

document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("updateProductForm");

    if (!form)
        return;

    form.addEventListener("submit", function(e) {
        e.preventDefault();

        const barcode = document.getElementById("barcode");
        const productName = document.getElementById("productName");
        const productDescription = document.getElementById("productDescription");
        const productCategory = document.getElementById("productCategory");
        const productReference = document.getElementById("productReference");
        
        let data = "action=updateProduct" +
                "&barcode=" + encodeURIComponent(barcode.value) +
                "&productName=" + encodeURIComponent(productName.value) +
                "&productDescription=" + encodeURIComponent(productDescription.value) +
                "&productCategory=" + encodeURIComponent(productCategory.value) +
                "&productReference=" + encodeURIComponent(productReference.value);
        
        let xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                const message = document.getElementById("message");
                if (response.success) {
                    message.innerText = response.message;
                    message.style.color = "green";

                    barcode.value = '';
                    productName.value = '';
                    productDescription.value = '';
                    productCategory.value = '';
                    productReference.value = '';

                    setTimeout(() => {
                        message.innerText = '';
                    }, 1000)

                } else {
                    message.innerText = response.message;
                    message.style.color = "red";
                }
            }
        };

        xhr.open("POST", "index.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.send(data);
    });
});

document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("promoteUserForm");

    if (!form)
        return;

    form.addEventListener("submit", function(e) {
        e.preventDefault();

        const firstName = document.getElementById("firstName");
        const lastName = document.getElementById("lastName");
        const emailAddress = document.getElementById("emailAddress");
        
        let data = "action=promoteUser" +
                "&firstName=" + encodeURIComponent(firstName.value) + 
                "&lastName=" + encodeURIComponent(lastName.value) +
                "&emailAddress=" + encodeURIComponent(emailAddress.value); 
        
        let xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                const message = document.getElementById("message")
                if (response.success) {
                    message.innerText = response.message;
                    message.style.color = "green";

                    firstName.value = '';
                    lastName.value = '';
                    emailAddress.value = '';

                    setTimeout(() => {
                        message.innerText = '';
                    }, 1000)

                } else {
                    message.innerText = response.message;
                    message.style.color = "red";
                }
            }
        };

        xhr.open("POST", "index.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.send(data);
    });
});