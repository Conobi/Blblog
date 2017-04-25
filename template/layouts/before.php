<?php global $page, $config; ?>
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
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link type="text/css" rel="stylesheet" href="assets/css/custom.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="assets/css/fonts.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="assets/css/colors.php"  media="screen,projection"/>
    <!-- SEO things -->
    <meta name="application-name" content="<?= $config['short_blog_name'] ?>">
    <meta name="description" content="<?= $config['blog_desc'] ?>">
    <meta name="robots" content="noodp">
    <meta property="og:locale" content="<?= $config['language'] ?>">
    <meta property="og:type" content="<?= $page['type'] ?>">
    <meta property="og:title" content="<?= $page['title'] ?>">
    <meta property="og:description" content="<?= $page['desc'] ?>">
    <meta property="og:url" content="<?= $config['base_url'] //À TERMINER ! ?>">
    <meta property="og:site_name" content="<?= $config['short_blog_name'] ?>">
    <meta property="og:image" content="<?= $config['base_url'].$page['cover'] ?>">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="<?= $page['desc'] ?>">
    <meta name="twitter:title" content="<?= $page['title'] ?>">
    <meta name="twitter:image" content="<?= $config['base_url'].$page['cover'] ?>">
    <?php if(isset($GLOBALS['art_info'])): global $art_info; ?>
    <meta name="author" content="<?= $art_info['author'] ?>">
    <meta property="article:modified_time" content="<?= date('c', $art_info['timestamp']) ?>">
    <meta property="og:updated_time" content="<?= date('c', $art_info['timestamp']) ?>">
  <?php endif; ?>
  </head>
<body>