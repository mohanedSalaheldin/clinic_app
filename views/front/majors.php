<?php

namespace App;
use App\Database;
use App\Models\Major;

$db = Database::getInstance($config)->getConnection();
$majors = Major::getAllMajors($db);

?>
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">majors</li>
        </ol>
    </nav>
    <div class="majors-grid">


        <?php if (empty($majors)): ?>
            <p class="text-center">No Majors found at the moment.</p>
        <?php else: ?>

            <div class="d-flex flex-wrap gap-4 justify-content-center">
                <?php foreach ($majors as $major): ?>
                    <div class="card p-2" style="width: 18rem;">
                        <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                            alt="major">
                        <div class="card-body d-flex flex-column gap-1 justify-content-center">
                            <h4 class="card-title fw-bold text-center"> <?= htmlspecialchars($major['name']) ?> </h4>
                            <a href="index.php?route=major-doctors&id=<?= $major['id'] ?>" class="btn btn-outline-primary card-button">Browse Doctors</a>
                        </div>
                    </div>
                <?php endforeach; ?>



            </div>
        <?php endif; ?>


    </div>

    <nav class="mt-5" aria-label="navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link page-prev" href="#" aria-label="Previous">
                    <span aria-hidden="true">
                        < </span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link page-next" href="#" aria-label="Next">
                    <span aria-hidden="true"> > </span>
                </a>
            </li>
        </ul>
    </nav>
</div>