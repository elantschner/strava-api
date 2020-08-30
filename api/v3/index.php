<?php
    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST'){
        // Event Data
        file_put_contents("log/post_request.json", file_get_contents('php://input'));
    } elseif ($method == 'GET'){
        // Subscription Validation Request
        file_put_contents("log/get_request.json", json_encode($_GET));
        // Callback Validation
        header("HTTP/1.1 200 OK");
        header('Content-type: application/json');
        echo ('{"hub.challenge" : "'.$_GET['hub_challenge'].'"}');
    }
?>