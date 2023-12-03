<?= $this->extend('layout/mainLayout'); ?>
<?= $this->section('content') ?>
<?= helper('form') ?>

<div class="vehicle-form-container">
    <div class="column-one">
        <div class="vehicle-form-component">
            <img id="vehicleImage" src="/images/cars/<?= $formData['image_url'] ?? "../icons/empty-image.png" ?>" alt="" onchange="setImage()">
            <!-- <input type="file" name="image_url" id="imageInput" onchange="previewImage()"> -->
        </div>
    </div>
    <div class="column-two">
        <div class="component-container">
            <div class="vehicle-form-component">
                <label for="vn">Vehicle number</label>
                <input disabled type="text" name="vehicle_number" value="<?= $formData['vehicle_number'] ?? "" ?>" id="vn">
            </div>
            <div class="vehicle-form-component">
                <label for="Brand">Brand</label>
                <input disabled type="text" name="brand" value="<?= $formData['brand'] ?? "" ?>" id="Brand">
            </div>

            <div class="vehicle-form-component">
                <label for="model">Model</label>
                <input disabled type="text" name="model" value="<?= $formData['model'] ?? "" ?>" id=" model">
            </div>
            <div class="vehicle-form-component">
                <label for="seats">Seats</label>
                <input disabled type="text" name="seats" value="<?= $formData['seats'] ?? "" ?>" id=" seats">
            </div>

            <div class="vehicle-form-component">
                <label for="transmission_type">Transmission type</label>
                <input disabled type="text" name="seats" value="<?= $formData['transmission_type'] ?? "" ?>" id=" seats">
            </div>
            <div class="vehicle-form-component">
                <label for="category">Category</label>
                <input disabled type="text" name="seats" value="<?= $formData['category'] ?? "" ?>" id=" seats">
            </div>
            <div class="vehicle-form-component">
                <label for="fuel_type">Fuel type</label>
                <input disabled type="text" name="seats" value="<?= $formData['fuel_type'] ?? "" ?>" id=" seats">
            </div>
            <div class="vehicle-form-component">
                <label for="daily_rate">Daily rate (LKR)</label>
                <input disabled type="text" name="daily_rate" value="<?= $formData['daily_rate'] ?? "" ?>" id=" daily_rate">
            </div>
            <div class="vehicle-form-component checkbox">
                <label for="status">Availability</label>
                <input disabled type="checkbox" name="status" id="status" <?= isset($formData['status']) && $formData['status'] == 1 ? "checked" : ""  ?>>
            </div>
        </div>
        <div>
            <div class="vehicle-form-component">
                <label for="desc">Description</label>
                <textarea disabled name="description" id="desc" cols="30" rows="6"><?= $formData['description'] ?? "" ?></textarea>
            </div>
        </div>
        <div class="vehicle-form-button-container vehicle-details-view-button-container">
            <a href="/rental/new" target="_self"><button type="button">Rent this vehicle</button></a>
            <a href="/vehicle" target="_self"><button type="button">Cancel</button></a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>