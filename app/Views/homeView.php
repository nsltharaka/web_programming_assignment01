<?= $this->extend('layout/mainLayout'); ?>

<?= $this->section('content') ?>

<div class="homepage-section banner">
    <div class="banner-cover">
        <div class="banner-mainText">
            <h1>Drive Your Dreams <br> Where Every Journey Begins.</h1>
        </div>
        <a class="homepage-section-button" href="vehicle">see all vehicles</a>
    </div>
</div>

<div class="homepage-section category">
    <h2 style="width: 100%; text-align:center" >SELECT YOUR VEHICLE</h2>

    <div class="cards-container">
        <?php foreach ($vehicles as $vehicle) : ?>
            <?= view_cell('App\libraries\Vehicle::showVehicleCard', $vehicle) ?>
        <?php endforeach; ?>
    </div>

    <div style="width: 100%; display:flex; justify-content:center;">
        <a class="homepage-section-button section-button" href="vehicle">See More</a>
    </div>
</div>

<div class="footer">
    <span>Copyright &copy; 2023 All Rights Reserved by AutoHive</span>
</div>
<?= $this->endSection() ?>