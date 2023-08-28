<?php
// Establish a database connection
$mysqli = new mysqli("localhost", "root", "", "ecommerce_db");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$confirmationMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user already exists
    $checkQuery = "SELECT id FROM users WHERE email = ?";
    $checkStmt = $mysqli->prepare($checkQuery);
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        // Account already exists, show password change message
        $confirmationMessage = "Account already exists. Do you want to change/update your password?";
        $changePasswordLink = '<p>Click <a href="reset_password.html">here</a> to change/update your password.</p>';
    } else {
        // Account does not exist, insert new user
        $verificationToken = bin2hex(random_bytes(16));
        $insertStmt = $mysqli->prepare("INSERT INTO users (first_name, last_name, email, password, verification_token) VALUES (?, ?, ?, ?, ?)");
        $insertStmt->bind_param("sssss", $fname, $lname, $email, $password, $verificationToken);

        if ($insertStmt->execute()) {
            // Send verification email
            $to = $email;
            $subject = "Welcome to Watchcart - Email Verification";
            $headers = "From: neelanjanchakraborty231@gmail.com\r\n"; // Change this to your email address
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n"; // Set the content type as HTML

            // Include the email template
            ob_start(); // Start output buffering to capture the template content
            include("res/php/email_template.php");
            $emailContent = ob_get_clean(); // Get the buffered content and clean the buffer

            mail($to, $subject, $emailContent, $headers);

            $confirmationMessage = "Account created successfully! An email verification link has been sent to your email address.";
        } else {
            $confirmationMessage = "Error creating account. Please try again later.";
        }

        $insertStmt->close();
    }

    $checkStmt->close();
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Confirmation</title>
    <link rel="stylesheet" href="http://localhost/smartwatch/res/css/accountconfirmation.css"> <!-- Use the confirmation page stylesheet -->
</head>
<body>
    <div class="container">
        <div class="signup-box">
            <?php if (isset($changePasswordLink)) : ?>
                <h1>Change Password</h1>
            <?php else : ?>
                <h1>Account Created</h1>
            <?php endif; ?>

            <p><?php echo $confirmationMessage; ?></p>
            <?php if (isset($changePasswordLink)) {
                echo $changePasswordLink;
            } else {
                echo '<p>Click <a href="login.html">here</a> to login.</p>';
            } ?>
            <?php if (isset($changePasswordLink)) : ?>
            <p>Password Reset email sent: <a href="#">dummy link</a></p>
            <?php else : ?>
            <p>Verification email sent check your Inbox</p>
                        <?php endif; ?>

        </div>
    </div>
</body>
</html>