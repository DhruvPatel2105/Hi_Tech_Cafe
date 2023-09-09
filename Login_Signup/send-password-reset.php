<?php

$email = $_POST["email"];

// random_bytes generate 16th length random char which goes in URL 
// and it will return the unprintable char.
// so bin2hex convert to hexadecimal string
$token = bin2hex(random_bytes(16));


// convert to hash using the sha256 algorithm
$token_hash = hash("sha256", $token);

// token time will be valid till 15 minutes 60 is a Seconds and 15 is minutes
$expiry = date("Y-m-d H:i:s", time() + 60 * 15);


require '../connection.php';
$conn = Connect();

$sql = "UPDATE customer
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();


if ($conn->affected_rows) {

    $mail = require '../mailer.php';

    $mail->setFrom("noreply@example.com");
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";



    $mail->Body = <<<END

    Click <a href="http://localhost/Hi_tech_cafe_class/Login_Signup/reset-password.php?token=$token">here</a> 
    to reset your password.

    END;
    
    try {

        $mail->send();

    } catch (Exception $e) {

        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";

    }

}

echo "Message sent, please check your inbox.";