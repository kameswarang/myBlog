<?php require(VIEW_ROOT . '/templates/header.php');?>

<?php if(!$posts): ?>
    <p>No post found, sorry.</p>
<?php else: ?>
    <?php foreach($posts as $post): ?>
        <h2><?= htmlspecialchars($post['title']); ?></h2>
        <h3>by <?= htmlspecialchars($post['authorName']); ?>, in <?= htmlspecialchars($post['topic']); ?></h3>
        <?= nl2br(htmlspecialchars($post['body'])); ?>
        <p class='faded'><span>Created on <?= htmlspecialchars($post['created']); ?></span>
        <?php if($post['updated']): ?>
            <span>| Last updated on <?= htmlspecialchars($post['updated']); ?></span></p>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>

<?php require(VIEW_ROOT . '/templates/footer.php'); ?>