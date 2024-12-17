<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .success-container {
            text-align: center;
            padding: 2rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
        }

        .success-container h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 1.5rem;
        }

        .back-link {
            display: inline-block;
            color: #4a68e9;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .back-link:hover {
            color: #2a41b5;
            text-decoration: underline;
        }

        /* Optional: Add a success icon */
        .success-icon {
            width: 64px;
            height: 64px;
            margin-bottom: 1rem;
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <svg class="success-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <h1>Order Placed Successfully</h1>
        <a href="../index.php">Back To Shopping</a>
    </div>
</body>
</html>