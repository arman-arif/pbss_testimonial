<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden")); //die here if accessed directly
use libraries\FontEnd;
use libraries\Tools;
use libraries\Session;

//footer design here
?>

<?php if (isset($uri[0])): ?>
    <?php if ($uri[0] != 'login'): ?>
        </main>
        </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<div class="loading-modal bg-trans-cove hide" id="loader-modal">
    <div class="loading modal-background">
        <div class="loading-content">
            <div class="loading-circle"></div>
            <span class="loading-name" id="loader-text">LOADING</span>
        </div>
    </div>
</div>

<?php
if (Session::has('message') || Session::has('err_msg')){
    include INCL_DIR . 'message.php';
}
//error messages are held here
if (isset($message)) {
    if ($message)
        Tools::set_errors($message);
}

// scripts are linked here
echo FontEnd::jquery(); //linked jquery
echo FontEnd::popperjs(); //popper js
echo FontEnd::bootstrap('js'); //bootstrap js
echo FontEnd::feather_icons();
echo isset($module_script) ? $module_script : '';
echo FontEnd::custom_script();
echo FontEnd::dashboard('js');
?>
</body>
</html>
