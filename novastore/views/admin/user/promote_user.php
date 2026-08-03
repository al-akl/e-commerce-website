<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaStore - Category</title>
    <link rel="stylesheet" href="assets/css/forms.css">
</head>
<body>

    <div class="container">

        <h2>Promote User</h2>
        
        <form method="POST" id="promoteUserForm" class="forms">
            <input class="userInput" type="text" id="firstName" name="firstName" placeholder="First Name" required>
            <input class="userInput" type="text" id="lastName" name="lastName" placeholder="Last Name" required>
            <input class="userInput" type="email" id="emailAddress" name="emailAddress" placeholder="Email Address" required>
            <button type="submit" name="promoteUser">Promote</button>
            <p id="message"></p>
        </form>

        <p>Go back to Admin Dashboard?<a href="index.php?action=admin_dashboard">admin</a></p>
        <script src="assets/js/admin.js"></script>
    </div>
</body>
</html>