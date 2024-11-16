<?php include 'header.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">
        Üdvözlünk, 
        <?= isset($_SESSION['user']) ? htmlspecialchars($_SESSION['user']['last_name'] . ' ' . $_SESSION['user']['first_name']) : 'Kedves Látogató'; ?>!
        <?= isset($_SESSION['user']) ? '(' . ($_SESSION['user']['is_admin'] ? 'admin' : 'felhasználó') . ')' : ''; ?>
    </h1>

    <p class="text-center mt-4">
        Ez az oldal lehetőséget nyújt a felhasználóknak, hogy regisztráljanak, bejelentkezzenek, és üzeneteket hagyjanak az üzenőfalon. 
        Adminisztrátorok számára külön funkciók érhetők el, például a felhasználók adatainak exportálása és a kapcsolatfelvételi üzenetek kezelése.
    </p>

    <div class="mt-5 text-center">
        <h2>Funkciók:</h2>
        <ul class="list-unstyled">
            <li>📋 <strong>Üzenőfal:</strong> Oszd meg gondolataidat másokkal!</li>
            <li>📧 <strong>Kapcsolat:</strong> Küldj üzenetet az adminisztrátornak!</li>
            <?php if (isset($_SESSION['user']) && $_SESSION['user']['is_admin']): ?>
                <li>⚙️ <strong>Admin funkciók:</strong> Felhasználói adatok exportálása, üzenetek kezelése.</li>
            <?php endif; ?>
        </ul>
    </div>
</div>
