<!DOCTYPE html>
<html>
<head>
    <title>Payment Failed</title>
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

        .failure-container {
            max-width: 400px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .failure-icon {
            width: 100px;
            margin-bottom: 20px;
        }

        .failure-text {
            font-size: 28px;
            margin-bottom: 20px;
            color: #e74c3c;
        }

        .description {
            font-size: 16px;
            color: #777;
            margin-bottom: 30px;
        }

        .try-again-button {
            padding: 10px 20px;
            background-color: #e74c3c;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .try-again-button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="failure-container">
        <img src="failure-icon.png" alt="Failure Icon" class="failure-icon">
        <h1 class="failure-text">Payment Failed</h1>
        <p class="description">We're sorry, but there was an issue processing your payment.</p>
        <button class="try-again-button" onclick="tryAgain()">Try Again</button>
    </div>

    <!-- JavaScript to go back to the delivery details page and try again -->
    <script>
        function tryAgain() {
            // Replace "delivery-details-page.html" with the URL of the page where the user entered their delivery details
            window.location.href = "delivery-details-page.html";
        }
    </script>
</body>
</html>
