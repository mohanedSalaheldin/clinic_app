<?php
// var_dump($_SESSION['user']);
// var_dump((int) $_GET['doctor_id']);


?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if (isset($message)): ?>
                <div class="alert alert-success text-center"><?= $message ?></div>
            <?php endif; ?>

            <div class="card shadow-sm p-4">
                <form action="index.php?route=appoinment-store" method="POST">

                    <div class="mb-3">
                        <label class="form-label fw-bold">Appointment Title/Name</label>
                        <input type="text" name="name" class="form-control" value="<?= $_SESSION['user']['name'] ?? '' ?>" placeholder="e.g. Regular Checkup" required readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $_SESSION['user']['email'] ?? '' ?>" required readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Phone</label>
                        <input type="tel" name="phone" value="<?= $_SESSION['user']['phone'] ?? '' ?>" class="form-control" required readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Appointment Date</label>
                        <input type="datetime-local" name="date_time" class="form-control" required>
                    </div>

                    <input type="hidden" name="user_pataint_id" value="<?= $_SESSION['user']['id'] ?? '' ?>" >
                    <input type="hidden" name="user_doctor_id" value="<?= $_GET['doctor_id'] ?? '' ?>">
                    <button type="submit" class="btn btn-primary w-100">Confirm Booking</button>
                </form>
            </div>
        </div>
    </div>
</div>