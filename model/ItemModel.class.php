<?php
class ItemModel extends Model
{
    public function getAll()
    {
        $sql = 'SELECT * FROM items ORDER BY id DESC';
        return $this->mysqli->query($sql);
    }

    public function insert($name, $description, $available, $image)
    {
        $stmt = $this->mysqli->prepare(
            "INSERT INTO items (`name`, `description`, `available`, `image`)
            VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $name, $description, $available, $image);
        return $stmt->execute();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM items WHERE id = $id";
        return $this->mysqli->query($sql);
    }

    public function update($id, $name, $description, $available, $image)
    {
        $stmt = $this->mysqli->prepare("UPDATE items SET `name` = ?, `description` = ?, `available` = ?, `image` = ? WHERE `id` = ?");
        $stmt->bind_param("ssisi", $name, $description, $available, $image, $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM items WHERE id = $id";
        $this->mysqli->query($sql);
    }
}
