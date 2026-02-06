<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if (isset($message)): ?>
                <div class="alert alert-success text-center"><?= $message ?></div>
            <?php endif; ?>

            <div class="card shadow-sm p-4">
                <form action="index.php?route=appoinment" method="POST">
                    <input type="hidden" name="doctor_id" value="<?= $_GET['doctor_id'] ?? '' ?>">

                    <div class="mb-3">
                        <label class="form-label fw-bold">Appointment Title/Name</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Regular Checkup" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $_SESSION['user']['email'] ?? '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Phone</label>
                        <input type="tel" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Appointment Date</label>
                        <input type="date" name="date_time" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Confirm Booking</button>
                </form>
                
            </div>
        </div>
    </div>
</div>