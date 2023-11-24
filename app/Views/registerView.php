<?= $this->extend('layout/mainLayout'); ?>

<?= $this->section('content') ?>

<?= validation_list_errors() ?>

<form method="post">
    <input type="text" name="firstName" value="<?= $data['firstName'] ?? ""  ?>" placeholder="firstName" required><br><br>
    <input type="text" name="lastName" value="<?= $data['lastName'] ?? ""   ?>" placeholder="lastName" required><br><br>
    <input type="text" name="contact" value="<?= $data['contact'] ?? ""  ?>" placeholder="contact" required><br><br>
    <input type="text" name="email" value="<?= $data['email'] ?? ""  ?>" placeholder="email" required><br><br>
    <input type="text" name="password" value="<?= $data['password'] ?? ""  ?>" placeholder="password" required><br><br>
    <input type="text" name="confirmPassword" value="<?= $data['confirmPassword'] ?? ""  ?>" placeholder="confirmPassword" required><br><br>
    <input type="submit" value="submit"><br><br>
</form>

<script>
    <?php if ($info) : ?>

        alert('insertion successful');
        window.location.href = '/user';

    <?php endif; ?>
</script>

<?= $this->endSection() ?>