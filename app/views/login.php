<?php include __DIR__ . '/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Bejelentkezés</h2>
            <form action="/login" method="POST" class="shadow p-4 rounded bg-light">
                <div class="mb-3">
                    <label for="username" class="form-label">Felhasználónév</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Add meg a felhasználóneved" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Jelszó</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Add meg a jelszavad" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Belépés</button>
                <p class="text-center mt-3">Nincs fiókod? <a href="/register">Regisztrálj!</a></p>
            </form>
        </div>
    </div>
</div>

