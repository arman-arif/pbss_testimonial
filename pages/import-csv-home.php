<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));

//import csv home
use libraries\Session;

?>

<div class="d-flex justify-content-center align-items-center h-100" style="min-height: 300px">
    <div class="text-center border p-5">
        <div class="mb-3">Import CSV from uploaded files</div>
        <button class="btn btn-lg btn-outline-success" id="btnImport" data-toggle="modal" data-target="#importModal">
            <span class="fa fa-plus-circle"></span>
            Import CSV
        </button>
        <div class="mt-3 text-muted">Click to select</div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="importModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choose CSV to Import</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-borderless">
                    <thead class="bg-info d-none" id="unimp_csv_list_head">
                    <tr class="font-weight-bold">
                        <th>S/N</th>
                        <th>File Name</th>
                        <th>Uploaded</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="unimported_csv_list">
                    <tr>
                        <td colspan="4" class="text-center d-inline">
                            <div class="pt-3">
                                <i class="fa fa-spinner fa-spin fa-fw fa-pulse fa-2x align-middle"></i>
                                <span class="align-middle">Loading...</span>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" id="uploadCsvBtn" data-target="#uploadModal" data-toggle="modal" data-dismiss="modal" disabled>
                    <span data-feather="upload-cloud"></span> Upload CSV
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload CSV to Import</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="upload_csv">
                    <label class="file mb-3">
                        <input type="file" accept=".csv" name="upload_csv" id="csv_upload" class="form-control-file mb-2 d-block" required>
                        <span class="file-custom"></span>
                    </label>
                    <button type="submit" class="btn btn-success float-right">
                        Upload <span data-feather="upload-cloud"></span>
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#importModal">Back</button>
            </div>
        </div>
    </div>
</div>