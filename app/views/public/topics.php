<?php if(empty($topics)): ?>
    <p>Sorry, no topics at the moment.</p>
<?php else: ?>
    <ul class="cardHolder">
    <?php foreach($topics as $topic): ?>
        <li>
            <a href="<?= BASE_URL; ?>/app/controller/disp.php?topic=<?= htmlentities($topic['topic']); ?>">
                <span class='body'><?= $topic['topic']; ?></span><br>
            </a>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>

<style type="text/css">@import url(<?= BASE_URL; ?>/app/css/cards2.css);</style>