<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = strip_tags(trim($_POST['name']));
  $email = trim($_POST['email']);
  $option = $_POST['option'];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '❌ Неверный формат email.';
    exit;
  }

  $data = [
    'name' => $name,
    'email' => $email,
    'option' => $option,
    'time' => date('Y-m-d H:i:s')
  ];

  $file = 'votes.json';
  $votes = [];

  if (file_exists($file)) {
    $votes = json_decode(file_get_contents($file), true);
  }

  $votes[] = $data;

  file_put_contents($file, json_encode($votes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

  echo "✅ Спасибо за голос, $name!";
}
