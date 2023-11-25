<div>
    <style>
        @keyframes slideIn {
            from {
                transform: translateY(-200%);
            }

            to {
                transform: translateY(0);
            }
        }

        @keyframes slideOut {
            from {
                transform: translateY(0);
            }

            to {
                transform: translateY(-200%);
            }
        }

        .message-box {
            animation: slideIn 0.50s ease-in-out, slideOut 0.50s ease-in-out 2s forwards;
        }
    </style>
    <div class="position-absolute top-0 start-50 translate-middle-x">
        <div id="message-box" class="message-box bg-primary text-white p-4 rounded shadow">
            <?= $message ?>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var messageBox = document.getElementById("message-box");

                // Remove the 'show' class to trigger the fade-out transition
                setTimeout(function() {
                    messageBox.classList.remove("show");
                }, 1000);
            });
        </script>
    </div>
</div>