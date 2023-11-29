<?= $this->extend('layout/profileLayout'); ?>
<?= $this->section('profile-content') ?>


<div class="my-vehicle-container">
    <div class="my-vehicle-action-bar">
        <a href=""><img src="/images/icons/plus.png" alt="">Add new vehicle</a>
    </div>
    <?php foreach ($vehicles as $vehicle) : ?>
        <a style="text-decoration: none; color: black;" href="/vehicle/<?= $vehicle['vehicle_number'] ?>">
            <?= view_cell('\App\libraries\Vehicle::showCard', $vehicle) ?>
        </a>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>