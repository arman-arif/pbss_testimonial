<?php use libraries\Session; ?>
<?php if (Session::has('message')): ?>
    <div class="alert-box">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h6 class="alert-heading">Message</h6>
            <p><?= Session::get('message') ?></p>
            <?php Session::remove('message') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php endif; ?>
<?php if (Session::has('err_msg')): ?>
    <div class="alert-box">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h6 class="alert-heading">Message</h6>
            <p><?= Session::get('err_msg') ?></p>
            <?php Session::remove('err_msg') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php endif; ?>
