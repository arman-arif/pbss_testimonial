<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
//import csv
use libraries\Session;
use modules\Users;

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 border-bottom">
    <h1 class="h2">Upload CSV</h1>
</div>
<div class="mt-2 row">
    <form method="post" enctype="multipart/form-data" class="col-6 col-md-4 border p-3 mx-auto">
        <div class="mt-4 clearfix">
            <label class="file d-block mb-3">
                <input type="file" name="upload_csv" id="csv_upload" class="form-control-file mb-2" accept=".csv" required>
                <span class="file-custom"></span>
            </label>
            <button type="submit" class="btn btn-success btn-block">
                Upload CSV file <span class="ml-2" data-feather="upload-cloud"></span>
            </button>
        </div>
        <small class="d-block my-4 text-center">Upload a csv file here to import. <br> (You can only upload/import ".csv" file here)</small>
    </form>
</div>

<p class="mt-5 text-center">
    <a href="<?= BASE_URL . 'resources/student_list_for_import_template.csv' ?>" download="import_list_template.csv">
        <span class="ti-download"></span> Download CSV file template for import
    </a>
</p>