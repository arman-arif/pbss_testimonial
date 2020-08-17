<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));

global  $uri;
?>
<nav class="col-lg-2 col-md-3 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= $uri[0] == 'dashboard' ? 'active' : '' ?>" href="<?= BASE_URL ."dashboard" ?>">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?= ($uri[0] == 'student-list') && !isset($uri[1]) ? ' active' : '' ?>" href="<?= BASE_URL . 'student-list' ?>">
                    <span data-feather="users"></span> Student List
                </a>
                <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#studentList" aria-controls="studentList" aria-expanded="false">
                    <span data-feather="chevron-down"></span>
                </button>
                <?php $student_uris = ['printed','unprinted','temporary'] ?>
                <ul class="ml-3 collapse<?= in_array($uri[1], $student_uris) || $uri[0] == 'student-list' || $uri[0] == 'add-student' ? ' show' : '' ?>" id="studentList">
                    <li class="nav-item"><a class="nav-link<?= $uri[1] == 'printed' ? ' active' : '' ?>" href="<?= BASE_URL . "student-list/printed" ?>"><span data-feather="check-circle"></span> Certificate printed</a></li>
                    <li class="nav-item"><a class="nav-link<?= $uri[1] == 'unprinted' ? ' active' : '' ?>" href="<?= BASE_URL . "student-list/unprinted" ?>"><span data-feather="x-circle"></span>  Not printed yet</a></li>
                    <li class="nav-item"><a class="nav-link<?= $uri[1] == 'temporary' ? ' active' : '' ?>" href="<?= BASE_URL . "student-list/temporary" ?>"><span data-feather="alert-circle"></span> Temporary list</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link<?= $uri[0] == 'import-csv' ? ' active' : '' ?>" href="<?= BASE_URL . 'import-csv' ?>">
                    <span data-feather="upload-cloud"> </span>
                    Import CSV
                </a>
                <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#importCSV" aria-controls="importCSV" aria-expanded="false">
                    <span data-feather="chevron-down"></span>
                </button>
                <?php $import_uris = ['import-csv', "upload-csv", "uploaded-csv", 'imported-csv'] ?>
                <ul class="ml-3 collapse<?= in_array($uri[0], $import_uris)?' show':'' ?>" id="importCSV">
                    <li class="nav-item"><a class="nav-link<?= $uri[0] == 'upload-csv' ? ' active' : '' ?>" href="<?= BASE_URL . "upload-csv" ?>"><span data-feather="arrow-up-circle"></span> Upload CSV</a></li>
                    <li class="nav-item"><a class="nav-link<?= $uri[0] == 'uploaded-csv' ? ' active' : '' ?>" href="<?= BASE_URL . "uploaded-csv" ?>"><span data-feather="clock"></span> Uploaded CSV</a></li>
                    <li class="nav-item"><a class="nav-link<?= $uri[0] == 'imported-csv' ? ' active' : '' ?>" href="<?= BASE_URL . "imported-csv" ?>"><span data-feather="arrow-down-circle"></span> Imported CSV</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?= $uri[0] == 'certificate' ? ' active' : '' ?>" href="<?= BASE_URL . "certificate" ?>">
                    <span data-feather="layers"></span>
                    Certificate
                </a>
            </li>
        </ul>
    </div>
</nav>