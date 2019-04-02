<?php require(VIEW_ROOT . '/templates/header.php');?>

<?php if(empty($posts)): ?>
    <p>Sorry, no posts at the moment</p>
<?php else: ?>
    <ul class="cardHolder">
    <?php foreach($posts as $post): ?>
        <li>
            <a href="<?= BASE_URL; ?>/app/controller/disp.php?page=<?= $post['slug']; ?>">
                <span class='title'><?= $post['title']; ?></span><br>
                <span class='sub'>by <?= $post['authorName']; ?></span>
                <span class='sub'>, in <?= $post['topic']; ?></span>
                <span class='sub'>, on <?= $post['created']; ?></span>
                <span class='body'><?= substr($post['body'], 0, 200) . '...'; ?></span>
            </a>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>

<style type="text/css">@import url(<?= BASE_URL; ?>/app/css/cards.css);</style>
<?php require(VIEW_ROOT . '/templates/footer.php'); ?>