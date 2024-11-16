<?php

class Message {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createMessage($userId, $content) {
        $sql = "INSERT INTO messages (user_id, content) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$userId, $content]);
    }

    public function getAllMessages() {
        $sql = "SELECT messages.content, messages.created_at, users.username 
                FROM messages 
                JOIN users ON messages.user_id = users.id
                ORDER BY messages.created_at DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }
}
