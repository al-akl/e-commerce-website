<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaStore - Signup</title>
    <link rel="stylesheet" href="assets/css/forms.css">
</head>
<body>

    <div class="container">

        <h2>Create Account</h2>

        <form method="POST" id="signupForm" class="forms">
            <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
            <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
            <input type="email" id="emailAddress" name="emailAddress" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit" name="signup">Sign Up</button>
        </form>

        <p id="message"></p>

        <p>Already have an account?
            <a href="index.php?action=loginPage">Login</a>
        </p>

    </div>
    <script src="assets/js/auth.js"></script>
</body>
</html>