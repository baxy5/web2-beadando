<?php include __DIR__ . '/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Regisztráció</h2>
            <form action="/register" method="POST" class="shadow p-4 rounded bg-light">
                <div class="mb-3">
                    <label for="first_name" class="form-label">Keresztnév</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Add meg a keresztneved" required>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Vezetéknév</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Add meg a vezetékneved" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Felhasználónév</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Válassz egy felhasználónevet" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Add meg az email címed" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Jelszó</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Válassz egy jelszót" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Regisztráció</button>
                <p class="text-center mt-3">Van már fiókod? <a href="/login">Jelentkezz be!</a></p>
            </form>
        </div>
    </div>
</div>

