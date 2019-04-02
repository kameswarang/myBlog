<?php if(empty($authors)): ?>
    <p>Sorry, no authors at the moment.</p>
<?php else: ?>
    <ul class="cardHolder">
    <?php foreach($authors as $author): ?>
        <li>
            <a href="<?= BASE_URL; ?>/app/controller/disp.php?author=<?= htmlentities($author['name']); ?>">
                <span class='body'><?= $author['name']; ?></span><br>
            </a>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>

<style type="text/css">@import url(<?= BASE_URL; ?>/app/css/cards.css);</style>