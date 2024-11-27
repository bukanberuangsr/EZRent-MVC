<link rel="stylesheet" href="../style/style.css">
<div class="hero-sm">
    <h1>Edit Item</h1>
</div>
<!-- <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <label for="name">Item Name:</label><br>
        <input type="text" name="name" value="<?php //echo htmlspecialchars($item['name']); ?>" required><br><br>

        <label for="description">Description:</label><br>
        <textarea name="description" required><?php //echo htmlspecialchars($item['description']); ?></textarea><br><br>

        <label for="available">Available Quantity:</label><br>
        <input type="number" name="available" value="<?php //echo $item['available']; ?>" min="0" required><br><br>

        <label for="image">Upload New Image (optional):</label><br>
        <input type="file" name="image"><br><br>
        <p>Current Image: <br><img src="<?php //echo $item['image']; ?>" alt="Current Image" style="width: 100px;"></p>

        <input type="submit" name="update" value="Update Item">
    </form>
    <a href="dashboard.php">Back to dashboard</a>
</div> -->
<form action="?c=Post&m=update" method="post">
    <input type="hidden" name="id" value="<?php echo $post->id; ?>">

    <label> Title: <input type="text" name="title" value="<?php echo $post->title; ?>" required>
    </label> <br>
    <label> Content:
        <textarea name="content" cols="30" rows="10" required><?php echo $post->content; ?></textarea>
    </label> <br>
    <input type="submit" value="Post">
</form>
