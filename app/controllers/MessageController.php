<?php
require_once __DIR__ . '/../models/Message.php';

class MessageController {
    private $messageModel;

    public function __construct($db) {
        $this->messageModel = new Message($db);
    }

    public function messageWall() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $messages = $this->messageModel->getAllMessages();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user'])) {
            $content = $_POST['content'];
            $userId = $_SESSION['user']['id'];
            if ($this->messageModel->createMessage($userId, $content)) {
                header('Location: /message-wall');
                exit;
            } else {
                echo "Üzenet küldése sikertelen.";
            }
        }

        require __DIR__ . '/../views/message_wall.php';

    }
}
