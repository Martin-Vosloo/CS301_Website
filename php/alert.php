<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Check if a session notification is set
if (isset($_SESSION['notification'])) {
    $notification = $_SESSION['notification'];
    echo "<div id='alert-box' class='alert {$notification['type']}'>";
    echo "<span>" . htmlspecialchars($notification['message']) . "</span>";
    echo "<button class='close-btn'>&times;</button>";
    echo "</div>";
    unset($_SESSION['notification']);
}
?>

<style>
    #alert-box.alert {
        position: fixed;
        top: 18px;
        left: 50%;
        width: min(480px, calc(100vw - 24px));
        padding: 14px 46px 14px 16px;
        border-radius: 14px;
        border: 1px solid transparent;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.12);
        z-index: 99999;
        opacity: 1;
        transform: translateX(-50%) translateY(0);
        transition: opacity 0.45s ease, transform 0.45s ease;
        backdrop-filter: blur(3px);
        font-weight: 500;
        letter-spacing: 0.1px;
        animation: alert-in 0.4s ease-out;
    }

    @keyframes alert-in {
        from {
            opacity: 0;
            transform: translateX(-50%) translateY(-18px);
        }
        to {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }
    }

    #alert-box.alert.fade-out {
        opacity: 0;
        transform: translateX(-50%) translateY(-26px);
    }

    #alert-box.alert.slide-up {
        display: none;
    }

    #alert-box.success {
        color: #0f5132;
        background: linear-gradient(135deg, #edf9f1 0%, #e5f4eb 100%);
        border-color: #c8e6d4;
    }

    #alert-box.error {
        color: #842029;
        background: linear-gradient(135deg, #fff1f1 0%, #fee8e8 100%);
        border-color: #f2cfd2;
    }

    #alert-box .close-btn {
        position: absolute;
        top: 50%;
        right: 12px;
        transform: translateY(-50%);
        width: 28px;
        height: 28px;
        border-radius: 50%;
        font-size: 20px;
        line-height: 1;
        color: inherit;
        background: rgba(255, 255, 255, 0.72);
        border: 1px solid rgba(15, 23, 42, 0.08);
        cursor: pointer;
        display: grid;
        place-items: center;
    }

    #alert-box .close-btn:hover {
        background: rgba(255, 255, 255, 0.92);
    }

    @media (max-width: 600px) {
        #alert-box.alert {
            top: 10px;
            padding: 12px 42px 12px 14px;
            font-size: 14px;
        }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const alertBox = document.getElementById("alert-box");
        if (alertBox) {
            setTimeout(() => {
                alertBox.classList.add("fade-out");
                setTimeout(() => {
                    alertBox.classList.add("slide-up");
                }, 600);
            }, 5000);

            const closeBtn = alertBox.querySelector(".close-btn");
            closeBtn.addEventListener("click", () => {
                alertBox.classList.add("fade-out");
                setTimeout(() => {
                    alertBox.classList.add("slide-up");
                }, 600);
            });
        }
    });
</script>