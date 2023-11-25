<?= $this->extend('layout/mainLayout'); ?>

<?= $this->section('content') ?>
<div class="home">
    <h1>HOME | hello, <?= session('user')['first_name'] ?? "user" ?></h1>
</div>
<?= $this->endSection() ?>