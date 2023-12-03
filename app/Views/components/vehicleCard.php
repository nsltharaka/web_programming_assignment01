<a href="vehicle/show/<?= $vehicle_number ?>" style="text-decoration: none; color: black;">
    <div class="vehicle-card">

        <div class="vehicle-card--image-container">
            <img src="/images/cars/<?= $image_url ?>" alt="">
        </div>

        <div class="vehicle-card--description">
            <h2 class="section"><?= "{$brand} {$model}" ?></h2>
            <p class="section">LKR <?= number_format($daily_rate, 2) ?> per day</p>
            <div class="vehicle-card--description-grid section">
                <div class="grid-item">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsTAAALEwEAmpwYAAABE0lEQVR4nN3WoUpEQRSH8R+CggiuLgbDgiIm63bBILJY9QE0+gJi1GDxCWxaTBbBZBDEbDCathiMFpuoDEyQy4Le3csc8YN/nHO+e2funcM/Yx6diMaTuMQHPnGLdkmBw9z4e85KCtwNEOiXFLgYIJCkirFeaf6G1ZIC3YpAT2EWcIUXPAhiA8uYihJ4xkFU807e+7UogS28YzpK4ASPArnHaVTz8fzj2Y0S6OYDuBIlsIdXjEUJnONGIE84imrezlPQZpRALwvMRQns4LrUt75dM2lNY8wMGLl+SlozMi3M5sO2VDPtvDbVGJr+EE/e6HR8nC+ZUZJq1KaF/YZTaysWG3j11aSav2Yi33JNJtX8e3wB+rmAHsj1GUoAAAAASUVORK5CYII=">
                    <p><?= $transmission_type  ?></p>
                </div>
                <div class="grid-item">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsTAAALEwEAmpwYAAACBElEQVR4nMXWTYhPURjH8Y/394VMBllMskNZTF6SskDyUijKSsmGnZXyMmU5Gxss2MhmLISFUiLJ2JliapCIIlJKkWYwmdGtR91O9/J/uf/5f+ss7jn3Pr9f9znneQ6t5zAG8BvjBaNlTMPVnNBXfCkYTTGzZH4qroXwe2xUMd0YDIHX2BO/+gimYwfG8A7LqhZfj28l+czGHczCoVaIr4tclonnTWRpqJTO2DTjNY7dVRvYUod4NrZVfaRm41k7DCyIQrIdi/GiRgNvqxJ/EgFHsLVOEx3NiM/H4yTgD+yMDTlUg4E1zYgPlAStx8SBRsQ78DQJ9B3HsAL9GK4xHacbER9MgmRVb0Os/y2xe3GjBhOXqxTPuI2+XCO6FSYWlZjoVQcXko9HE/GsFvxKKtyuXDpSEx9jrmZ6EwNvMCm3vjTmV8VzXnA4KuVCXMSVehvRZszDo8TE2eS9fZgc4s+Td49rkLVxXToYJvr/Y6KzQPyUJrgUQU7E81w8TATOYQaWF/SDuo9ayssI1JWbKzLxs2CX96iAkQie5TZP1v3u/6PIVCIuqtxo3OVS5uBeIjzWbM5ThiLwypL1KTgalS+rbJtUzPkwcFKb6A4Dn6MLtoXrYeJmwWacEJbgQ5joi3v9hLMan8LEK+wvORktpQsPckfuzEQbyMg6YHbhuBt9oqX8AecEEoabY8jgAAAAAElFTkSuQmCC">
                    <p><?= $fuel_type  ?></p>
                </div>
                <div class="grid-item">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsTAAALEwEAmpwYAAABO0lEQVR4nM3XvUoDURCG4TdEAoIiaQPWgndgCgXtYhMFGy/AQsXKNFpKCPEOJFegldhZ25haRLSy085GxLD4w4EpQtBZzZwzyQdTLcs85489C2OeSWAF2ABqQMWz+QxwA3z1VQa0gYIHYGegeX+FZ8mzrwBuPQA1BfAJlFMDKgog1CIOeVYAux6ASwXQ8QC0FUDXA7CpAN6AYmrAfM5G1KoHrFsBRRnpsIC1GLPQVZoc4ZATBXDhAdhWAI8egGrOWp8DZz/UMbAQAzAFfAy5EcN7jRiIB8NxzOQ4m3JqAITaswIOjICWFbA6asA08GoANImQQwOgHgNQALbkPpj9sfGLTH/0W/SS3AvfgTmcUwLuZYRhWdxTl+Z3ghkZ4OmXb8BghVtV1JSAq3+cgGsSZAJYlp/WvJpNAYiWb4RnGRG8EHZAAAAAAElFTkSuQmCC">
                    <p><?= $seats ?></p>
                </div>
            </div>
        </div>
    </div>
</a>