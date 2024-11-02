<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
require_once 'dbConfig.php';
require_once 'models.php';

// Insert Color
if (isset($_POST['insertColorBtn'])) {
    $query = insertColor($pdo, $_POST['colorName'], $_POST['dealerName']);
    if ($query) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Insertion failed";
    }
}

// Edit Color
if (isset($_POST['editColorBtn'])) {
    $query = updateColor($pdo, $_POST['colorName'], $_POST['dealerName'], $_GET['color_id']);
    if ($query) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Edit failed";
    }
}

// Delete Color
if (isset($_POST['deleteColorBtn'])) {
    $query = deleteColor($pdo, $_GET['color_id']);
    if ($query) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Deletion failed";
    }
}

// Insert Bettor
if (isset($_POST['insertBettorBtn'])) {
    $query = insertBettor($pdo, $_POST['bettor_firstname'], $_POST['betting_price'], $_POST['color_id']);
    if ($query) {
        header("Location: ../viewbettors.php?color_id=" . $_POST['color_id']);
        exit;
    } else {
        echo "Insertion failed";
    }
}

// Edit Bettor
if (isset($_POST['editBettorBtn'])) {
    $query = updateBettor($pdo, $_POST['bettor_firstname'], $_POST['betting_price'], $_GET['bettor_id']);
    if ($query) {
        header("Location: ../viewbettors.php?color_id=" . $_POST['color_id']);
        exit;
    } else {
        echo "Update failed";
    }
}

// Delete Bettor
if (isset($_POST['deleteBettorBtn'])) {
    $query = deleteBettor($pdo, $_GET['bettor_id']);
    if ($query) {
        header("Location: ../viewbettors.php?color_id=" . $_POST['color_id']);
        exit;
    } else {
        echo "Deletion failed";
    }
}
?>
