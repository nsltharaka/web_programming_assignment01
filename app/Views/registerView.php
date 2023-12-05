<?= $this->extend('layout/mainLayout'); ?>

<?= $this->section('content') ?>

<form method="post" action="/user/register" class="reg-form-container">
    <h1>User Registration</h1>
    <div class="column-two reg-form-gap-fix ">
        <div class="component-container">
            <div class="vehicle-form-component">
                <label for="vn">First Name</label>
                <input type="text" name="first_name" value="<?= $_POST['first_name'] ?? "" ?>" id="vn">
            </div>
            <div class="vehicle-form-component">
                <label for="Brand">Last Name</label>
                <input type="text" name="last_name" value="<?= $_POST['last_name'] ?? "" ?>" id="Brand">
            </div>
            <div class="vehicle-form-component">
                <label for="vn">NIC</label>
                <input type="text" name="nic" value="<?= $_POST['nic'] ?? "" ?>" id="vn">
            </div>
            <div class="vehicle-form-component">
                <label for="Brand">Telephone</label>
                <input type="text" name="contact" value="<?= $_POST['brand'] ?? "" ?>" id="Brand">
            </div>
        </div>
        <div>
            <div class="vehicle-form-component">
                <label for="seats">Email</label>
                <input type="text" name="email" value="<?= $_POST['seats'] ?? "" ?>" id=" seats">
            </div>
        </div>
        <div>
            <div class="vehicle-form-component">
                <label for="seats">Password</label>
                <input type="password" name="password" value="<?= $_POST['password'] ?? "" ?>" id=" seats">
            </div>
        </div>
        <div>
            <div class="vehicle-form-component">
                <label for="seats">Confirm Password</label>
                <input type="password" name="confirmPassword" value="<?= $_POST['confirmPassword'] ?? "" ?>" id=" seats">
            </div>
        </div>
        <div class="reg-form-button-container">
            <button name="action" value="save">Register</button>
            <a href="/" target="_self"><button type="button">Cancel</button></a>
        </div>
    </div>
</form>

<?= session()->getFlashdata('info') ? view_cell('AlertMessageCell', [
    "messageType" => "alert",
    "messageHeader" => "Error",
    "message" => session()->getFlashdata('info'),
]) : "" ?>

<?= session()->getFlashdata('errors') ? view_cell('AlertMessageCell', [
    "messageType" => "alert",
    "messageHeader" => "Validation Errors",
    "message" => implode("<br><br>", array_values(session()->getFlashdata('errors')))
]) : "" ?>


<?= $this->endSection() ?>