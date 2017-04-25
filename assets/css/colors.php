<?php
  $config = include '../../includes/Config.php';
  header('content-type: text/css');
?>

.index-header .parallax {
  background-color: <?= $config['main_color'] ?>;
}

.index-thumbs:nth-child(4n+1) {
  background-color: <?= $config['main_color'] ?>;
}

.index-thumbs:nth-child(4n+2) {
  background-color: <?= $config['accent_color'] ?>;
}

.index-thumbs:nth-child(4n+3) {
  background-color: <?= $config['third_color'] ?>;
}

.index-thumbs:nth-child(4n+4) {
  background-color: <?= $config['fourth_color'] ?>;
}
