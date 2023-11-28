<?= $this->extend('layout/profileLayout'); ?>
<?= $this->section('profile-content') ?>


<div class="my-vehicle-container">
    <div class="my-vehicle-action-bar">
        <a href=""><img src="/images/icons/plus.png" alt="">Add new vehicle</a>
    </div>
    <?php for ($i = 0; $i < 2; $i++) : ?>
        <div class="my-vehicle-card">
            <img src="/images/cars/swift.jpeg" alt="">
            <div class="description">
                <h1>car details </h1>
            </div>
        </div>
    <?php endfor; ?>
</div>

<?= $this->endSection() ?>