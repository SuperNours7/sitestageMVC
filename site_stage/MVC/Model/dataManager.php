<?php
require_once 'database.php';

class DataManager {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getServices() {
        $sql = "SELECT * FROM items WHERE url IS NULL";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOffers() {
        $sql = "SELECT * FROM items WHERE url IS NOT NULL";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
