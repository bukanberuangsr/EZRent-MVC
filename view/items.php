<link rel="stylesheet" href="/style/style.css">
<nav>
    <a href="?c=Items&m=create_form">Add new Item</a>
    <a href="?c=Auth&m=logout" class="logout">Log Out</a>
</nav>

<div class="content">
<?php if (!$items->num_rows) {
    echo 'No posts.';
} else {
    while ($item = $items->fetch_object()) {
        echo "<div class='desc'>";
        echo "<h3>$item->name</h3>";
        echo "<a href=\"?c=Items&m=edit&id=$item->id\">Edit</a>";
        printf('
        <form action="?c=Items&m=delete" method="post">
        <input type="hidden" name="id" value="%d">
        <input type="submit" value="Delete">
        </form>',
        $item->id);
        echo "<p align=\"justify\">$item->description</p>";
        echo "<div class='desc-img'>";
        echo "<img src=\"$item->image\">";
        echo "</div>";
        echo "</div>";
    }
}
?>
</div>