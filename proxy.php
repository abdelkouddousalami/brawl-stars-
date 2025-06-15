<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit();
}

$apiKey = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImIyN2IxNDFmLTE1ZTUtNDJiYy05YzJjLTRlN2Q0ZDMzNDkxNiIsImlhdCI6MTc1MDAxMDExMCwic3ViIjoiZGV2ZWxvcGVyLzE4NzViYmJiLTJmNWEtYTA4Mi04M2VmLTRiYzMyMmM2OGQ3YiIsInNjb3BlcyI6WyJicmF3bHN0YXJzIl0sImxpbWl0cyI6W3sidGllciI6ImRldmVsb3Blci9zaWx2ZXIiLCJ0eXBlIjoidGhyb3R0bGluZyJ9LHsiY2lkcnMiOlsiNDEuMTQxLjEwMy40MiJdLCJ0eXBlIjoiY2xpZW50In1dfQ.XS5WAdhSXNoeUQMSLHQLUmC16DS2FQUifM8AOKSH100oHqhzMuhGKrVTVNqHcB7Aio4KGT4UX48he5FLJwy2jQ';

if (isset($_GET['player_id'])) {
    $playerId = str_replace('#', '', $_GET['player_id']);
    $url = "https://api.brawlstars.com/v1/players/%23" . $playerId;
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer ' . $apiKey,
        'Accept: application/json'
    ));
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    http_response_code($httpCode);
    echo $response;
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Player ID is required']);
}
