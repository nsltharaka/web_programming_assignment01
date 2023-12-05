<?= $this->extend('layout/mainLayout'); ?>

<?= $this->section('content') ?>

<?= session()->getFlashdata('info') ? print_r(session()->getFlashdata('info')) : "no" ?>

<?= session()->getFlashdata('info') ? view_cell('AlertMessageCell', [
    "messageHeader" => "your reference",
    "message" => session()->getFlashdata('info'),
]) : "" ?>

<div class="rental-form-container">

    <form action="/rental/create" method="post" class="rental-form">

        <h2>New Rental</h2>

        <div class="input-container-grid">
            <label for="">Pickup Location: <input type="text" name="pickup_location"></label>
            <label for="width-100">Pickup Date: <input type="date" id="from_date" name="from_date"></label>
        </div>

        <div class="input-container-grid">
            <label for="">Return Location: <input type="text" name="return_location"></label>
            <label for="width-100">Return Date: <input type="date" id="to_date" name="to_date" onchange="getTotalBill(); updateMinEndDate()" min=""></label>
        </div>

        <h3>User Details</h3>
        <div class="input-container-grid">
            <label for="">First Name: <input type="text" name="first_name" value="<?= session()->get('user')['first_name'] ?>" disabled></label>
            <label for="width-100">Last Name: <input type="text" name="last_name" value="<?= session()->get('user')['last_name'] ?>" disabled></label>
        </div>

        <div class="input-container-grid">
            <label for="">nic: <input type="text" name="nic" value="<?= session()->get('user')['nic'] ?>" disabled></label>
            <label for="width-100">contact: <input type="text" name="contact" value="<?= session()->get('user')['contact'] ?>" disabled></label>
        </div>

        <h3>Vehicle Details</h3>
        <div class="input-container-grid">
            <label for="">Brand: <input type="text" name="brand" value="<?= $brand ?? "" ?>" disabled></label>
            <label for="width-100">Model: <input type="text" name="model" value="<?= $model ?? "" ?>" disabled></label>
        </div>

        <div class="input-container-grid">
            <label for="">Daily Rate: <input id="daily_rate" type="text" name="daily_rate" value="<?= $daily_rate ?? "" ?>" disabled></label>
        </div>

        <div class="input-container-grid">
            <h2>Bill Total:</h2>
            <h3 id="billTotal"></h3>
        </div>

        <input type="hidden" name="user_id" value="<?= session()->get('user')['user_id'] ?>">
        <input type="hidden" name="vehicle_number" value="<?= $vehicle_number ?? "" ?>">
        <input type="hidden" id="asd" name="total_bill" value="">

        <div class="input-container-flex">
            <button>Confirm</button>
        </div>

    </form>

</div>

<script>
    // Set the minimum end date initially based on the start date
    document.getElementById('to_date').min = document.getElementById('from_date').value;

    function updateMinEndDate() {
        console.log("changed");
        document.getElementById('to_date').min = document.getElementById('from_date').value;
    }

    function getTotalBill() {

        const daily_rate = document.querySelector('#daily_rate').value;
        const from_date = document.querySelector('#from_date').value;
        const to_date = document.querySelector('#to_date').value;

        // Convert the date strings to Date objects
        const startDate = new Date(from_date);
        const endDate = new Date(to_date);

        // Calculate the difference in milliseconds
        const timeDifference = endDate - startDate;

        // Convert milliseconds to days
        const daysDifference = (timeDifference <= 0) ? 1 : timeDifference / (1000 * 60 * 60 * 24);

        document.querySelector('#billTotal').textContent = "LKR " + (daysDifference * daily_rate).toLocaleString('en');
        document.querySelector('#asd').value = daysDifference * daily_rate;
    }


    const popupBtn = document.getElementById('popupBtn');
    popupBtn.addEventListener('click', function() {
        window.location.href = "/user/profile";
    }, {
        once: true
    });
</script>

<?= $this->endSection() ?>