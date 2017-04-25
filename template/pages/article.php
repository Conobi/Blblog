<?php global $article, $art_info; ?>
<div class="container row">
  <div class="col s12 m8 offset-m2 article-main">
    <header>
      <h1><?= $art_info['title'] ?></h1>
      <address><?= $art_info['author'].' • '.strftime("%d %B %Y", $art_info['timestamp']) ?></address>
    </header>
    <article>
      <?= $article ?>
    </article>
  </div>
</div>
