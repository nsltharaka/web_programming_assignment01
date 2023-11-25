<?php $this->extend('layout/mainLayout') ?>
<?php $this->section('content'); ?>

<?= validation_list_errors() ?>

<form method="post">
    <input type="text" name="vehicle_number" value="<?= $formData['vehicle_number'] ?? ""  ?>" placeholder="vehicle_number"><br><br>
    <input type="text" name="brand" value="<?= $formData['brand'] ?? ""  ?>" placeholder="brand"><br><br>
    <input type="text" name="model" value="<?= $formData['model'] ?? ""  ?>" placeholder="model"><br><br>
    <input type="text" name="seats" value="<?= $formData['seats'] ?? ""  ?>" placeholder="seats"><br><br>
    <input type="text" name="daily_rate" value="<?= $formData['daily_rate'] ?? ""  ?>" placeholder="daily_rate"><br><br>
    <label for="radioInput">
        <input type="radio" name="transmission_type" value="manual"  id="radioInput">manual
    </label>
    <label for="radioInput2">
        <input type="radio" name="transmission_type" value="auto"  id="radioInput2">auto
    </label><br><br>
    <label for="radioInput3">
        <input type="radio" name="fuel_type" value="petrol" id="radioInput3">petrol
    </label>
    <label for="radioInput4">
        <input type="radio" name="transmission_type" value="diesel" id="radioInput4">diesel
    </label><br><br>
    <label for="selection">
        category:
        <select name="category" id="selection">
            <option value="" selected>select one</option>
            <option value="car">car</option>
            <option value="van">van</option>
            <option value="bus">bus</option>
            <option value="motorbike">motorbike</option>
            <option value="threeWheel">threeWheel</option>
        </select>
    </label>


    <input type="submit" value="insert">
</form>

<?= $info ? view_cell('AlertMessageCell', ["message" => $info]) : "" ?>

<?php $this->endSection(); ?>