<?php
$option = $_POST['option'];
$valid = ['cross', 'shield'];

if (in_array($option, $valid)) {
  $file = "votes_$option.json";
  file_put_contents($file, "1\n", FILE_APPEND);
  echo "✅ Спасибо за ваш голос! Вы выбрали: " . ($option === 'cross' ? "Крест Тамплиеров" : "Щит с красным крестом");
}
?>
