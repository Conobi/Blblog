<?php
include 'includes/Helpers.php';

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
  'title' => $config['short_blog_name'].' • '. $config['blog_desc'],
  'desc' => $config['blog_desc'],
  'type' => 'website',
  'cover' => 'assets/img/static/bg.jpg'
);

view('index.php');
