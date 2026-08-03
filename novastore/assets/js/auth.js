document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("loginForm");

    if (!form)
        return;

    form.addEventListener("submit", function(e) {
        e.preventDefault();
        
        let data = "action=login" +
                "&emailAddress=" + encodeURIComponent(document.getElementById("emailAddress").value) +
                "&password=" + encodeURIComponent(document.getElementById("password").value);
        
        let xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                if (response.success) {
                    window.location.href = response.redirect;
                } else {
                    document.getElementById("message").innerHTML = response.message;
                    document.getElementById("message").style.color = "red";
                }
            }
        };

        xhr.open("POST", "index.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.send(data);
    });
});

document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("signupForm");

    if (!form)
        return;

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        let data =
            "action=register" +
            "&firstName=" + encodeURIComponent(document.getElementById("firstName").value) +
            "&lastName=" + encodeURIComponent(document.getElementById("lastName").value) +
            "&emailAddress=" + encodeURIComponent(document.getElementById("emailAddress").value) +
            "&password=" + encodeURIComponent(document.getElementById("password").value);

        let xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);

                if (response.success) {
                    window.location.href = response.redirect;
                } else {
                    document.getElementById("message").innerHTML = response.message;
                    document.getElementById("message").style.color = "red";
                }
            }
        };

        xhr.open("POST", "index.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);
    });
});