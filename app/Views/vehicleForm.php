<?php $this->extend('layout/mainLayout') ?>
<?php $formHelper = helper('form'); ?>
<?php $this->section('content'); ?>

<?= view_cell('AlertMessageCell', [
    "messageType" => "alert",
    "messageHeader" => "cow!",
    "message" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis culpa eius hic ab! Consequatur beatae quam magni nisi ipsa commodi eos mollitia, a ipsum corporis sequi nobis similique, saepe magnam.",
]) ?>

<form method="post" action="new" class="vehicle-form-container">
    <div class="column-one">
        <div class="vehicle-form-component">
            <img id="vehicleImage" src="/images/cars/<?= $formData['image_url'] ?? "../icons/empty-image.png" ?>" alt="">
            <input type="file" name="image_url" value="<?= $formData['image_url'] ?? "" ?>" id="fileUpload">
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
                <input type="text" name="daily_rate" value="<?= number_format($formData['daily_rate'] ?? "0.00", 2) ?? "" ?>" id=" daily_rate">
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

<!-- helper function -->