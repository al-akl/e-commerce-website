<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaStore - Login</title>
    <link rel="stylesheet" href="assets/css/forms.css">
</head>
<body>

    <div class="container">

        <h2>Login</h2>
        
        <form method="POST" id="loginForm" class="forms">
            <input type="email" id="emailAddress" name="emailAddress" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>

        <p id="message"></p>

        <p>Don't have an account?
            <a href="index.php?action=registerPage">Signup</a>
        </p>
        <script src="assets/js/auth.js"></script>
    </div>
</body>
</html>