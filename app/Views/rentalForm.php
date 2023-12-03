<?= $this->extend('layout/mainLayout'); ?>

<?= $this->section('content') ?>
<div class="rental-form-container">

    <form action="" class="rental-form">

        <h2>New Rental</h2>

        <div class="input-container-grid">
            <label for="">Pickup Location: <input type="text" name="pickup_location"></label>
            <label for="width-100">Pickup Date: <input type="date" name="pickup_location"></label>
        </div>

        <div class="input-container-grid">
            <label for="">Return Location: <input type="text" name="pickup_location"></label>
            <label for="width-100">Return Date: <input type="date" name="pickup_location"></label>
        </div>

        <h3>User Details</h3>
        <div class="input-container-grid">
            <label for="">First Name: <input type="text" name="pickup_location"></label>
            <label for="width-100">Last Name: <input type="text" name="pickup_location"></label>
        </div>

        <div class="input-container-grid">
            <label for="">nic: <input type="text" name="pickup_location"></label>
            <label for="width-100">contact: <input type="text" name="pickup_location"></label>
        </div>

        <h3>Vehicle Details</h3>
        <div class="input-container-grid">
            <label for="">Brand: <input type="text" name="pickup_location"></label>
            <label for="width-100">Model: <input type="text" name="pickup_location"></label>
        </div>

        <div class="input-container-grid">
            <label for="">Daily Rate: <input type="text" name="pickup_location"></label>
        </div>

        <div class="input-container-grid">
            <h2>Bill Total:</h2>
            <h3>LKR 100,000.00</h3>
        </div>

        <div class="input-container-flex">
            <button>Confirm</button>
        </div>

    </form>

</div>
<?= $this->endSection() ?>