<?php
class ItemModel extends Model
{
    public function getAll()
    {
        $sql = 'SELECT * FROM items ORDER BY id DESC';
        return $this->mysqli->query($sql);
    }

    public function insert($name, $description)
    {
        $sql = "INSERT INTO items (name, description) VALUES ('$name', '$description')";
        $this->mysqli->query($sql);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM items WHERE id = $id";
        return $this->mysqli->query($sql);
    }

    public function update($id, $name, $description)
    {
        $sql = "UPDATE items SET name = '$name', description = '$description' WHERE id = '$id'";
        $this->mysqli->query($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM items WHERE id = $id";
        $this->mysqli->query($sql);
    }
}
