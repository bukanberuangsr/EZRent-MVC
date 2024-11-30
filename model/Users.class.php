<?php
require_once 'Model.class.php';

class Users extends Model {

    public function findByUsername($username)
    {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>