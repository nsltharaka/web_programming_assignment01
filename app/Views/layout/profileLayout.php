<?= $this->extend('layout/mainLayout'); ?>
<?= $this->section('content') ?>

<div class="profile-layout">
    <div class="profile-layout-c1">
        <div class="layout-c1-sub">
            <a href="/user/profile" style="color: black; text-decoration: none;">
                <div class="layout-navigation-button" tabindex="0">
                    <p>My Vehicles</p>
                </div>
            </a>
            <a href="/user/rentals" style="color: black; text-decoration: none;">
                <div class="layout-navigation-button" tabindex="1">
                    <p>My Rentals</p>
                </div>
            </a>
        </div>
    </div>
    <div class="profile-layout-c2">
        <?php $this->renderSection('profile-content'); ?>
    </div>
</div>

<?= $this->endSection() ?>