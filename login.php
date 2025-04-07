<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = trim($_POST["email"]);
  $password = trim($_POST["password"]);


  $safeEmail = htmlspecialchars($email);
  $safePassword = htmlspecialchars($password);


  $hashedPassword = password_hash($safePassword, PASSWORD_DEFAULT);


  $file = fopen("users.json", "a");
  fwrite($file, "Email: $safeEmail | Password: $hashedPassword\n");
  fclose($file);

  echo "<body style='background-color:black; color:#d3d3d3; text-align:center; font-family:Arial'>";
  echo "<h1>Регистрация прошла успешно!</h1>";
  echo "<p>Данные сохранены.</p>";
  echo "<a href='index.html' style='color:#d3d3d3;'>Вернуться на главную</a>";
  echo "</body>";
} else {
  header("Location: index.html");
  exit();
}

