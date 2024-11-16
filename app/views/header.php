<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web2 Beadandó</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="bg-dark text-white p-3">
    <nav class="container d-flex justify-content-between align-items-center">
        <div>
            <a href="/" class="text-white text-decoration-none me-3">Főoldal</a>
            <a href="/message-wall" class="text-white text-decoration-none me-3">Üzenőfal</a>
            <a href="/contact" class="text-white text-decoration-none me-3">Kapcsolat</a>

            <?php if (isset($_SESSION['user']) && $_SESSION['user']['is_admin'] === 1): ?>
                <a href="/admin/dashboard" class="text-white text-decoration-none me-3">Admin Panel</a>
                <a href="/admin/messages" class="text-white text-decoration-none me-3">Admin Üzenetek</a>
            <?php endif; ?>
        </div>
        <div>
            <?php if (isset($_SESSION['user'])): ?>
                <span>Bejelentkezett: <?= htmlspecialchars($_SESSION['user']['last_name'] . ' ' . $_SESSION['user']['first_name']); ?> (<?= htmlspecialchars($_SESSION['user']['username']); ?>)</span>
                <a href="/logout" class="btn btn-sm btn-light ms-3">Kilépés</a>
            <?php else: ?>
                <a href="/login" class="btn btn-sm btn-light">Belépés</a>
                <a href="/register" class="btn btn-sm btn-primary ms-3">Regisztráció</a>
            <?php endif; ?>
        </div>
    </nav>
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

