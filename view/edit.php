<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link rel="stylesheet" href="/style/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Item</h1>
        <form action="?c=Items&m=update" method="post" enctype="multipart/form-data">
            <label for="name">Item Name:</label><br>
            <input type="text" name="name" value="<?php echo $item->name ?>" required><br><br>

            <label for="description">Description:</label><br>
            <textarea name="description" required><?php echo $item->description ?></textarea><br><br>

            <label for="available">Available Quantity:</label><br>
            <input type="number" name="available" value="<?php echo $item->available ?>" min="0" required><br><br>

            <label for="image">Upload New Image (optional):</label><br>
            <input type="file" name="image"><br><br>
            <p>Current Image: <br><img src="<?php echo $item->image ?>" alt="Current Image" style="width: 100px;"></p>

            <input type="submit" name="update" value="Update Item">
        </form>
        <a href="?c-Items&m=index">Go back</a>
    </div>
</body>
</html>
