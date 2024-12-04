<?php
class AuthModel extends Model
{
    public function insert($username, $password)
    {
        $stmt = $this->mysqli->prepare(
            "INSERT INTO users (username, userpass) 
             VALUES (?, ?)"
        );

        $stmt->bind_param(
            "ss",
            $username,
            $password,
        );

        $stmt->execute();
    }

    public function findByUsername($username)
    {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>