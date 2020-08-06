<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
//login view page
use libraries\Tools;
?>
<form class="form-signin text-center" method="post">
    <img class="mb-4" src="<?= BASE_URL . "resources/pbss_logo.png" ?>" alt="" width="120" height="120">
    <h1 class="h3 mb-3 font-weight-normal">Sign in here</h1>
    <label for="inputUsername" class="sr-only">Username</label>
    <input type="text" id="inputUsername" name="usrname" class="form-control" placeholder="Username" required>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="passwd" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2020 - All right reserved. <br><small>Developed by <a href="\\armanarif.com">Arman Arif</a></small></p>
</form>