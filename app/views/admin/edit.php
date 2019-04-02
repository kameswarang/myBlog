<?php require(VIEW_ROOT . '/templates/admin/header.php'); ?>

<?php if(empty($post)): ?>
    <p>Nothing to edit.</p>
<?php else: ?>

    <form method="POST" autocomplete="off" class="formWrapper" id="editForm">
        <div><h2>Edit an existing story</h2></div>
        <div><label for="title">Title</label> <input type="text" name="title" id="title" value="<?=$post['title']; ?>"/></div>

        <div><label for="topic">Topic</label> <input type="text" name="topic" id="topic" value="<?=$post['topic']; ?>"/></div>
        
        <div><label for="label">Label</label> <input type="text" name="label" id="label" value="<?=$post['label']; ?>"/></div>
        
        <div><label for="updatedSlug">Slug</label> <input type="text" name="updatedSlug" id="updatedSlug" value="<?=$post['slug']; ?>"/></div>
        
        <div><textarea name="body" id="body" rows="30"><?=$post['body']; ?></textarea></div>
        
        <input type="text" name="slug" id="slug" value="<?= $post['slug']; ?>" hidden/> 
        <div><input type="submit" value="Update" id="submit"/></div>
    </form>

<?php endif; ?>

<style type="text/css">@import url(<?= BASE_URL . "/app/css/storyForm.css"; ?>);</style>
<script type="text/javascript" src="<?= BASE_URL; ?>/app/javascripts/edit.js"></script>
<?php require(VIEW_ROOT . '/templates/footer.php'); ?>