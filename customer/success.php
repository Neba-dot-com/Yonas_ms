<!DOCTYPE html>
<html>
<head>
    <title>Payment Successful</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f9;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .success-container {
            max-width: 400px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .success-icon {
            width: 100px;
            margin-bottom: 20px;
        }

        .success-text {
            font-size: 28px;
            margin-bottom: 20px;
            color: #27ae60;
        }

        .description {
            font-size: 16px;
            color: #777;
            margin-bottom: 30px;
        }

        .back-button {
            padding: 10px 20px;
            background-color: #27ae60;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #1e8449;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <img src="success-icon.png" alt="Success Icon" class="success-icon">
        <h1 class="success-text">Payment Successful!</h1>
        <p class="description">Thank you for your purchase. Your payment was successfully processed.</p>
        <button class="back-button" onclick="goToHomePage()">Back to Home</button>
    </div>

    <!-- JavaScript to go back to the homepage -->
    <script>
        function goToHomePage() {
            // Replace "home-page.html" with the URL of your homepage or the desired landing page after successful payment
            window.location.href = "home-page.php";
        }
    </script>
</body>
</html>
