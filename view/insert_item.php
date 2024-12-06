<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new Item</title>
    <link rel="stylesheet" href="/style/style.css">
</head>
<body>
<div class="container">
        <h1>Upload New Item</h1>
        <form action="?c=Items&m=create_process" method="post" enctype="multipart/form-data">
            <label for="name">Item Name:</label><br>
            <input type="text" name="name" required><br><br>

            <label for="description">Description:</label><br>
            <textarea name="description" required></textarea><br><br>

            <label for="available">Available Quantity:</label><br>
            <input type="number" name="available" min="0" required><br><br>

            <label for="image">Upload Image:</label><br>
            <input type="file" name="image" required><br><br>

            <input type="submit" name="submit" value="Add Item">
        </form>
        <a href="?c=Items&m=index">Go back</a>
    </div>
</body>
</html>