<?= $this->extend('layout/mainLayout'); ?>

<?= $this->section('content') ?>

<?= validation_list_errors() ?>

<form method="post">
    <input type="text" name="first_name" value="<?= $formData['first_name'] ?? "" ?>" placeholder="firstName"><br><br>
    <input type="text" name="last_name" value="<?= $formData['last_name'] ?? ""  ?>" placeholder="lastName"><br><br>
    <input type="text" name="nic" value="<?= $formData['nic'] ?? "" ?>" placeholder="nic"><br><br>
    <input type="text" name="contact" value="<?= $formData['contact'] ?? ""  ?>" placeholder="contact"><br><br>
    <input type="text" name="email" value="<?= $formData['email'] ?? "" ?>" placeholder="email"><br><br>
    <input type="text" name="password" value="<?= $formData['password'] ?? ""  ?>" placeholder="password"><br><br>
    <input type="text" name="confirmPassword" value="<?= $formData['confirmPassword']  ?? ""  ?>" placeholder="confirmPassword"><br><br>
    <input type="submit" value="submit"><br><br>
</form>

<?= $info ? view_cell('AlertMessageCell', ["message" => $info]) : "" ?>


<?= $this->endSection() ?>