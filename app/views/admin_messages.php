<?php include __DIR__ . '/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Kapcsolatfelvételi Üzenetek</h2>
    <p class="text-center">Az alábbi listában láthatod a felhasználók által küldött üzeneteket.</p>
    
    <?php if (empty($messages)): ?>
        <p class="text-center text-muted">Jelenleg nincs megjeleníthető üzenet.</p>
    <?php else: ?>
        <table class="table table-striped shadow mt-4">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Telefonszám</th>
                    <th>Üzenet</th>
                    <th>Dátum</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($messages as $index => $message): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($message['email']) ?></td>
                        <td><?= htmlspecialchars($message['phone'] ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($message['message']) ?></td>
                        <td><?= htmlspecialchars($message['created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

