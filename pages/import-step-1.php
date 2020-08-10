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
            <tr class="font-weight-bold"><?php
                foreach ($data[0] as $datum):
                    ?><th><?= $datum ?></th><?php
                endforeach;
                ?></tr>
            </thead>
            <tbody><?php
            if (count($data)>1){
            for ($i=1;$i<count($data);$i++):
                ?><tr><?php
                foreach ($data[$i] as $datum):
                    ?><td><?= $datum ?></td><?php
                endforeach;
                ?></tr><?php
            endfor;
            } else {
                echo "<tr><td colspan='21'>No importable data found</td></tr>";
            }
            ?></tbody>
        </table>
    </div>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mt-3 border-top">
    <span></span>
    <span>
        <?php if(count($data)<=1): ?>
            You can not import a empty csv to temporary database
            <a id="backBtnCSV" href="javascript: void;" class="btn btn-sm btn-secondary"> &lt; Back </a>
        <?php else: ?>
        Import student information from csv data to temporary database
        <a id="btnNextStep2" href="<?= BASE_URL . "import-csv?step=2&file=" . $_GET['file'] ?>" class="btn btn-sm btn-primary">Import &amp; Next &gt;   </a>
        <?php endif; ?>
    </span>
</div>

