<?php
session_start();

// Destroy all session data
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            text-align: center;
            padding-top: 100px;
        }
        .box {
            background: white;
            width: 400px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        a {
            text-decoration: none;
            font-weight: bold;
            color: #2c3e50;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>You have been logged out successfully!</h2>
    <p>Thank you for visiting our site.</p>
    <br>
    <a href="../../admin/login.php">Click here to Login Again</a>
</div>

</body>
</html>
