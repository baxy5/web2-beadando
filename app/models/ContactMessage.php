<?php

class ContactMessage {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createContactMessage($email, $phone, $message) {
        $sql = "INSERT INTO contact_message (email, phone, message) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$email, $phone, $message]);
    }

    public function getAllMessages() {
        $sql = "SELECT * FROM contact_message ORDER BY created_at DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }
}
