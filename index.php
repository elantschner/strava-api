<?php
    // Set token
    if (isset($_COOKIE["authorization"])) {
        $data = json_decode($_COOKIE["authorization"], true);
        $access_token = $data["access_token"];
    } else {
        header("Location: api/v3/auth.php");
    }
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strava</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css">
</head>
<body>
    <h1>My STRAVA-App</h1>
    <ul>
        <li><a href="api/v3/athlete.php">ATHLETE</a></li>
        <li><a href="api/v3/activities.php">ACTIVITIES</a></li>
    </ul>

    <div>
        <?php
            echo "<h2>".$data["athlete"]["firstname"]." ".$data["athlete"]["lastname"]."</h2>";
            echo "<p><img src=".$data["athlete"]["profile"]." style='border-radius:50%'></p>";
            echo "<p>access_token : ".$data["access_token"]."</p>";
            echo "<pre>";
            var_dump($data);
            echo "</pre>"
        ?>   
    </div> 
    
</body>
</html>