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
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container auth-container">
        <h1>Login</h1>
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
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </p>
            <p>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </p>
            <input type="submit" name="loginBtn" value="Login" class="btn">
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>