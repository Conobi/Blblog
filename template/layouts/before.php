<?php
  global $page, $config;
  if(substr($page['cover'], 0, 3) == "../") {
    $page['cover'] = $config['base_url'].'/'.substr($page['cover'], 3);
  }
?>
<!DOCTYPE html>
<html lang="<?= substr($config['language'], 0, 2) ?>" prefix="og: http://ogp.me/ns#">
  <head>
    <title><?= $page['title'] ?></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="refresh" content="900">
    <!--Import Google Fonts-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?= $config['base_url'] ?>/assets/css/materialize.min.css"  media="screen,projection"/>
    <!--Favicons-->
    <link rel="icon" type="image/png" href="<?= $config['base_url'] ?>/assets/img/meta/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= $config['base_url'] ?>/assets/img/meta/favicon-16x16.png" sizes="16x16" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link type="text/css" rel="stylesheet" href="<?= $config['base_url'] ?>/assets/css/custom.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?= $config['base_url'] ?>/assets/css/fonts.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?= $config['base_url'] ?>/assets/css/colors.php"  media="screen,projection"/>
    <!-- SEO things -->
    <meta name="application-name" content="<?= $config['short_blog_name'] ?>">
    <meta name="description" content="<?= $config['blog_desc'] ?>">
    <meta name="robots" content="noodp">
    <meta property="og:locale" content="<?= $config['language'] ?>">
    <meta property="og:type" content="<?= $page['type'] ?>">
    <meta property="og:title" content="<?= $page['title'] ?>">
    <meta property="og:description" content="<?= $page['desc'] ?>">
    <meta property="og:url" content="<?= (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
    <meta property="og:site_name" content="<?= $config['short_blog_name'] ?>">
    <meta property="og:image" content="<?= $page['cover'] ?>">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="<?= $page['desc'] ?>">
    <meta name="twitter:title" content="<?= $page['title'] ?>">
    <meta name="twitter:image" content="<?= $page['cover'] ?>">
    <?php if(isset($GLOBALS['art_info'])): global $art_info; ?>
    <meta name="author" content="<?= $art_info['author'] ?>">
    <meta property="article:modified_time" content="<?= date('c', $art_info['timestamp']) ?>">
    <meta property="og:updated_time" content="<?= date('c', $art_info['timestamp']) ?>">
  <?php endif; ?>
  </head>
<body>
