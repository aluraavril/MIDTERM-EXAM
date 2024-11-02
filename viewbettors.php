<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once 'core/dbConfig.php';
require_once 'core/models.php';

// Get color information
$color_id = $_GET['color_id'];
$colorInfo = getColorByID($pdo, $color_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bettors</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="user-info">
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></p>
        <a href="core/handleAuth.php?logout=1" class="btn">Logout</a>
    </div>
    <h1>Bettors for Color: <?php echo htmlspecialchars($colorInfo['color_name']); ?></h1>
    <a href="index.php" class="btn">Return to Main Page</a>

    <form action="core/handleForms.php" method="POST">
        <input type="hidden" name="color_id" value="<?php echo htmlspecialchars($color_id); ?>">
        <input type="hidden" name="added_by" value="<?php echo $_SESSION['user_id']; ?>">
        <p>
            <label for="bettor_firstname">Bettor First Name:</label>
            <input type="text" name="bettor_firstname" required>
        </p>
        <p>
            <label for="betting_price">Betting Price:</label>
            <input type="number" name="betting_price" required>
        </p>
        <input type="submit" name="insertBettorBtn" value="Add Bettor" class="btn">
    </form>

    <h2>Registered Bettors:</h2>
    <?php $getAllBetters = getAllBettersByColor($pdo, $color_id); ?>
    <?php if (empty($getAllBetters)) { ?>
        <p>No bettors registered yet.</p>
    <?php } else { ?>
        <?php foreach ($getAllBetters as $row) { ?>
            <div class="container">
                <h3>Bettor ID: <?php echo $row['bettor_id']; ?></h3>
                <h3>First Name: <?php echo $row['bettor_firstname']; ?></h3>
                <h3>Betting Price: <?php echo $row['betting_price']; ?></h3>
                <h3>Date Added: <?php echo $row['date_added']; ?></h3>
                <h3>Last Updated: <?php echo $row['last_updated']; ?></h3>
                <div class="editAndDelete">
                    <a href="editbettor.php?bettor_id=<?php echo $row['bettor_id']; ?>&color_id=<?php echo $color_id; ?>" class="btn">Edit</a>
                    <form action="core/handleForms.php?bettor_id=<?php echo $row['bettor_id']; ?>" method="POST" style="display:inline;">
                        <input type="hidden" name="color_id" value="<?php echo $color_id; ?>">
                        <button type="submit" name="deleteBettorBtn" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this bettor?');">Delete</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</body>
</html>