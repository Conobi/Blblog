<?php
include 'includes/Helpers.php';
$test_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if($test_url != $config['base_url'].'/' xor $test_url != $config['base_url'].'/index.php'){} else {
  $config['base_url'] = str_replace('/index.php', '/', $test_url);
  trigger_error($lang['url_not_configured']);
}

$art_array = array_slice(scandir('articles'), 2);
//On prend que les articles valides
$articles = artTrueArray($art_array);

//On associe ces articles à leurs valeurs
foreach ($articles as $key => $art) {
  $articles[$key] = artInfo($key);
}
//On les range par ordre décroissant, du plus récent au plus vieux
$articles = timeSort($articles);
//On affiche le bon titre
$page = array(
  'title' => $config['short_blog_name'].' • '. $config['complete_blog_name'],
  'desc' => $config['blog_desc'],
  'type' => 'website',
  'cover' => 'assets/img/static/bg.jpg'
);

view('index.php');
