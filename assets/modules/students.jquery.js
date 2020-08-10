$(document).ready(function () {

    // alertify.set('notifier','position', 'top-right');

    $('#stuList [data-action=delete]').click(function (e) {
        e.preventDefault();
        let hrefLoc = $(this).attr('href');

        alertify.confirm(
            'Confirmation',
            'Do you want to delete the student?',
            function () {
                window.location.assign(hrefLoc);
            },
            alertDeclined
        ).setting({
            'labels': {ok: 'Yes', cancel: 'No'},
            'movable': false,
            'closable': false,
            'closableByDimmer': false
        });
    });


    $("#stuList [data-action=info]").click( function(e) {
        e.preventDefault();
        let stuId = $(this).data('id');
        $('#loader-modal').removeClass('hide');
        $.ajax({
            url: `http://${window.location.hostname}/pbss_testimonial/fetch?student-info&id=${stuId}`,
            type: 'GET',
            dataType: "JSON",
            success: function(response){
                $('#loader-modal').addClass('hide');
                let printed = (response.last_printed === null) ? "Not yet printed" : response.last_printed;
                let stuInfo = '<table class="table table-sm table-bordered table-striped" id="stuInfoTbl">';
                stuInfo += '<tr><th>CertID</th><td>'+response.certId+'</td><th>Mobile No</th><td>'+response.phone+'</td></tr>';
                stuInfo += '<tr><th>Name</th><td>'+response.name+'</td><th>Gender</th><td>'+response.gender+'</td></tr>';
                stuInfo += '<tr><th>Father</th><td>'+response.father+'</td><th>Mother</th><td>'+response.mother+'</td></tr>';
                stuInfo += '<tr><th>Village</th><td>'+response.village+'</td><th>Post Office &frasl; Code</th><td>'+response.poffice+' &frasl; '+response.pcode+'</td></tr>';
                stuInfo += '<tr><th>Upazilla</th><td>'+response.upazilla+'</td><th>District</th><td>'+response.district+'</td></tr>';
                stuInfo += '<tr><th>Date of Birth</th><td colspan="3">'+response.dob+'</td></tr>';
                stuInfo += '<tr><th>Exam Name</th><td>'+response.exam+'</td><th>Board Name</th><td>'+response.borad+'</td></tr>';
                stuInfo += '<tr><th>Centre</th><td>'+response.centre+'</td><th>Session</th><td>'+response.session+'</td></tr>';
                stuInfo += '<tr><th>Group/Thread</th><td>'+response.group+'</td><th>Passing Year</th><td>'+response.year+'</td></tr>';
                stuInfo += '<tr><th>Registration No</th><td>'+response.reg_no+'</td><th>Roll No</th><td>'+response.roll+'</td></tr>';
                if (response.rstatus === 'Failed')
                    stuInfo += '<tr class="table-danger"><th>Result Status</th><td class="text-danger font-weight-bold">'+response.rstatus+'</td><th>Result Grade</th><td> N/A </td></tr>';
                else
                    stuInfo += '<tr class="table-success"><th>Result Status</th><td class="text-success font-weight-bold">'+response.rstatus+'</td><th>Result Grade</th><td> GPA '+response.result+'</td></tr>';
                stuInfo += '<tr><th>Last Printed </th><td>'+printed+'</td>';
                stuInfo += '<th>Action</th><td><div class="mx-auto text-center">';
                stuInfo += `<a data-action="edit" href="#edit?student&stud-id=${response.id}" class="text-info mr-3"><span class="ti-pencil-alt"></span> Edit</a>`;
                stuInfo += `<a data-action="delete" href="http://${window.location.hostname}/pbss_testimonial/delete?student&stud-id=${response.id}" class="text-danger mr-3"><span class="ti-trash"></span> Delete</a>`;
                stuInfo += `<a data-action="print" href="http://${window.location.hostname}/pbss_testimonial/certificate/print?stud-id=${response.id}" class="text-success"><span class="ti-printer"></span> Print</a>`;
                stuInfo += '</div></td></tr></table>';

                bootbox.alert({
                    size: 'large',
                    title: 'Student Information',
                    message: stuInfo,
                    scrollable: true,
                    buttons: {
                        ok: {
                            label: 'Close',
                            className: 'btn-secondary'
                        }
                    },
                    centerVertical: true
                });//end boot box

                $('#stuInfoTbl [data-action=delete]').click(function (e) {
                    e.preventDefault();
                    let hrefLoc = $(this).attr('href');

                    alertify.confirm(
                        'Confirmation',
                        'Do you want to delete the student?',
                        () => {
                            window.location.assign(hrefLoc);
                        },
                        alertDeclined
                    ).setting({
                        'labels': {ok: 'Yes', cancel: 'No'},
                        'movable': false,
                        'closable': false,
                        'closableByDimmer': false
                    });
                });//end delete confirmation

                $('#stuInfoTbl [data-action=print]').click(function (e) {
                    e.preventDefault();
                    let hrefLoc = $(this).attr('href');

                    alertify.confirm(
                        'Confirmation',
                        'Do you want to print certificate for the selected student?',
                        () => {
                            window.location.assign(hrefLoc);
                        },
                        alertDeclined
                    ).setting({
                        'labels': {ok: 'Yes', cancel: 'No'},
                        'movable': false,
                        'closable': false,
                        'closableByDimmer': false
                    });
                });

            }
        });//end ajax
    });//end data-action-info


    $('#stuList [data-action=print]').click(function (e) {
        e.preventDefault();
        let hrefLoc = $(this).attr('href');

        alertify.confirm(
            'Confirmation',
            'Do you want to print certificate for the selected student?',
            function(){
                window.location.assign(hrefLoc);
            },
            alertDeclined
        ).setting({
            'labels': {ok: 'Yes', cancel: 'No'},
            'movable': false,
            'closable': false,
            'closableByDimmer': false
        });
    });

    $("#stuList [data-action=tmp-info]").click( function(e) {
        e.preventDefault();
        let stuId = $(this).data('id');
        $('#loader-modal').removeClass('hide');
        $.ajax({
            url: `http://${window.location.hostname}/pbss_testimonial/fetch?temp-info&id=${stuId}`,
            type: 'GET',
            dataType: "JSON",
            success: function(response){
                $('#loader-modal').addClass('hide');
                let printed = (response.last_printed === null) ? "Not yet printed" : response.last_printed;
                let stuInfo = '<table class="table table-sm table-bordered table-striped" id="stuInfoTbl">';
                stuInfo += '<tr><th>CertID</th><td>'+response.certId+'</td><th>Mobile No</th><td>'+response.phone+'</td></tr>';
                stuInfo += '<tr><th>Name</th><td>'+response.name+'</td><th>Gender</th><td>'+response.gender+'</td></tr>';
                stuInfo += '<tr><th>Father</th><td>'+response.father+'</td><th>Mother</th><td>'+response.mother+'</td></tr>';
                stuInfo += '<tr><th>Village</th><td>'+response.village+'</td><th>Post Office &frasl; Code</th><td>'+response.poffice+' &frasl; '+response.pcode+'</td></tr>';
                stuInfo += '<tr><th>Upazilla</th><td>'+response.upazilla+'</td><th>District</th><td>'+response.district+'</td></tr>';
                stuInfo += '<tr><th>Date of Birth</th><td colspan="3">'+response.dob+'</td></tr>';
                stuInfo += '<tr><th>Exam Name</th><td>'+response.exam+'</td><th>Board Name</th><td>'+response.borad+'</td></tr>';
                stuInfo += '<tr><th>Centre</th><td>'+response.centre+'</td><th>Session</th><td>'+response.session+'</td></tr>';
                stuInfo += '<tr><th>Group/Thread</th><td>'+response.group+'</td><th>Passing Year</th><td>'+response.year+'</td></tr>';
                stuInfo += '<tr><th>Registration No</th><td>'+response.reg_no+'</td><th>Roll No</th><td>'+response.roll+'</td></tr>';
                if (response.rstatus === 'Failed')
                    stuInfo += '<tr class="table-danger"><th>Result Status</th><td class="text-danger font-weight-bold">'+response.rstatus+'</td><th>Result Grade</th><td> N/A </td></tr>';
                else
                    stuInfo += '<tr class="table-success"><th>Result Status</th><td class="text-success font-weight-bold">'+response.rstatus+'</td><th>Result Grade</th><td> GPA '+response.result+'</td></tr>';
                stuInfo += '<tr><td></td><th class="text-center">Action</th><td><div class="mx-auto text-center">';
                stuInfo += `<a data-action="edit" href="#edit?student&stud-id=${response.id}" class="text-info mr-3"><span class="ti-pencil-alt"></span> Edit</a>`;
                stuInfo += `<a data-action="delete" href="http://${window.location.hostname}/pbss_testimonial/delete?temp&stu-id=${response.id}" class="text-danger mr-3"><span class="ti-trash"></span> Delete</a>`;
                stuInfo += '</div></td><td></td></tr></table>';

                bootbox.alert({
                    size: 'large',
                    title: 'Student Information',
                    message: stuInfo,
                    scrollable: true,
                    buttons: {
                        ok: {
                            label: 'Close',
                            className: 'btn-secondary'
                        }
                    },
                    centerVertical: true
                });//end boot box

                $('#stuInfoTbl [data-action=delete]').click(function (e) {
                    e.preventDefault();
                    let hrefLoc = $(this).attr('href');

                    alertify.confirm(
                        'Confirmation',
                        'Do you want to delete the student?',
                        () => {
                            window.location.assign(hrefLoc);
                        },
                        alertDeclined
                    ).setting({
                        'labels': {ok: 'Yes', cancel: 'No'},
                        'movable': false,
                        'closable': false,
                        'closableByDimmer': false
                    });
                });//end delete confirmation

                $('#stuInfoTbl [data-action=print]').click(function (e) {
                    e.preventDefault();
                    let hrefLoc = $(this).attr('href');

                    alertify.confirm(
                        'Confirmation',
                        'Do you want to print certificate for the selected student?',
                        () => {
                            window.location.assign(hrefLoc);
                        },
                        alertDeclined
                    ).setting({
                        'labels': {ok: 'Yes', cancel: 'No'},
                        'movable': false,
                        'closable': false,
                        'closableByDimmer': false
                    });
                });

            },
            error: function () {
                sweetAlert.fire("Opps!","Something went wrong","error");
            }
        });//end ajax
    });//end data-action-info


    function alertDeclined() {
        alertify.error('Declined').delay(2);
    }
    function goToPage(url) {
        window.location.assign(url);
    }

    $("#deleteStudentAll").on("click", function (e) {
        e.preventDefault();
        alertify.confirm(
            'Confirmation',
            'Do you want to delete student info from the list?',
            function() {
                $('#loader-modal').removeClass('hide');
                $.ajax({
                    url: `http://${window.location.hostname}/pbss_testimonial/post?delete&student=all`,
                    type: 'GET',
                    dataType: "JSON",
                    success: function (response) {
                        $('#loader-modal').addClass('hide');
                        if (response.status === 'success')
                            sweetAlert.fire("Success",response.message,response.status)
                                .then(function () {
                                    location.reload();
                                })
                        else
                            sweetAlert.fire("Error",response.message,response.status);
                    },
                    error: function () {
                        $('#loader-modal').addClass('hide');
                        sweetAlert.fire("Opps!","Something went wrong","error");
                    }
                });
            },
            alertDeclined
        ).setting({
            'labels': {ok: 'Yes', cancel: 'No'},
            'movable': false,
            'closable': false,
            'closableByDimmer': false
        });
    });

    $("#emptyTmpList").on("click", function (e) {
        e.preventDefault();
        alertify.confirm(
            'Confirmation',
            'Do you want to empty the temporary list?',
            function() {
                $('#loader-modal').removeClass('hide');
                $.ajax({
                    url: `http://${window.location.hostname}/pbss_testimonial/post?delete&student=tmp`,
                    type: 'GET',
                    dataType: "JSON",
                    success: function (response) {
                        $('#loader-modal').addClass('hide');
                        if (response.status === 'success')
                            sweetAlert.fire("Success",response.message,response.status)
                                .then(function () {
                                    location.reload();
                                })
                        else
                            sweetAlert.fire("Error",response.message,response.status);
                    },
                    error: function () {
                        $('#loader-modal').addClass('hide');
                        sweetAlert.fire("Opps!","Something went wrong","error");
                    }
                });
            },
            alertDeclined
        ).setting({
            'labels': {ok: 'Yes', cancel: 'No'},
            'movable': false,
            'closable': false,
            'closableByDimmer': false
        });
    });


});//end of ready func