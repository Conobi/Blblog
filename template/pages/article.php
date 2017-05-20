<?php global $article, $art_info, $config, $lang; ?>
<?php if(isset($art_info['cover'])): ?>
  <header class="cover-header parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <h1 class="center white-text"><?= $art_info['title'] ?></h1>
      <address class="col s12 light center-align blue-grey-text text-lighten-4"><?= $art_info['author'].' • '.strftime("%d %B %Y", $art_info['timestamp']) ?></address>
    </div>
    <div class="parallax"><img src="<?= $config['base_url'].$art_info['cover'] ?>"></div>
  </header>
  <div class="container row">
    <div class="col s12 m8 offset-m2 article-main">
      <article>
        <?= $article ?>
        <br>
      </article>
      <div class="article-bottom">
        <a class="button" href="<?= $config['base_url'] ?>"><i class="material-icons">home</i> <?= $lang['home'] ?></a>
      </div>
    </div>
  </div>
<?php else: ?>
  <div class="container row">
    <div class="col s12 m8 offset-m2 article-main">
      <header class="raw-header">
        <h1><?= $art_info['title'] ?></h1>
        <address><?= $art_info['author'].' • '.strftime("%d %B %Y", $art_info['timestamp']) ?></address>
      </header>
      <article>
        <?= $article ?>
        <br>
      </article>
      <div class="article-bottom">
        <a class="button" href="<?= $config['base_url'] ?>"><i class="material-icons">home</i> <?= $lang['home'] ?></a>
      </div>
    </div>
  </div>
<?php endif; ?>
