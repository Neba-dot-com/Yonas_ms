<!DOCTYPE html>
<html>
<head>
    <title>Payment Processing</title>
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

        .payment-container {
            max-width: 400px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .processing-text {
            font-size: 28px;
            margin-bottom: 20px;
            color: #3498db;
        }

        .medical-icon {
            width: 80px;
            margin-bottom: 20px;
        }

        .loader {
            border: 6px solid #f3f3f3;
            border-top: 6px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
            margin-bottom: 20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <img src="medical-icon.png" alt="Medical Icon" class="medical-icon">
        <h1 class="processing-text">Payment Processing</h1>
        <div class="loader"></div>
        <p>Please wait while we process your payment...</p>
    </div>

    <!-- JavaScript to simulate payment processing -->
    <script>
        // Simulating a delay for payment processing
        setTimeout(function() {
            // Simulated payment success
            // Replace "success-page.html" with the URL of the page you want to redirect to after successful payment
            window.location.href = "congratulation.php";
            
            // Simulated payment failure
            // Replace "failure-page.html" with the URL of the page you want to redirect to if the payment fails
            // window.location.href = "failure-page.html";
        }, 3000); // Simulated delay of 3 seconds (adjust this as needed)
    </script>
</body>
</html>
