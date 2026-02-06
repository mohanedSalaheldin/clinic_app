<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php?route=home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">doctors</li>
        </ol>
    </nav>

    <div class="doctors-grid">
        <?php if (empty($doctors)): ?>
            <p class="text-center">No doctors found at the moment.</p>
        <?php else: ?>
            <div class="d-flex flex-wrap gap-4 justify-content-center">
                <?php foreach ($doctors as $doctor): ?>
                    <div class="card p-2" style="width: 18rem;">
                        <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="doctor">
                        <div class="card-body d-flex flex-column gap-1 justify-content-center">
                            <h4 class="card-title fw-bold text-center"><?= htmlspecialchars($doctor['name']) ?></h4>
                            <h6 class="card-title text-secondary text-center"><?= htmlspecialchars($doctor['major_name'] ?? 'General') ?></h6>
                            <a href="index.php?route=contact&doctor_id=<?= $doctor['id'] ?>" class="btn btn-outline-primary card-button">Book an appointment</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>