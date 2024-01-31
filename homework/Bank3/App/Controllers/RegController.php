<?php
// BankController.php
require_once 'DbConnection.php';

class BankController extends DbConnection {
    public function getAllAccounts() {
        $query = "SELECT * FROM bank";
        $result = $this->getConnection()->query($query);
        $accounts = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $accounts[] = $row;
            }
        }

        return $accounts;
    }

    public function addAccount($name, $balance) {
        $query = "INSERT INTO bank (name, balance) VALUES ('$name', $balance)";
        return $this->getConnection()->query($query);
    }

    public function updateAccount($id, $name, $balance) {
        $query = "UPDATE bank SET name='$name', balance=$balance WHERE id=$id";
        return $this->getConnection()->query($query);
    }

    public function deleteAccount($id) {
        $query = "DELETE FROM bank WHERE id=$id";
        return $this->getConnection()->query($query);
    }
}
?>