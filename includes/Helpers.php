<?php
$config = include 'includes/Config.php';
$lang = include('includes/Languages.php');
$lang = $lang[$config['language']];
setlocale(LC_TIME, $config['language']);

$test_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if($test_url == $config['base_url'].'/' xor $test_url == $config['base_url'].'/index.php'){} else {
  $config['base_url'] = str_replace('/index.php', '/', $test_url);
  trigger_error($lang['url_not_configured']);
}

function beautify($string) {
  return htmlspecialchars(trim($string), ENT_QUOTES);
}

function artInfo($art) {
  $art = 'articles/'.$art;
  $art_parts = explode("---", file_get_contents($art));
  $art_header = $art_parts[0];
  //Retourne le timestamp de dernière modif, le titre, la description, et l'auteur en y rendant joli
  $lines = preg_split("/((\r?\n)|(\r\n?))/", $art_header);
  $i = 0;
  $n = count($lines) - 1;
  while($i < $n) {
    $line_result = explode(':', $lines[$i], 2);
    $art_info['timestamp'] = filectime($art);
    $art_info[$line_result[0]] = beautify($line_result[1]);
    $i++;
  }
  return $art_info;
}

function artTest($art) {
  $art = 'articles/'.$art;
  //On vérifie d'abord si le fichier existe et qu'il est en .md
  if(file_exists($art) && pathinfo($art)['extension'] == 'md') {
    $art_parts = explode("---", file_get_contents($art));
    //On vérifie que le délimiteur existe, et on récupère les éléments qui nous intéressent
    if(count($art_parts) > 1) {
      $art_header = $art_parts[0];
      //Récupère le contenu, ligne par ligne
      $lines = preg_split("/((\r?\n)|(\r\n?))/", $art_header);
      if(preg_match("#^title:#i", $lines[0]) == true && preg_match("#^desc:#i", $lines[1]) == true && preg_match("#^author:#i", $lines[2]) == true) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function artTrueArray($art_array) {
  $art_good = $art_array;
  foreach($art_array as $key => $art) {
    if(artTest($art) == false) {
      unset($art_good[$key]);
    } else {
      $art_good[$art] = true;
      unset($art_good[$key]);
    }
  }
  return $art_good;
}

function timeSort($array) {
  $time = array();
  foreach ($array as $key => $value) {
    $time[$key] = $value['timestamp'];
  }
  array_multisort($time, SORT_DESC, $array);
  return $array;
}

function errorHandler($errno, $errstr, $errfile, $errline) {
  global $config, $lang;
  $page = array(
    'title' => $errstr .' • '. $config['short_blog_name'],
    'desc' => $config['blog_desc'],
    'type' => 'error',
    'cover' => 'assets/img/meta/cover.jpg'
  );
  $GLOBALS['page'] = $page;
  $GLOBALS['config'] = $config;
  include_once('template/layouts/before.php');
  include_once('template/pages/error.php');
  include_once('template/layouts/after.php');
  die();
}

set_error_handler("errorHandler");

function view($include) {
  include_once('template/layouts/before.php');
  include_once('template/pages/'.$include);
  include_once('template/layouts/after.php');
}

function redirect($url) {
  header('Location: '.$url);
}

function mdParser($string) {
  include 'includes/Parsedown.php';
  $Parsedown = new Parsedown();
  //Règles persos
  $string = str_replace('- [ ]', '<input type="checkbox" class="task-list-item-checkbox" disabled>', $string);
  $string = str_replace('[ ]', '<input type="checkbox" class="task-list-item-checkbox" disabled>', $string);
  $string = str_ireplace('- [x]', '<input type="checkbox" class="task-list-item-checkbox" checked disabled>', $string);
  $string = str_ireplace('[x]', '<input type="checkbox" class="task-list-item-checkbox" checked disabled>', $string);
  $string = $Parsedown->setBreaksEnabled(true)->text($string);
  return $string;
}
