<?php $this->extend('layout/mainLayout') ?>
<?php $formHelper = helper('form'); ?>
<?php $this->section('content'); ?>

<?= session()->getFlashdata('errors') ? view_cell('AlertMessageCell', [
    "messageType" => "alert",
    "messageHeader" => "Validation Errors",
    "message" => implode("<br><br>", array_values(session()->getFlashdata('errors')))
]) : "" ?>

<?= session()->getFlashdata('info') ? view_cell('AlertMessageCell', [
    "messageType" => "alert",
    "messageHeader" => "Validation Error",
    "message" => session()->getFlashdata('info'),
]) : "" ?>

<form method="post" action="<?= isset($action) && $action == "new" ? "create" : "update/{$formData['vehicle_number']}" ?>" enctype="multipart/form-data" class="vehicle-form-container">
    <div class="column-one">
        <div class="vehicle-form-component">
            <img id="vehicleImage" src="/images/cars/<?= $formData['image_url'] ?? "../icons/empty-image.png" ?>" alt="" onchange="setImage()">
            <input type="file" name="image_url" id="imageInput" onchange="previewImage()">
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

            <div class="vehicle-form-component">
                <label for="model">Model</label>
                <input type="text" name="model" value="<?= $formData['model'] ?? "" ?>" id=" model">
            </div>
            <div class="vehicle-form-component">
                <label for="seats">Seats</label>
                <input type="text" name="seats" value="<?= $formData['seats'] ?? "" ?>" id=" seats">
            </div>

            <div class="vehicle-form-component">
                <label for="transmission_type">Transmission type</label>
                <?php
                $transmissionTypeOptions = [
                    "" => "select one",
                    "manual" => "manual",
                    "auto" => "auto",
                ];
                echo form_dropdown('transmission_type', $transmissionTypeOptions, $formData['transmission_type'] ?? "");
                ?>
            </div>
            <div class="vehicle-form-component">
                <label for="category">Category</label>
                <?php
                $categoryOptions = [
                    "" => "select one",
                    "car" => "car",
                    "van" => "van",
                    "bus" => "bus",
                    "three-wheel" => "three-wheel",
                    "motorbike" => "motorbike",
                    "lorry" => "lorry",
                ];

                echo form_dropdown('category', $categoryOptions, $formData['category'] ?? "");
                ?>
            </div>
            <div class="vehicle-form-component">
                <label for="fuel_type">Fuel type</label>
                <?php
                $fuelOptions = [
                    "" => "select one",
                    "petrol" => "petrol",
                    "diesel" => "diesel",
                    "electric" => "electric",
                ];

                echo form_dropdown('fuel_type', $fuelOptions, $formData['fuel_type'] ?? "");
                ?>
            </div>
            <div class="vehicle-form-component">
                <label for="daily_rate">Daily rate (LKR)</label>
                <input type="text" name="daily_rate" value="<?= $formData['daily_rate'] ?? "" ?>" id=" daily_rate">
            </div>
            <div class="vehicle-form-component checkbox">
                <label for="status">Availability</label>
                <input type="checkbox" name="status" id="status" <?= isset($formData['status']) && $formData['status'] == 1 ? "checked" : ""  ?>>
            </div>
        </div>
        <div>
            <div class="vehicle-form-component">
                <label for="desc">Description</label>
                <textarea name="description" id="desc" cols="30" rows="6"><?= $formData['description'] ?? "" ?></textarea>
            </div>
        </div>
        <div class="vehicle-form-button-container">
            <button name="action" value="save"><?= isset($action) && $action == "new" ? "Save" : "update" ?></button>
            <?php if ($action == 'update') : ?>
                <a href="/vehicle/delete/<?= $formData['vehicle_number'] ?? "" ?>" target="_self"><button type="button">Delete</button></a>
            <?php endif ?>
            <a href="/user/profile" target="_self"><button type="button">Cancel</button></a>
        </div>
    </div>
</form>

<?php $this->endSection(); ?>

<!-- helper function -->