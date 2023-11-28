<?= $this->extend('layout/mainLayout'); ?>
<?= $this->section('content') ?>

<div class="profile-layout">
    <div class="profile-layout-c1">
        <div class="layout-c1-sub">
            <div class="layout-navigation-button" tabindex="0">
                <p>My Vehicles</p>
            </div>
            <div class="layout-navigation-button" tabindex="1">
                <p>My Rentals</p>
            </div>
        </div>
    </div>
    <div class="profile-layout-c2">
        <?php $this->renderSection('profile-content'); ?>
    </div>
</div>

<?= $this->endSection() ?>