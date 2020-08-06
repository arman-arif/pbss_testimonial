<?php use libraries\Session;

if (isset($errors)): ?>
    <div class="alert-box">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h6 class="alert-heading">Message</h6>
            <?php if (is_array($errors)):
                foreach ($errors as $error):
                    if (is_array($error)): ?>
                        <p><?php echo "<b>$error[error_name]</b> <br> $error[error_str] <br> $error[error_file],  Line: $error[error_line]"; ?></p>
                    <?php else: ?>
                        <p><?php echo $error; ?></p>
                    <?php endif;
                endforeach;
            else: ?>
                <p><?= $errors; ?></p>
            <?php endif; ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php endif; ?>
        