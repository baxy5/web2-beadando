<?php
require_once __DIR__ . '/../models/ContactMessage.php';


class ContactController {
    private $contactMessageModel;

    public function __construct($db) {
        $this->contactMessageModel = new ContactMessage($db);
    }

    public function contact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $phone = $_POST['phone'] ?? null;
            $message = $_POST['message'];

            if ($this->contactMessageModel->createContactMessage($email, $phone, $message)) {
                echo "Üzeneted elküldve!";
            } else {
                echo "Hiba történt az üzenet küldése közben.";
            }
        }

        require __DIR__ . '/../views/contact.php';
    }

    public function adminMessages() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user']) || !$_SESSION['user']['is_admin']) {
            header('Location: /');
            exit;
        }

        $messages = $this->contactMessageModel->getAllMessages();
        require __DIR__ . '/../views/admin_messages.php';
    }
}
