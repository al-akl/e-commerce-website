document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".reviewForm").forEach(form => {
        if(!form)
            return;
        form.addEventListener("click", function (e) {
            const barcode = this.querySelector('input[name="barcode"]');

            window.location.href = "index.php?action=openReview&barcode=" + encodeURIComponent(barcode.value);
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {

    const form = document.querySelector(".review-form");

    if (!form) return;

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const content = document.getElementById("content");
        const rating = document.getElementById("rating");
        const barcode = document.getElementById("barcode");
        
        let data = "action=addReview" + "&content=" + encodeURIComponent(content.value) + 
                "&rating=" + encodeURIComponent(rating.value) +
                "&barcode=" + encodeURIComponent(barcode.value);
        
        let xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                const message = document.getElementById("message");
                if (response.success) {
                    message.innerText = response.message;
                    message.style.color = "green";
                } else {
                    message.innerText = response.message;
                    message.style.color = "red";
                }

                rating.value = '';
                content.value = '';
            }
        };

        xhr.open("POST", "index.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.send(data);
    });
});