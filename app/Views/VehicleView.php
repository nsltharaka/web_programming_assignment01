<?= $this->extend('layout/mainLayout'); ?>

<?= $this->section('content') ?>
<div class="vehicle-container">

    <?php foreach ($vehicles as $vehicle) : ?>
        <?= view_cell('App\libraries\Vehicle::showVehicleCard', $vehicle) ?>
    <?php endforeach; ?>

</div>

<?= $this->endSection() ?>