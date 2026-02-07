<div class="container-fluid p-4">
    <h2 class="mb-4">Doctor Dashboard - My Appointments</h2>
    
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Patient Name</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($appointments)): ?>
                        <tr><td colspan="6" class="text-center">No appointments found.</td></tr>
                    <?php else: ?>
                        <?php foreach ($appointments as $index => $app): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= htmlspecialchars($app['name']) ?></td>
                                <td><?= htmlspecialchars($app['phone']) ?></td>
                                <td><?= htmlspecialchars($app['date_time']) ?></td>
                                <td>
                                    <span class="badge bg-<?= ($app['status'] ?? 'pending') === 'completed' ? 'success' : 'warning' ?>">
                                        <?= strtoupper($app['status'] ?? 'pending') ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="index.php?route=doctor-dashboard/toggle-status&id=<?= $app['id'] ?>&current_status=<?= $app['status'] ?? 'pending' ?>" 
                                       class="btn btn-sm btn-outline-primary">
                                        Toggle Status
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>