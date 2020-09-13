<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden")); //die here if accessed directly
use libraries\FontEnd;
use libraries\Session;

global $uri;
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title><?= (isset($page_title) && !empty($page_title) ?$page_title . ' | ':'') . APP_NAME ?></title>
<?php
echo FontEnd::reset_css();
echo FontEnd::bootstrap('css');
echo FontEnd::fontawesome();
if ($uri[0]!='login'){
    echo FontEnd::dashboard('css');
}
echo isset($custom_header)?$custom_header:'';
echo FontEnd::custom_style();
?>
</head>
<body>
<?php //here will be the header ?>
<?php if(isset($uri[0])): ?>
    <?php if($uri[0]!='login' && $uri[0]!='print'): ?>
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 mr-0 overflow-hidden" href="<?= BASE_URL ?>"><?= APP_NAME ?></a>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="<?= BASE_URL . "logout" ?>"><span data-feather='log-out'></span> Sign out</a>
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <?php require INCL_DIR . 'nav.php'; ?>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <?php endif; ?>
<?php endif; ?>

