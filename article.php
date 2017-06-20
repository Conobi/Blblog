<?php
include 'includes/Helpers.php';

if(isset($_GET['a'])) {
  $art_name = str_replace('/article/', '', $_GET['a']);
  if(file_exists('articles/'.$art_name.'.md')) {
    $article = file_get_contents('articles/'.$art_name.'.md');
    //On supprime les premières lignes
    $article = explode("---", $article,2)[1];
    //On met en place le parser
    $article = mdParser($article);
    //On met le bon titre
    $art_info = artInfo($art_name.'.md');
    $app_title = $art_info['title'].' • '. $config['short_blog_name'];
    $page = array(
      'title' => $art_info['title'].' • '. $config['short_blog_name'],
      'desc' => $art_info['desc'],
      'type' => 'article',
    );
    if(isset($art_info['cover'])) {
      $page['cover'] = $art_info['cover'];
    } else {
      $page['cover'] = '../assets/img/static/bg.jpg';
    }
    //On peut lancer la vue
    view('article.php');
  } else {
    trigger_error($lang['no_article_found']);
  }
} else {
  redirect($config['base_url']);
}
