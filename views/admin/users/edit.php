<?php

namespace App;

use App\Controllers\UserController;
use App\Database;
use PDO;

$db = Database::getInstance($config);
$userController = new UserController($db);
$user =  $userController->getUserByID($_GET['user_id']);

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

                    <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
                        <form class="form" action="index.php?route=admin-users-update" method="POST">
                            <div class="form-items">
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <div class="mb-3">
                                    <label class="form-label required-label" for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?= $user['name'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required-label" for="phone">Phone</label>
                                    <input type="tel" name="phone" class="form-control" id="phone" value="<?= $user['phone'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required-label" for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="<?= $user['email'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required-label" for="description">description</label>
                                    <input type="text" name="description" class="form-control" id="description" value="<?= $user['description'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required-label" for="user_type">User Type</label>
                                    <select class="form-select" name="user_type" for='user_type' aria-label="Default select example">
                                        <option selected><?= $user['user_type'] ?></option>
                                        <option value="Admin">Admin</option>
                                        <option value="Patiant">Patiant</option>
                                        <option value="Doctor">Doctor</option>
                                    </select>
                                </div>

                                <input type="hidden" name="major_id" value="0">
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                       
                    </div>

                </div>
            </div>

        </div>
    </section>

</main><!-- End #main -->