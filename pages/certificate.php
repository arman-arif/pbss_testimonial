<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
//dashboard
use libraries\Session;
use modules\Users;

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 border-bottom">
    <h1 class="h2">Print Testimonial Certificate</h1>
</div>

<div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center h-100">

    <a class="btn btn-lg btn-primary mr-3" href="<?= BASE_URL . 'print?all=unprinted' ?>">Print All Unprinted</a>
    <a class="btn btn-lg btn-primary mr-3" href="<?= BASE_URL . 'print?all' ?>">Print All</a>
    <a class="btn btn-lg btn-primary mr-3" href="#print?single">Print Single</a>

</div>



<div class="row">
    <div class="col-6 mx-auto">
        <form action="<?= BASE_URL . 'certificate/print' ?>">
            <div class="row mb-3">
                <div class="col-4">
                    <select name="exam" id="exam" class="form-control" required>
                        <option value="">- Select Exam -</option>
                        <option value="JSC">JSC</option>
                        <option value="SSC">SSC</option>
                        <option value="VOC">SSC (VOC)</option>
                    </select>
                </div>
                <div class="col-4"><input type="text" name="year" placeholder="Exam Year" class="form-control" required></div>
                <div class="col-4"><input type="text" name="board" placeholder="Education Board" value="Jashore" readonly class="form-control"></div>
            </div>
            <div class="row">
                <div class="col-4"><input type="text" name="roll" placeholder="Exam Roll" class="form-control" required></div>
                <div class="col-4"><input type="text" name="reg" placeholder="Registration No" class="form-control" required></div>
                <div class="col-4">
                    <input type="hidden" name="type" value="single">
                    <input type="submit" value="Print" class="form-control btn-info" required>
                </div>
            </div>
        </form>
    </div>
</div>


