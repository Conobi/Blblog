<?php global $articles, $config; ?>
<div class="index-header parallax-container valign-wrapper">
  <div class="section no-pad-bot">
    <h1 class="header center white-text"><?= $config['complete_blog_name'] ?></h1>
    <h5 class="header col s12 light center-align blue-grey-text text-lighten-4"><?= $config['blog_desc'] ?></h5>
  </div>
  <div class="parallax"><img src="assets/img/static/bg.jpg"></div>
</div>
<div class="index-main">
  <?php foreach ($articles as $key => $art) : ?>
  <a href='article/<?=substr($key, 0, -3)?>' class="waves-effect waves-light index-thumbs"<?php if(isset($art['cover'])) { echo(' style="background: url(\''.htmlspecialchars_decode($art['cover'], ENT_QUOTES).'\') center;"');} ?>>
    <div class="thumbs-desc">
      <h1><?=$art['title']?></h1>
      <address>
        <span class="date"><?=date("d M", $art['timestamp'])?></span>
        <p class="author truncate"><?=$art['author']?></p>
      </address>
      <p class="index-art-desc">
        <?=$art['desc']?>
      </p>
    </div>
  </a>
  <?php endforeach; ?>
</div>
