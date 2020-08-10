<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));

//uploaded csv
use libraries\Session;
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 border-bottom">
    <h1 class="h2">Uploaded CSV</h1>
    <a href="<?= BASE_URL . 'upload-csv' ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-plus-circle"></i> Upload</a>
</div>

<div class="table-responsive">
    <table class="table table-sm table-bordered">
        <thead>
        <tr>
            <th class="text-center">S/N</th>
            <th>File Name</th>
            <th class="text-center">Uploaded On</th>
            <th class="text-center">Imported On</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody id="csv_list">
        <?php
        if ($csv_files = $this->get_uploaded_csv()) {
            $serial = 1;
            if ($csv_files){
                foreach ($csv_files as $csv) {
                    ?>
                    <tr>
                        <td class="text-center"><?= $serial++ ?></td>
                        <td><a href="<?= BASE_URL . 'uploads/csv/' . $csv['file_name'] ?>"><?= $csv['file_name'] ?></a></td>
                        <td class="text-center"><?= $csv['uploaded'] ?></td>
                        <td class="text-center"><?= empty($csv['imported'])?"N/A":$csv['imported'] ?></td>
                        <td class="text-center"><?= empty($csv['status'])?'<span class="badge badge-warning">Not Imported</span>': '<span class="badge '. (($csv['status']=='invalid')?'badge-danger':'badge-success') .'">'.ucwords($csv['status']).'</span>' ?></td>
                        <td class="text-center">
                            <a class="mx-1 text-danger" data-action="delete" href="<?= BASE_URL . 'delete?csv&file=' . $csv['hash'] ?>"><span class="ti-na" title="Delete"></span> Delete</a>
                            <a class="mx-1 text-warning" data-action="info" data-csvid="<?= $csv['hash'] ?>" href="#info?csv=<?= $csv['hash'] ?>"><span class="ti-info-alt" title="Info"></span> Info</a>
                            <a class="mx-1<?= empty($csv['imported'])?($csv['status']=='invalid'?" disabled text-muted":" text-success"):" disabled text-muted" ?>" data-action="import" href="<?= BASE_URL . 'import-csv?step=1&file=' . $csv['hash'] ?>"<?= empty($csv['imported'])?"":" disabled" ?><?= $csv['status']=='invalid' ?" disabled":"" ?>><span class="ti-arrow-circle-right" title="Import"></span> Import</a>
                        </td>
                    </tr>
                <?php }
            }
        }
        if ($serial == 1){
            echo '<tr><td colspan="5" class="text-center">No data found</td></tr>';
        }
        ?>
        </tbody>
    </table>
</div>
