<nav class="navbar navbar-expand-lg bg-blue sticky-top">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="/">VCare</a>

        <div class="collapse navbar-collapse justify-content-end">
            <div class="d-flex gap-3">
                <a class="btn btn-outline-light" href="/">Home</a>
                <a class="btn btn-outline-light" href="/?route=doctors">Doctors</a>

                <?php if (!empty($_SESSION['user'])): ?>
                    <a class="btn btn-outline-light" href="/?route=logout">Logout</a>
                <?php else: ?>
                    <a class="btn btn-outline-light" href="/?route=login">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
<h1>HEADER</h1>