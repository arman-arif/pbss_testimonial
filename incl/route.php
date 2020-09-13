<?php
use libraries\Session;
use libraries\Tools;

$Route->add('Home','/');
$Route->add('Login','/login');
$Route->add('Dashboard', '/dashboard');

//Import Module
$Route->add('Import','/upload-csv');
$Route->add('Import','/import-csv');
$Route->add('Import','/imported-csv');
$Route->add('Import','/uploaded-csv');

//Students Module
$Route->add('Students','/student-list');
$Route->add('Students','/student-list/printed');
$Route->add('Students','/student-list/unprinted');
$Route->add('Students','/student-list/temporary');
$Route->add('Students','/student-list/add-student');

$Route->add('Certificate','/certificate');


//$Route->add(null,'/print', function(){
//    require INCL_DIR . 'print.php';
//});

$Route->add(null,'/delete', function (){
    require MOD_DIR . 'Delete.php';
    new \modules\Delete();
});
$Route->add(null,'/logout', function (){
    Session::destroy();
    Tools::redirect(BASE_URL . 'login');
});