<?php
    // Set token
    if (isset($_COOKIE["access_token"])) {
        $access_token = $_COOKIE["access_token"];
    } else {
        header('HTTP/1.1 401 Unauthorized', true, 401);
        die("Unauthorized");
    }

    $id = $_GET['id'];

    // Set Headers
    $headers = array(
        'Authorization: Bearer '.$access_token,
        'Accept: application/json',
    );

    // Get cURL resource
    $curl = curl_init();
    
	// Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://www.strava.com/api/v3/activities/'.$id,
        CURLOPT_HTTPHEADER => $headers,
    ]);
    
	// Send the request & save response to $result
    $result = curl_exec($curl);

    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	
    $data = json_decode($result, true);
    
	// Close request to clear up some resources
    curl_close($curl);
	
	// Send data JSON
	header('Content-type: application/json');
	die(json_encode($data));
?>   