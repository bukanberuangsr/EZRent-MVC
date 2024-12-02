-- Active: 1732865320111@@127.0.0.1@3306
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Details</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="../index.php">Back to Item List</a>
        <a class="logout" href="../../auth/logout.php">Logout</a>
    </nav>
    <div class="hero-sm">
        <h1><?php echo htmlspecialchars($item['name']); ?></h1>
    </div>
    <div id="description">
        <div class="desc-img">
            <?php
            $query = "SELECT * FROM items WHERE available > 0";
            $result = mysqli_query($conn, $query);
            ?>
            <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" style="max-width: 100%; height: auto;"> <!-- Ensure responsive image -->
        </div>
        <div class="desc">
            <p><?php echo htmlspecialchars($item['description']); ?></p>
            <p><strong>Availability:</strong> <?php echo $item['available'] ? 'Available' : 'Not Available'; ?></p>
            <p><strong>Amount:</strong> <?php echo $item['available']; ?></p>
        </div>
    </div>
</body>
</html>