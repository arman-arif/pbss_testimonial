<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));

//import csv step-1
use libraries\Session;

?>
<h5 class="text-center mb-3 text-uppercase">Check csv data before importing</h5>

<div class="w-100 overflow-auto border">
    <div class="table-responsive" style="max-height: calc(100vh - 300px); width: max-content" id="importCsvDataTbl">
        <table class="table table-sm table-striped table-bordered">
            <thead class="bg-white border text-center">
            <tr class="font-weight-bold">
                <?php foreach ($data[0] as $datum):
                    ?><th><?= $datum ?></th><?php
                endforeach;
                ?></tr>
            </thead>
            <tbody><?php
            for ($i=1;$i<count($data);$i++):
                ?><tr><?php
                foreach ($data[$i] as $datum):
                    ?><th><?= $datum ?></th><?php
                endforeach;
                ?></tr><?php
            endfor;
            ?></tbody>
        </table>
    </div>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mt-3 border-top">
    <span></span>
    <span>
        Import student information from csv data to temporary database
        <a id="btnNextStep2" href="<?= BASE_URL . "import-csv?step=2&file=" . $_GET['file'] ?>" class="btn btn-sm btn-primary">Import &amp; Next &gt;   </a>
    </span>
</div>

