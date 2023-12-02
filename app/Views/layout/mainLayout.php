<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/main.css">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <title>Home</title>
</head>

<body>

    <nav class="navbar">
        <div class="navbar--main-logo">
            <img src="/images/logo.png" alt="">
        </div>
        <ul class="navbar--list">
            <li><a href="/">Home</a></li>
            <li><a href="/vehicle">Vehicles</a></li>
            <li><a href="">about</a></li>
        </ul>

        <?php if (session('user')) { ?>

            <div class="navbar--form greet">
                <span>Hello, <?= session('user')['first_name']  ?></span>
                <img src="/images/user_icon.png" alt="">

                <div class="navbar--context-menu">
                    <a class="navbar--context-menu-link" href="/user/profile">my profile</a>
                    <a class="navbar--context-menu-link" href="/user/logout">log out</a>
                </div>
            </div>

        <?php } else { ?>

            <div class="navbar--form">
                <ul class="navbar--list">
                    <li><a href="/user">login</a></li>
                </ul>
            </div>

        <?php } ?>
    </nav>

    <main class="main">
        <?= $this->renderSection('content'); ?>
    </main>

    <script>
        const navButtons = document.querySelectorAll('.layout-navigation-button')

        navButtons.forEach(element => {
            element.addEventListener('click', () => {
                document.querySelectorAll('.layout-navigation-button')
                    .forEach(element => element.classList.remove("layout-navigation-button-active"))

                element.classList.add("layout-navigation-button-active")
            })
        })

        function previewImage() {
            const input = document.getElementById('imageInput');
            const preview = document.getElementById('vehicleImage');

            const file = input.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        }

        let popup = document.getElementById("popupBtn");
        let popup_container = document.querySelector(".popup-container");
        popup.addEventListener('click', () => {
            popup.classList.toggle("open-popup");
            popup_container.classList.toggle("popup-container-visible");
        })
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
</body>

</html>