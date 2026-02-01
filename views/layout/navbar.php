<nav class="navbar navbar-expand-lg bg-blue sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-white h3" href="index.php?route=home">VCare</a>
        
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="navbar-nav gap-2">
                <a class="btn btn-outline-light border-0" href="index.php?route=home">Home</a>
                <a class="btn btn-outline-light border-0" href="index.php?route=majors">Majors</a>
                <a class="btn btn-outline-light border-0" href="index.php?route=doctors">Doctors</a>
                
                <?php if(isset($_SESSION['user'])): ?>
                    <a class="btn btn-outline-light border-0" href="index.php?route=history">History</a>
                    <a class="btn btn-danger" href="index.php?route=logout">Logout</a>
                <?php else: ?>
                    <a class="btn btn-light text-blue fw-bold" href="index.php?route=login">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
<main class="flex-grow-1">