<?php require(VIEW_ROOT . '/templates/header.php'); ?>

<form method="POST" class= loginWrapper id="loginForm">
    <input type="text" name="user" placeholder="Username" value="beatlesFan" required/>
    <input type="password" name="password" placeholder="Password"  value="letitbe" required/>
    <input type="submit" value="Login" id="submit"/>
    <p class="pInMiddle">Or</p>
    <input type="button" value="Signup" onclick="location.href='signup.php'"/>
</form>

<style type="text/css">@import url(<?= BASE_URL . "/app/css/login.css"; ?>);</style>
<script type="text/javascript" src="<?= BASE_URL; ?>/app/javascripts/login.js"></script>
<?php require(VIEW_ROOT . '/templates/footer.php'); ?>