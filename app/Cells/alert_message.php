<div class="popup-container popup-container-visible">
    <div class="popup open-popup" id="popup">
        <img src="/images/icons/<?= ($messageType == "alert") ? "alert.png" : "ok.png" ?>">
        <h2><?= $messageHeader ?></h2>
        <p><?= $message ?></p>
        <p></p>
        <button type="button" onclick="closePopup()">OK</button>

        <script>
            let popup = document.getElementById("popup");
            let popup_container = document.querySelector(".popup-container");
            popup.addEventListener('click', () => {
                popup.classList.toggle("open-popup");
                popup_container.classList.toggle("popup-container-visible");
            })
        </script>
    </div>
</div>