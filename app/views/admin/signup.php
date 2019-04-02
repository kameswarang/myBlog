<?php require(VIEW_ROOT . '/templates/header.php'); ?>

<form method="POST" class= loginWrapper id="signupForm">
    <input type="text" name="fname" placeholder="First Name" value="" required/>
    <input type="text" name="lname" placeholder="Last Name" value="" required style="display:inline"/>
    <input type="text" name="user" placeholder="Username" value="" required/>
    <input type="password" name="password" placeholder="Password"  value="" required/>
    <input type="submit" value="Signup" id="submit"/>
</form>

<style type="text/css">@import url(<?= BASE_URL . "/app/css/login.css"; ?>);</style>
<script type="text/javascript" src="<?= BASE_URL; ?>/app/javascripts/signup.js"></script>
<?php require(VIEW_ROOT . '/templates/footer.php'); ?>