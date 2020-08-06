$(document).ready(function(){

    $(".gender-radio").checkboxradio();
    $("#gender-radio").controlgroup();

    let date = new Date();
    let curyear = date.getFullYear();
    let endyear = curyear-10;

    $("#dateofbirth").datepicker({
        format: "yyyy-mm-dd",
        endDate: endyear.toString()+"-12-31",
        clearBtn: true,
        toggleActive: true
    });


    // let year = 1996;
    // console.log(curyear);
    // for (var i = curyear; curyear >= year; i--){
    //     $("#year").append('<option value="'+year+'">'+year+'</option>');
    // }


    $("#postcode").keypress(evt => {
        return onlykey(evt);
    });

    $("#reg_no").keypress(evt => {
        return onlykey(evt);
    });

    $("#roll_no").keypress(evt => {
        return onlykey(evt);
    });

    $("#phone").keypress(evt => {
        return onlykey(evt);
    });

    const onlykey = evt => {
        let e = event || evt; //for cross compability
        let charCode = e.which || e.keyCode;
        return !(charCode > 31 && (charCode < 47 || charCode > 57));
    }

    $.validator.setDefaults({
        errorClass: 'error-block',
        highlight: element => {
            $(element).removeClass("is-valid");
            $(element).addClass("is-invalid");
        },
        unhighlight: element => {
            $(element).removeClass("is-invalid");
            $(element).addClass("is-valid");
        },
        errorPlacement: function (error, elem) {
            if (elem.prop('type') === 'radio'){
                elem.parent().append(error);
            } else {
                error.insertAfter(elem);
            }
        }
    });

    $('#addStudentForm').validate({
        rules: {
            student_name: {
                required: true,
                letterswithbasicpunc: true
            },
            father_name: {
                required: true,
                letterswithbasicpunc: true
            },
            mother_name: {
                required: true,
                letterswithbasicpunc: true
            },
            gender: 'required',
            dateofbirth: {
                required: true,
                date: true
            },
            village: {
                required: true,
                letterswithbasicpunc: true
            },
            postoffice: {
                required: true,
                letterswithbasicpunc: true
            },
            postcode: {
                integer: true
            },
            district: {
                letterswithbasicpunc: true
            },
            upazilla: {
                required: true,
                letterswithbasicpunc: true
            },
            phone:{
                integer: true
            },
            roll_no: {
                integer: true
            },
            reg_no: {
                integer: true
            }
        },
        messages: {
            student_name:{
                required: "Student name can't be empty",
                letterswithbasicpunc: "Only characters are allowed in name"
            },
            father_name:{
                required: "Father name can't be empty",
                letterswithbasicpunc: "Only characters are allowed in name"
            },
            mother_name:{
                required: "Mother name can't be empty",
                letterswithbasicpunc: "Only characters are allowed in name"
            },
            dateofbirth: {
                required: "Date of birth is required"
            },
            postcode: {
                integer: "Only 4-5 digit number accepted"
            },
            phone:{
                integer: "Only 11 digit phone number accepted"
            },
            village: {
                required: "Village is required",
                letterswithbasicpunc: 'Only letters are accepted'
            },
            postoffice: {
                required: "Post Office is required",
                letterswithbasicpunc: 'Only letters are accepted'
            },
            district: {
                required: "District is required",
                letterswithbasicpunc: 'Only letters are accepted'
            },
            upazilla: {
                required: "Upazilla is required",
                letterswithbasicpunc: 'Only letters are accepted'
            },
            exam: {
                required: "Exam name is required"
            },
            board: {
                required: "Board name is required"
            },
            group: {
                required: "Group/Tread is required"
            },
            centre: {
                required: "Exam centre is required"
            },
            roll_no: {
                required: "Roll no is required"
            },
            reg_no: {
                required: "Registration no is required"
            },
            year: {
                required: 'Passing year is required'
            },
            session: {
                required: 'Session is required'
            },
            result: {
                required: 'Grade point is required'
            }
        }
    });

    $("#btn1").click(e=>{
        e.preventDefault();
        $("#genderMale").click();
    });

    // $("#genderMale").click(()=>{
    //     console.log("clicked");
    // });



});