<?php
session_start();
if(isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container auth-container">
        <h1>Register</h1>
        <?php if(isset($_SESSION['error'])): ?>
            <div class="error-message">
                <?php 
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>
        <form action="core/handleAuth.php" method="POST">
            <p>
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" required>
            </p>
            <p>
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" required>
            </p>
            <p>
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </p>
            <p>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </p>
            <p>
                <label for="address">Address:</label>
                <textarea name="address" required></textarea>
            </p>
            <p>
                <label for="age">Age:</label>
                <input type="number" name="age" required>
            </p>
            <input type="submit" name="registerBtn" value="Register" class="btn">
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>