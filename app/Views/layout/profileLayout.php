<?= $this->extend('layout/mainLayout'); ?>
<?= $this->section('content') ?>

<div class="profile-layout" >
    <div class="profile-layout-c1">
        <h1>c1</h1>
    </div>
    <div class="profile-layout-c2" > 
        <?php $this->renderSection('profile-content'); ?>
    </div>
</div>

<?= $this->endSection() ?>