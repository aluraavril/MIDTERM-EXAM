<?php
session_start();
require_once 'dbConfig.php';

// Login Handler
if(isset($_POST['loginBtn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
        header("Location: ../index.php");
    } else {
        $_SESSION['error'] = "Invalid email or password";
        header("Location: ../login.php");
    }
    exit();
}

// Register Handler
if(isset($_POST['registerBtn'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $age = $_POST['age'];

    try {
        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password, address, age) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$first_name, $last_name, $email, $password, $address, $age]);
        header("Location: ../login.php");
    } catch(PDOException $e) {
        $_SESSION['error'] = "Email already exists";
        header("Location: ../register.php");
    }
    exit();
}

// Logout Handler
if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../login.php");
    exit();
}