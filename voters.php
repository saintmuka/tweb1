<?php
$file = 'votes.json';
if (!file_exists($file)) {
  echo 'Голосов ещё нет.';
  exit;
}

$votes = json_decode(file_get_contents($file), true);
echo "<h3>Проголосовавшие:</h3><ul>";

foreach ($votes as $vote) {
  echo "<li>{$vote['name']} ({$vote['email']}) — {$vote['option']} [{$vote['time']}]</li>";
}

echo "</ul>";
