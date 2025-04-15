<?php
$file = 'votes.json';
if (!file_exists($file)) {
  echo 'Пока никто не голосовал.';
  exit;
}

$votes = json_decode(file_get_contents($file), true);
$counts = [
  'Крест Тамплиеров' => 0,
  'Щит с красным крестом' => 0
];

foreach ($votes as $vote) {
  if (isset($counts[$vote['option']])) {
    $counts[$vote['option']]++;
  }
}

echo "<h3>Результаты голосования:</h3>";
foreach ($counts as $option => $count) {
  echo "$option: $count голос(ов)<br>";
}
