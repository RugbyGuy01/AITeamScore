<?php
$token = $_GET['token'] ?? '';
$dataFile = __DIR__ . '/data/verifications.json';
$records = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];
if (!is_array($records)) {
    $records = [];
}

$found = null;
foreach ($records as &$record) {
    if (hash_equals($record['token'], $token)) {
        $found = &$record;
        break;
    }
}
unset($record);

if (!$found || $found['expires'] < time()) {
    http_response_code(400);
    ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Link expired — Team Score</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="wrap" style="text-align:center; padding:80px 24px;">
  <h1>This link is invalid or has expired</h1>
  <p>Please go back to the site and request a new download link.</p>
  <a class="btn" href="index.html">Back to Team Score</a>
</div>
</body>
</html>
    <?php
    exit;
}

$found['verified'] = true;
file_put_contents($dataFile, json_encode($records));

header('Location: downloads/TeamScore.apk');
exit;
