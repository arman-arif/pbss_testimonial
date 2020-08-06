<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
//dashboard
use libraries\Session;
use libraries\Tools;
use modules\Users;

//this is the content body for student list page
?>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 border-bottom">
    <h1 class="h2">Add Student</h1>
    <a href="<?= BASE_URL . "student-list" ?>" class="btn btn-outline-danger btn-sm">Back</a>
</div>
<div class="row">
    <div class="col-md-8 col-sm-10">
        <form method="post" id="addStudentForm">

            <div class="row my-2 form-group">
                <label for="stuName" class="col-form-label col-sm-2"><strong>Student Name</strong></label>
                <div class="col-sm-10">
                    <input type="text" name="student_name" id="stuName" class="form-control" placeholder="Student Name" autocomplete="off" required value="<?= Tools::get_typed_value('student_name') ?>">
                </div>
            </div>
            <div class="row my-2 form-group">
                <label for="fatherName" class="col-form-label col-sm-2"><strong>Father's Name</strong></label>
                <div class="col-sm-10">
                    <input type="text" name="father_name" id="fatherName" class="form-control form-control-sm" placeholder="Father's Name" autocomplete="off" required value="<?= Tools::get_typed_value('father_name') ?>">
                </div>
            </div>
            <div class="row my-2">
                <label for="motherName" class="col-form-label col-sm-2"><strong>Mother's Name</strong></label>
                <div class="col-sm-10">
                    <input type="text" name="mother_name" id="motherName" class="form-control form-control-sm" placeholder="Mother's Name" autocomplete="off" required value="<?= Tools::get_typed_value('mother_name') ?>">
                </div>
            </div>
            <div class="row my-2">
                <label for="gender" class="col-form-label col-sm-2"><strong>Gender</strong></label>

                <div class="col-sm-4 widget" id="gender-radio">
                    <label for="genderMale">Male
                        <input type="radio" value="Male" name="gender" id="genderMale" class="gender-radio" checked required>
                    </label>

                    <label for="genderFemale">Female
                        <input type="radio" value="Female" name="gender" id="genderFemale" class="gender-radio">
                    </label>
                </div>

                <label for="dateofbirth" class="col-form-label col-sm-2"><strong>Date of Birth</strong></label>
                <div class="col-sm-4">
                    <input type="text" name="dateofbirth" id="dateofbirth" class="form-control form-control-sm" placeholder="YYYY-MM-DD" autocomplete="off" required value="<?= Tools::get_typed_value('dateofbirth') ?>">
                </div>
            </div>
            <div class="row my-2">
                <label for="village" class="col-form-label col-sm-2"><strong>Village</strong></label>
                <div class="col-sm-4">
                    <input type="text" name="village" id="village" class="form-control form-control-sm" placeholder="Village" autocomplete="off" required value="<?= Tools::get_typed_value('village') ?>">
                </div>
                <label for="postoffice" class="col-form-label col-sm-2"><strong>Post Office</strong></label>
                <div class="col-sm-4">
                    <input type="text" name="postoffice" id="postoffice" class="form-control form-control-sm" placeholder="Post Office" autocomplete="off" required value="<?= Tools::get_typed_value('postoffice') ?>">
                </div>
            </div>
            <div class="row my-2">
                <label for="upazilla" class="col-form-label col-sm-2"><strong>Upazilla</strong></label>
                <div class="col-sm-4">
                    <input type="text" name="upazilla" id="upazilla" class="form-control form-control-sm" placeholder="Upazilla" autocomplete="off" required value="<?= Tools::get_typed_value('upazilla') ?>">
                </div>

                <label for="postcode" class="col-form-label col-sm-2"><strong>Post Code</strong></label>
                <div class="col-sm-4">
                    <input type="text" name="postcode" id="postcode" class="form-control form-control-sm" placeholder="Post Code" autocomplete="off" maxlength="5" value="<?= Tools::get_typed_value('postcode') ?>">
                </div>
            </div>

            <div class="row my-2">
                <label for="district" class="col-form-label col-sm-2"><strong>District</strong></label>
                <div class="col-sm-4">
                    <input type="text" name="district" id="district" class="form-control form-control-sm" placeholder="District" autocomplete="off" required value="<?= Tools::get_typed_value('district') ?>">
                </div>

                <label for="district" class="col-form-label col-sm-2"><strong>Mobile No</strong></label>
                <div class="col-sm-4">
                    <input type="text" name="phone" id="phone" class="form-control form-control-sm" placeholder="Mobile No" maxlength="11" autocomplete="off" value="<?= Tools::get_typed_value('phone') ?>">
                </div>
            </div>

            <div class="row my-2">
                <label for="exam" class="col-form-label col-sm-2"><strong>Exam Name</strong></label>
                <div class="col-sm-4">
                    <select name="exam" id="exam" class="form-control custom-select" required>
                        <option value="">-- Select Examination --</option>
                        <option value="SSC">SSC Examination</option>
                        <option value="SSC(VOC)">SSC (Voc) Examination</option>
                    </select>
                </div>

                <label for="board" class="col-form-label col-sm-2"><strong>Board Name</strong></label>
                <div class="col-sm-4">
                    <select name="board" id="board" class="form-control custom-select" required>
                        <option value="">-- Select Board --</option>
                        <option value="Jashore">Jashore Board/Jessore Board</option>
                        <option value="BTEB">Technical Education Board</option>
                    </select>
                </div>
            </div>

            <div class="row my-2">
                <label for="group" class="col-form-label col-sm-2"><strong>Group/Tread</strong></label>
                <div class="col-sm-4">
                    <select name="group" id="group" class="form-control custom-select" required>
                        <option value="">-- Select Group/Tread--</option>
                        <option value="Science">Science</option>
                        <option value="Humanities">Humanities</option>
                        <option value="Business">Business Studies</option>
                        <option value="Electrical">General Electrical</option>
                        <option value="Civil">Civil Construction</option>
                    </select>
                </div>

                <label for="centre" class="col-form-label col-sm-2"><strong>Exam Centre</strong></label>
                <div class="col-sm-4">
                    <select name="centre" id="centre" class="form-control custom-select" required>
                        <option value="">-- Select Exam Centre --</option>
                        <option value="Senhati">398 - Senhati</option>
                        <option value="Dighalia">397 - Dighalia</option>
                    </select>
                </div>
            </div>

            <div class="row my-2">
                <label for="roll_no" class="col-form-label col-sm-2"><strong>Roll No</strong></label>
                <div class="col-sm-4">
                    <input type="text" name="roll_no" id="roll_no" class="form-control" maxlength="6" placeholder="Roll No" autocomplete="off" required value="<?= Tools::get_typed_value('roll_no') ?>">
                </div>

                <label for="reg_no" class="col-form-label col-sm-2"><strong>Registration No</strong></label>
                <div class="col-sm-4">
                    <input type="text" name="reg_no" id="reg_no" class="form-control" maxlength="10" placeholder="Registration No" autocomplete="off" required value="<?= Tools::get_typed_value('reg_no') ?>">
                </div>
            </div>

            <div class="row my-2">
                <label for="year" class="col-form-label col-sm-2"><strong>Passing Year</strong></label>
                <div class="col-sm-4">
                    <select name="year" id="year" class="form-control form-control-sm" required>
                        <option value="">-- Select Passing Year --</option>
                        <?php for ($year=date('Y');$year>2005;$year--): ?>
                            <option value="<?= $year ?>"><?= $year ?></option>
                        <?php endfor; ?>
                    </select>
                </div>

                <label for="year" class="col-form-label col-sm-2"><strong>Result Status</strong></label>
                <div class="col-sm-4">
                    <select name="status" id="status" class="form-control form-control-sm" required>
                        <option value="">-- Select Result --</option>
                        <option value="passed">Passed</option>
                        <option value="failed">Failed</option>
                    </select>
                </div>
            </div>

            <div class="row my-2">
                <label for="session" class="col-form-label col-sm-2"><strong>Session</strong></label>
                <div class="col-sm-4">
                    <input type="text" name="session" id="session" class="form-control" maxlength="10" placeholder="Session (e.g: 2013-14)" autocomplete="off" required value="<?= Tools::get_typed_value('session') ?>">
                </div>

                <label for="session" class="col-form-label col-sm-2"><strong>Result (GPA)</strong></label>
                <div class="col-sm-4">
                    <input type="text" name="result" id="result" class="form-control" maxlength="10" placeholder="e.g: GPA 4.50" autocomplete="off" required value="<?= Tools::get_typed_value('result') ?>">
                </div>
            </div>

            <div class="row my-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 mx-auto">
                    <button type="submit" name="addStudentInfo" id="addStuBtn" class="ui-button ui-widget form-control">Add Student Info</button>
                </div>
            </div>
        </form>
    </div>
</div>