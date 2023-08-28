<?php
$verificationLink = "http://localhost/smartwatch/verify.php?token={$verificationToken}";
$fname // Replace with user's first name
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        /* Global styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Container styles */
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        /* Header styles */
        .header {
            background: linear-gradient(to bottom, #007BFF, #FFC107, #4CAF50);
            border-radius: 10px 10px 0 0;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            color: #fff;
            font-size: 24px;
        }

        /* Content styles */
        .content {
            padding: 20px;
            color: #333;
        }

        .content p {
            margin: 0 0 10px;
            line-height: 1.5;
        }

        .content a {
            color: #007BFF;
            text-decoration: none;
        }

        /* Footer styles */
        .footer {
            background-color: #FFC107;
            border-radius: 0 0 10px 10px;
            padding: 10px;
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to Watchcart, <?php echo $fname; ?>!</h1>
        </div>
        <div class="content">
            <p>Thanks for registering with us. Here is your verification link:</p>
            <p><a href="<?php echo $verificationLink; ?>">Verify Your Email Address</a></p>
            <p>With Watchcart, you're just a step away from accessing amazing deals on your favorite products.</p>
            <p>Get ready to explore a world of top-notch wristwatches at unbeatable prices.</p>
        </div>
        <div class="footer">
            <p>If you didn't sign up for an account, you can safely ignore this email.</p>
            <p>&copy; <?php echo date('Y'); ?> Watchcart. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
