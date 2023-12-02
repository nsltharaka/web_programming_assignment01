<div class="my-vehicle-card" onclick="vehicle_clicked()">
    <img src="/images/cars/<?= $image_url ?>" alt="">
    <div class=" description">
        <h1><?= "{$brand} {$model}" ?> </h1>
        <div class="section">
            <p class="description-line">
                <span class="description-title">Category: </span>
                <?= $category ?>
            </p>
            <p class="description-line">
                <span class="description-title">Fuel type: </span>
                <?= $fuel_type ?>
            </p>
            <p class="description-line">
                <span class="description-title">Transmission type: </span>
                <?= $transmission_type  ?>
            </p>
            <p class="description-line">
                <span class="description-title">Number of seats: </span>
                <?= $seats ?>
            </p>
            <p class="description-line">
                <span class="description-title">Daily rate: </span>
                LKR <?= number_format($daily_rate, 2) ?>
            </p>
            <p class="description-line">
                <span class="description-title">Availability: </span>
                <?= $status ? "Available" : "Not Available" ?>
            </p>
        </div>
        <div class="section">
            <h2>Description</h2>
            <p><?= $description  ?></p>
        </div>
    </div>

    <script>
        function vehicle_clicked() {
            console.log('clicked');
            fetch("/", {
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                }
            })
        }
    </script>

</div>