<?php

namespace App;

use App\Controllers\AppointmentController;
use App\Database;
use App\Models\Appointment;
use PDO;


$db = Database::getInstance($config);
$appointsController =new Appointment($db->getConnection());
$appoints =  $appointsController->getAppoinments();


?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">


      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Users Table</h5>

          <!-- Default Table -->
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Date</th>
                <th scope="col">Phone</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($appoints)): ?>
                <?php foreach ($appoints as $appoint): ?>
                  <tr>
                    <th scope="row"><?= $appoint['id'] ?></th>
                    <td><?= htmlspecialchars($appoint['name']) ?></td>
                    <td><?= htmlspecialchars($appoint['email']) ?></td>
                    <td>
                      <span>
                        <?= htmlspecialchars($appoint['date_time']) ?>
                      </span>
                    </td>
                    <td><?= htmlspecialchars($appoint['phone']) ?></td>
                    <td>
                      
                      <a class="edit-btn btn btn-secondary" href="index.php?route=admin-users-edit&user_id=<?= $appoint['id'] ?>">Edit</a>
                      <form method="POST" action="index.php?route=admin-users-delete&user_id=<?= $appoint['id']?>">
                                <input type="hidden" name ="id" value="<?= $appoint['id'] ?>">
                                <button class="btn btn-danger btn-sm" >Delete</button>

                            </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="5" class="text-center">No users found in the database.</td>
                </tr>

              <?php endif; ?>
            </tbody>
          </table>
          <!-- End Default Table Example -->
        </div>
      </div>

    </div>
  </section>

</main><!-- End #main -->