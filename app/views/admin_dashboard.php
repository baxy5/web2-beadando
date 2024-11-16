<?php include __DIR__ . '/header.php'; ?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Adminisztrációs Panel</h1>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="/admin/export/csv" class="btn btn-primary">Felhasználók exportálása CSV-be</a>
        </li>
        <li class="list-group-item">
            <a href="/admin/export/pdf" class="btn btn-secondary">Felhasználók exportálása PDF-be</a>
        </li>
    </ul>
</div>
</body>
</html>

