<div class="popup-container popup-container-visible">
    <div class="popup open-popup" id="popup">
        <img src="/images/icons/<?= ($messageType == "alert") ? "alert.png" : "ok.png" ?>">
        <h2 style="color:  <?= $messageType == "alert" ? "red" : "black" ?>"><?= $messageHeader ?></h2>
        <p style="color:  <?= $messageType == "alert" ? "red" : "black" ?>"><?= $message ?></p>
        <p></p>
        <button type="button" id="popupBtn">OK</button>
    </div>
</div>