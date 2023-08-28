<?php
// Establish a database connection
$mysqli = new mysqli("localhost", "root", "", "ecommerce_db");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$token = $_GET['token'];

// Check if the token is valid
$checkTokenQuery = "SELECT id FROM users WHERE verification_token = ?";
$checkTokenStmt = $mysqli->prepare($checkTokenQuery);
$checkTokenStmt->bind_param("s", $token);
$checkTokenStmt->execute();
$checkTokenResult = $checkTokenStmt->get_result();

if ($checkTokenResult->num_rows > 0) {
    $userId = $checkTokenResult->fetch_assoc()['id'];
    $updateQuery = "UPDATE users SET is_verified = 1, verification_token = NULL WHERE id = ?";
    $updateStmt = $mysqli->prepare($updateQuery);
    $updateStmt->bind_param("i", $userId);
    $updateStmt->execute();
    $updateStmt->close();

    $verificationStatus = "Your account has been successfully verified.";
} else {
    $verificationStatus = "Invalid verification token.";
}

$checkTokenStmt->close();
$mysqli->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .verification-box {
            background-color: #007BFF;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .verification-box h1 {
            margin-top: 0;
        }
        .login-button {
            background-color: #FFC107;
            color: #333;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="verification-box">
        <h1>Email Verified!</h1>
        <p><?php echo $verificationStatus; ?></p>
        <?php if ($verificationStatus === "Your account has been successfully verified.") : ?>
            <a href="login.html" class="login-button">Login</a>
        <?php endif; ?>
    </div>
</body>
</html>
