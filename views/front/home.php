<?php

namespace App;

use App\Models\User;

use App\Database;
use App\Models\Major;

$db = Database::getInstance($config)->getConnection();
$doctors = User::getAllDoctors($db);
$majors = Major::getAllMajors($db);


?>
<div class="container">
    <h2 class="h1 fw-bold text-center my-4">majors</h2>
    <div class="d-flex flex-wrap gap-4 justify-content-center">
        <?php if (empty($doctors)): ?>
            <p class="text-center">No Majors found at the moment.</p>
        <?php else: ?>

            <div class="d-flex flex-wrap gap-4 justify-content-center">
                <?php foreach ($majors as $major): ?>
                    <div class="card p-2" style="width: 18rem;">
                        <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                            alt="major">
                        <div class="card-body d-flex flex-column gap-1 justify-content-center">
                            <h4 class="card-title fw-bold text-center"> <?= htmlspecialchars($major['name']) ?> </h4>
                            <a href="./doctors/index.html" class="btn btn-outline-primary card-button">Browse Doctors</a>
                        </div>
                    </div>
                <?php endforeach; ?>



            </div>
        <?php endif; ?>
        </div>



        <h2 class="h1 fw-bold text-center my-4">doctors</h2>
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
                            <a href="index.php?route=contact" class="btn btn-outline-primary card-button">Book an appointment</a>
                        </div>
                    </div>
                <?php endforeach; ?>



            </div>
        <?php endif; ?>

    </div>


    <div class="banner container d-block d-lg-grid d-md-block d-sm-block">
        <div class="info">
            <div class="info__details">
                <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg"
                    alt="" width="50" height="50">
                <h4 class="title m-0">
                    everything you need is found at VCare.
                </h4>
                <p class="content">
                    search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone,
                    you
                    can also order medicine or book a surgery.
                </p>
            </div>
        </div>
        <div class="info">
            <div class="info__details">
                <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg"
                    alt="" width="50" height="50">
                <h4 class="title m-0">
                    everything you need is found at VCare.
                </h4>
                <p class="content">
                    search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone,
                    you
                    can also order medicine or book a surgery.
                </p>
            </div>
        </div>
        <div class="info">
            <div class="info__details">
                <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg"
                    alt="" width="50" height="50">
                <h4 class="title m-0">
                    everything you need is found at VCare.
                </h4>
                <p class="content">
                    search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone,
                    you
                    can also order medicine or book a surgery.
                </p>
            </div>
        </div>
        <div class="info">
            <div class="info__details">
                <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg"
                    alt="" width="50" height="50">
                <h4 class="title m-0">
                    everything you need is found at VCare.
                </h4>
                <p class="content">
                    search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone,
                    you
                    can also order medicine or book a surgery.
                </p>
            </div>
        </div>
        <div class="bottom--left bottom--content bg-blue text-white">
            <h4 class="title">download the application now</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus facere eveniet in id, quod
                explicabo minus ut, sint possimus, fuga voluptas. Eius molestias eveniet labore ullam magnam sequi
                possimus quaerat!</p>
            <div class="app-group">
                <div class="app"><img
                        src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/google-play-logo.svg"
                        alt="">Google Play</div>
                <div class="app"><img
                        src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/apple-logo.svg"
                        alt="">App Store</div>
            </div>
        </div>
        <div class="bottom--right bg-blue text-white">
            <img src="assets/images/banner.jpg" class="img-fluid banner-img">
        </div>
    </div>
</div>