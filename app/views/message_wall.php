<?php include __DIR__ . '/header.php'; ?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Üzenőfal</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Üzenőfal</h1>

    <?php if (isset($_SESSION['user'])): ?>
        <form action="/message-wall" method="POST" class="mb-4">
            <div class="mb-3">
                <textarea name="content" rows="5" class="form-control" placeholder="Írj egy üzenetet..." required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Küldés</button>
        </form>
    <?php else: ?>
        <p class="text-center">Kérlek, <a href="/login">jelentkezz be</a>, hogy üzenetet írhass!</p>
    <?php endif; ?>

    <h2 class="text-center">Korábbi üzenetek:</h2>
    <div class="list-group">
        <?php foreach ($messages as $message): ?>
            <div class="list-group-item">
                <h5><?= htmlspecialchars($message['username']) ?></h5>
                <small class="text-muted"><?= $message['created_at'] ?></small>
                <p><?= htmlspecialchars($message['content']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>

