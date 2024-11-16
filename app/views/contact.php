<?php include __DIR__ . '/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Kapcsolatfelvétel</h2>
            <p class="text-center">
                Ha kérdésed, észrevételed van, vagy támogatást szeretnél kérni, töltsd ki az alábbi űrlapot, és küldd el az üzeneted. Az adminisztrátor hamarosan válaszol!
            </p>
            <form action="/contact" method="POST" class="shadow p-4 rounded bg-light mt-4">
                <div class="mb-3">
                    <label for="email" class="form-label">Email cím</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Add meg az email címed" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefonszám (opcionális)</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Add meg a telefonszámod (opcionális)">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Üzenet</label>
                    <textarea name="message" id="message" rows="5" class="form-control" placeholder="Írd ide az üzeneted..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Üzenet Küldése</button>
            </form>
        </div>
    </div>
</div>

