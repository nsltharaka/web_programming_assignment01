<?= $this->extend('layout/profileLayout'); ?>
<?= $this->section('profile-content') ?>

<?php if ($currentPage == "profile") { ?>

    <div class="my-vehicle-container" style="width: 1100px;">
        <div class="my-vehicle-action-bar">
            <a href="/vehicle/new"><img src="/images/icons/plus.png" alt="">Add new vehicle</a>
        </div>
        <?php foreach ($vehicles as $vehicle) : ?>
            <a style="text-decoration: none; color: black;" href="/vehicle/<?= $vehicle['vehicle_number'] ?>">
                <?= view_cell('\App\libraries\Vehicle::showMyVehicleCard', $vehicle) ?>
            </a>
        <?php endforeach; ?>
    </div>

<?php  } else { ?>

    <div class="table-container" style="width: 1100px;">
        <?= $table ?>
    </div>

<?php  } ?>

<?= $this->endSection() ?>