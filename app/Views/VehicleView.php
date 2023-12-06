<?= $this->extend('layout/mainLayout'); ?>

<?= $this->section('content') ?>
<!-- 
<form action="/vehicle/find" method="post" class="search-container">
    <label for="a">Category:
        <select name="category" id="a">
            <option value="%[a-z]%">all</option>
            <option value="car">car</option>
            <option value="van">van</option>
            <option value="bus">bus</option>
            <option value="three-wheel">three-wheel</option>
            <option value="motorbike">motorbike</option>
        </select>
    </label>
    <label for="b">Fuel Type:
        <select name="fuel_type" id="b">
            <option value="%[a-z]%">all</option>
            <option value="petrol">petrol</option>
            <option value="diesel">diesel</option>
            <option value="electric">electric</option>
        </select>
    </label>
    <label for="c">Transmission Type:
        <select name="transmission_type" id="c">
            <option value="%[a-z]%">all</option>
            <option value="manual">manual</option>
            <option value="auto">auto</option>
        </select>
    </label>
    <button>search</button>
</form> -->

<div class="vehicle-container">
    <?php foreach ($vehicles as $vehicle) : ?>
        <?= view_cell('App\libraries\Vehicle::showVehicleCard', $vehicle) ?>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>