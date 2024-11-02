<?php 
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once 'core/models.php';
require_once 'core/dbConfig.php';

// Retrieve bettor information based on ID
if (isset($_GET['bettor_id'])) {
    $bettor = getBettorByID($pdo, $_GET['bettor_id']);
    if (!$bettor) {
        echo "Bettor not found.";
        exit;
    }
} else {
    echo "Bettor ID not provided.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bettor</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Edit Bettor</h1>
        <form action="core/handleForms.php?bettor_id=<?php echo htmlspecialchars($bettor['bettor_id']); ?>" method="POST" class="input-form">
            <input type="hidden" name="color_id" value="<?php echo htmlspecialchars($_GET['color_id']); ?>">
            <input type="hidden" name="added_by" value="<?php echo $_SESSION['user_id']; ?>">
            <input type="text" name="bettor_firstname" value="<?php echo htmlspecialchars($bettor['bettor_firstname']); ?>" required>
            <input type="number" name="betting_price" value="<?php echo htmlspecialchars($bettor['betting_price']); ?>" required>
            <input type="submit" name="editBettorBtn" value="Update Bettor" class="btn">
        </form>
        <a href="viewbettors.php?color_id=<?php echo htmlspecialchars($_GET['color_id']); ?>" class="btn">Cancel</a>
    </div>
</body>
</html>