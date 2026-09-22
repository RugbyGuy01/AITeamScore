<?php
header('Content-Type: application/json');

$email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
if (!$email) {
    http_response_code(400);
    echo json_encode(['error' => 'Please enter a valid email address.']);
    exit;
}

$dataDir = __DIR__ . '/data';
if (!is_dir($dataDir)) {
    mkdir($dataDir, 0755, true);
}
$dataFile = $dataDir . '/verifications.json';

$token = bin2hex(random_bytes(32));

$fp = fopen($dataFile, 'c+');
flock($fp, LOCK_EX);
$contents = stream_get_contents($fp);
$records = $contents ? json_decode($contents, true) : [];
if (!is_array($records)) {
    $records = [];
}
$records[] = [
    'email' => $email,
    'token' => $token,
    'created' => time(),
    'expires' => time() + 86400,
    'verified' => false,
];
ftruncate($fp, 0);
rewind($fp);
fwrite($fp, json_encode($records));
flock($fp, LOCK_UN);
fclose($fp);

$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$verifyUrl = $scheme . '://' . $_SERVER['HTTP_HOST'] . '/verify.php?token=' . $token;

$subject = 'Verify your email to download Team Score';
$message = "Click the link below to verify your email and download Team Score for Android:\n\n"
    . $verifyUrl . "\n\nThis link expires in 24 hours.\n\nIf you didn't request this, you can ignore this email.";
$headers = "From: no-reply@golfpvcc.com\r\nContent-Type: text/plain; charset=UTF-8";

if (!mail($email, $subject, $message, $headers)) {
    http_response_code(500);
    echo json_encode(['error' => 'Could not send the verification email. Please try again later.']);
    exit;
}

echo json_encode(['ok' => true]);
