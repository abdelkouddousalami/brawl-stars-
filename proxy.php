<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit();
}

$apiKey = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjBlNDFkZWM4LWMzZGQtNDRhMS04ZGQ1LWNiMzQ3YjczNGM2MyIsImlhdCI6MTc1MDU5MjU0OCwic3ViIjoiZGV2ZWxvcGVyLzE4NzViYmJiLTJmNWEtYTA4Mi04M2VmLTRiYzMyMmM2OGQ3YiIsInNjb3BlcyI6WyJicmF3bHN0YXJzIl0sImxpbWl0cyI6W3sidGllciI6ImRldmVsb3Blci9zaWx2ZXIiLCJ0eXBlIjoidGhyb3R0bGluZyJ9LHsiY2lkcnMiOlsiMzQuNjMuMTc3LjI0MyJdLCJ0eXBlIjoiY2xpZW50In1dfQ.eBvlPZ-FDfE04Y5prOwWXVP_kN2BXYlPU2XkMhOA209xq6P8Uv2EvM__HGfT4UcRtnhq0g8OftbJEm55YJGx0w';

if (isset($_GET['player_id'])) {
    $playerId = str_replace('#', '', $_GET['player_id']);
    $url = "https://api.brawlstars.com/v1/players/%23" . $playerId;    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  // Disable SSL verification for local development
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);      // Disable hostname verification for local development
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer ' . $apiKey,
        'Accept: application/json'
    ));
      $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
      if ($error) {
        http_response_code(500);
        echo json_encode([
            'error' => 'Failed to connect to Brawl Stars API',
            'details' => $error,
            'help' => 'The API key is restricted to IP address 105.154.205.165. Your request must come from this IP address.'
        ]);
        exit;
    }

    if ($httpCode !== 200) {
        http_response_code($httpCode);
        $errorMsg = 'Failed to find player';
        if ($response) {
            $decoded = json_decode($response, true);
            $errorMsg = $decoded['message'] ?? $errorMsg;
        }
        echo json_encode(['error' => $errorMsg]);
        exit;
    }

    // Verify we have valid JSON before sending
    $decoded = json_decode($response, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        http_response_code(500);
        echo json_encode(['error' => 'Invalid response from Brawl Stars API']);
        exit;
    }

    http_response_code(200);
    echo $response;
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Player ID is required']);
}
