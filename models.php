<?php  
// Color Functions
function insertColor($pdo, $color_name, $dealer_name) {
    $sql = "INSERT INTO color_game (color_name, dealer_name) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$color_name, $dealer_name]);
}

function updateColor($pdo, $color_name, $dealer_name, $color_id) {
    $sql = "UPDATE color_game SET color_name = ?, dealer_name = ? WHERE color_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$color_name, $dealer_name, $color_id]);
}

function deleteColor($pdo, $color_id) {
    $sql = "DELETE FROM color_game WHERE color_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$color_id]);
}

// Bettor Functions
function insertBettor($pdo, $bettor_firstname, $betting_price, $color_id) {
    $sql = "INSERT INTO bettors (bettor_firstname, betting_price, color_id) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$bettor_firstname, $betting_price, $color_id]);
}

function updateBettor($pdo, $bettor_firstname, $betting_price, $bettor_id) {
    $sql = "UPDATE bettors SET bettor_firstname = ?, betting_price = ? WHERE bettor_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$bettor_firstname, $betting_price, $bettor_id]);
}

function deleteBettor($pdo, $bettor_id) {
    $sql = "DELETE FROM bettors WHERE bettor_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$bettor_id]);
}

function getAllColors($pdo) {
    $sql = "SELECT * FROM color_game";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getAllBettersByColor($pdo, $color_id) {
    $sql = "SELECT * FROM bettors WHERE color_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$color_id]);
    return $stmt->fetchAll();
}

function getColorByID($pdo, $color_id) {
    $sql = "SELECT * FROM color_game WHERE color_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$color_id]);
    return $stmt->fetch();
}

function getBettorByID($pdo, $bettor_id) {
    $sql = "SELECT * FROM bettors WHERE bettor_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$bettor_id]);
    return $stmt->fetch();
}

function createUser($pdo, $first_name, $last_name, $email, $password, $address, $age) {
    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password, address, age) VALUES (?, ?, ?, ?, ?, ?)");
    return $stmt->execute([$first_name, $last_name, $email, $password, $address, $age]);
}

function getUserByEmail($pdo, $email) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch();
}

function getUserById($pdo, $user_id) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->execute([$user_id]);
    return $stmt->fetch();
}


?>

