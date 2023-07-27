<?php

if (isset($_POST['submit'])) {
if (empty($_POST['mail'])) {
$error = "Please Enter Mail";
}else
{
$userMail=$_POST['mail'];

require '../connection.php';
$conn = Connect();

// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT email FROM CUSTOMER WHERE email=? LIMIT 1";

// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt -> bind_param("s", $userMail);
$stmt -> execute();
$stmt -> bind_result($userMail);
$stmt -> store_result();


if ($stmt->fetch()){
header("location:customerlogin.php?user_mail=$userMail"); // Redirecting customerlogin page with the userMail id
} else {
header("location:customersignup.php?user_mail=$userMail"); //Redirecting To CustomerSignup page with the userMail id
}
mysqli_close($conn); // Closing Connection
}
}
?>