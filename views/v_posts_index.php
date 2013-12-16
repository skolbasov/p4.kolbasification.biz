<?php foreach ($posts as $post): ?>

<form action='/posts/like/<?=$post['post_id']?>'>

<article>
<h1><?=htmlentities($post['first_name'], ENT_QUOTES, 'UTF-8')?> <?=htmlentities($post['last_name'], ENT_QUOTES, 'UTF-8')?> posted:</h1>
<h2><?=htmlentities($post['title'], ENT_QUOTES, 'UTF-8')?></h2>
<p><?=htmlentities($post['content'], ENT_QUOTES, 'UTF-8')?></p>
<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
<?=Time::display($post['created'])?>
</time>
<p><?=$post['likes']?> liked</p>
</article>
    <input type='submit' value='Like it!' class="InputButton"><br>
   
</form>

<?php endforeach; ?>