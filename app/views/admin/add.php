<?php require(VIEW_ROOT . '/templates/admin/header.php'); ?>

<form method="POST" autocomplete="off" class="formWrapper" id="addForm">
    <div><h2>Write a new story</h2></div>
    
    <div><label for="title">Title</label> <input type="text" name="title" id="title" required/></div>

    <div><label for="topic">Topic</label> <input type="text" name="topic" id="topic" required/></div>
    
    <div><label for="label">Label</label> <input type="text" name="label" id="label" required/></div>
    
    <div><label for="slug">Slug</label> <input type="text" name="slug" id="slug" required/></div>
    
    <div><textarea name="body" id="body" cols="60" rows="30" placeholder="Your story goes here..." required></textarea></div>
    
    <input type="submit" value="Create" id="submit"/>
</form>

<style type="text/css">@import url(<?= BASE_URL . "/app/css/storyForm.css"; ?>);</style>
<script type="text/javascript" src="<?= BASE_URL; ?>/app/javascripts/add.js"></script>
<?php require(VIEW_ROOT . '/templates/footer.php'); ?>