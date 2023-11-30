<?php $this->extend('layout/mainLayout') ?>
<?php $this->section('content'); ?>

<form method="post" action="new" class="vehicle-form-container">
    <div class="column-one">
        <div class="vehicle-form-component">
            <img src="/images/cars/<?= $formData['image_url'] ?>" alt="">
            <input type="file" name="image_url" value="<?= $formData['image_url'] ?>" id="">
        </div>
    </div>
    <div class="column-two">
        <div class="component-container">
            <div class="vehicle-form-component">
                <label for="vn">Vehicle number</label>
                <input type="text" name="vehicle_number" value="<?= $formData['vehicle_number'] ?? "" ?>" id="vn">
            </div>
            <div class="vehicle-form-component">
                <label for="Brand">Brand</label>
                <input type="text" name="brand" value="<?= $formData['brand'] ?? "" ?>" id="Brand">
            </div>
            <!-- </div> -->

            <!-- <div class="component-container"> -->
            <div class="vehicle-form-component">
                <label for="model">Model</label>
                <input type="text" name="model" value="<?= $formData['model'] ?? "" ?>" id=" model">
            </div>
            <div class="vehicle-form-component">
                <label for="seats">Seats</label>
                <input type="text" name="seats" value="<?= $formData['seats'] ?? "" ?>" id=" seats">
            </div>
            <!-- </div> -->

            <!-- <div class="component-container"> -->
            <div class="vehicle-form-component">
                <label for="transmission_type">Transmission type</label>
                <select name="transmission_type" id="transmission_type">
                    <option value="">select one</option>
                    <option value="manual">manual</option>
                    <option value="auto">auto</option>
                </select>
            </div>
            <div class="vehicle-form-component">
                <label for="category">Category</label>
                <select name="category" id="category">
                    <option value="">select one</option>
                    <option value="car">car</option>
                    <option value="van">van</option>
                    <option value="three-wheel">three-wheel</option>
                    <option value="motorbike">motorbike</option>
                    <option value="bus">bus</option>
                </select>
            </div>
            <div class="vehicle-form-component">
                <label for="fuel_type">Fuel type</label>
                <select name="fuel_type" id="fuel_type">
                    <option value="">select one</option>
                    <option value="petrol">petrol</option>
                    <option value="diesel">diesel</option>
                    <option value="electric">electric</option>
                </select>
            </div>
            <div class="vehicle-form-component">
                <label for="daily_rate">Daily rate</label>
                <input type="text" name="daily_rate" value="<?= $formData['daily_rate'] ?? "" ?>" id=" daily_rate">
            </div>
        </div>
        <div>
            <div class="vehicle-form-component">
                <label for="desc">Description</label>
                <textarea name="description" id="desc" cols="30" rows="6"><?= $formData['description'] ?? "" ?></textarea>
            </div>
        </div>
        <div class="vehicle-form-button-container">
            <button name="action" value="save">Save</button>
            <button name="action" value="delete">Delete</button>
            <a href="/user/profile" target="_self"><button type="button">Cancel</button></a>
        </div>
    </div>
</form>

<?php $this->endSection(); ?>