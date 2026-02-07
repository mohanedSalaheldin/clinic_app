<?php

namespace App;

use App\Controllers\UserController;
use App\Database;
use PDO;


$db = Database::getInstance($config);
$userController = new UserController($db);
$users =  $userController->getUsers();


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
                <th scope="col">Type</th>
                <th scope="col">Phone</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                  <tr>
                    <th scope="row"><?= $user['id'] ?></th>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td>
                      <span>
                        <?= htmlspecialchars($user['user_type']) ?>
                      </span>
                    </td>
                    <td><?= htmlspecialchars($user['phone']) ?></td>
                    <td>
                      
                      <a class="edit-btn btn btn-secondary" href="index.php?route=admin-users-edit&user_id=<?= $user['id'] ?>">Edit</a>
                      <button class="delete-btn btn btn-danger">Delete</button>
                    </td>
                  </tr>s
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