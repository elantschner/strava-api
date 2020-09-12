<?php
    // Set token
    if (isset($_COOKIE["access_token"])) {
        $access_token = $_COOKIE["access_token"];
    } else {
        header("Location: api/v3/auth.php");
    }
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strava</title>
</head>
<body>
    <ul>
        <li><a href="api/v3/athlete.php">ATHLETE</a></li>
        <li><a href="api/v3/activities.php">ACTIVITIES</a></li>
    </ul>
</body>
</html>