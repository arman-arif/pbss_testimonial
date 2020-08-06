<?php
defined('ROOT') or die(header('HTTP/1.0 403 Forbidden'));

/**
 * @author Arman Arif
 * @project gLedger
 * @email atarmanarif@gmail.com
 */
header('HTTP/1.0 404 Page Not Found');
$page_title='404:Page not found';
require INCL_DIR . 'header.php';
?>
<div class="container-fluid">
    <div class="container">
        <div class="pt-5">
            <div class="card col-md-6 mx-auto p-4 text-center my-5">
                <h1 class="text-warning">ERROR</h1>
                <h2 class="text-danger"><span class="counter">404</span></h2>
                <p>Sorry, but the page you are looking for has not been found. Try checking the URL for the error, then hit the refresh button on your browser.</p>
                <a href="#" onclick="history.back();" class="btn btn-dark mx-5">&larr; Back</a>
            </div>
            <div class="text-center login-footer">
                <p>© 2019 - All rights reserved. Developed by <a href="https://armanarif.com/">Arman Arif</a></p>
            </div>
        </div>
    </div>
</div>
<?php require INCL_DIR. 'footer.php'; ?>
