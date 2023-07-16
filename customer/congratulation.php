<!DOCTYPE html>
<html>
<head>
    <title>Order Success</title>
    <style>
        /* CSS styles for the success message */
        .success-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .success {
            text-align: center;
        }

        .icon {
            font-size: 48px;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .email-msg {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .description {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .email {
    color: blue;
    text-decoration: none;
    border-bottom: none; /* Remove underline */
}


        .btn {
            font-size: 18px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* CSS styles for the fireworks animation */
        #fireworks {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
        }
    </style>
</head>
<body>
    <div class="success-wrapper">
        <div class="success">
            <p class="icon">
                <i class="fas fa-check-circle"></i>
            </p>
            <h2>Thank you for your order</h2>
            <p class="email-msg">Check your email inbox for the receipt</p>
            <p class="description">If you have any questions, please email
                <a class="email" href="mailto:nebamami@gmail.com">nebamami@gmail.com</a>
            </p>
            <a style ="text-decoration: none;" href="shop.php" class="btn">Continue Shopping</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <script>
        // Function to trigger the fireworks animation
        function runFireworks() {
            var duration = 5 * 1000;
            var animationEnd = Date.now() + duration;
            var defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

            function randomInRange(min, max) {
                return Math.random() * (max - min) + min;
            }

            function createFirework() {
                confetti({
                    particleCount: 100,
                    startVelocity: randomInRange(30, 50),
                    spread: randomInRange(60, 120),
                    origin: {
                        x: Math.random(),
                        y: Math.random() - 0.2
                    },
                    colors: ['#ff0000', '#00ff00', '#0000ff']
                });
            }

            var interval = setInterval(function () {
                var timeLeft = animationEnd - Date.now();

                if (timeLeft <= 0) {
                    clearInterval(interval);
                }

                createFirework();
            }, 200);
        }

        runFireworks();
    </script>
</body>
</html>
