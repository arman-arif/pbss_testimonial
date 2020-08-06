$(document).ready(function () {
    // $('#loader-modal').removeClass('hide');

    let searchParams = new URLSearchParams(window.location.search);
    let fileHash = searchParams.get('file');

    $('#btnNextStep2').on('click', function (e) {
        e.preventDefault();
        let nextStep = $('#btnNextStep2').attr('href');
        alertify.confirm(
            'Confirmation',
            'Are you sure, you want to proceed to next step?',
            function(){
                alertify.closeAll();
                SweetAlert.fire({
                    title: 'Great!',
                    html: 'Adding data to temp db. <br>You will be redirected to next step. <br>Please wait...',
                    icon: 'success',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false
                });
                setTimeout(function () {
                    Swal.close();
                    $('#loader-modal').removeClass('hide');
                    $.ajax({
                        url: `http://${window.location.hostname}/pbss_testimonial/post?imp-csv-to-tmp&file=${fileHash}`,
                        type: 'GET',
                        // dataType: "JSON",
                        success: function(result){
                            // console.log(result);
                            $('#loader-modal').addClass('hide');
                            SweetAlert.fire({
                                title: 'Great!',
                                html: result,
                                icon: 'success',
                                timer: 2000,
                                onClose: window.location.replace(`http://${window.location.hostname}/pbss_testimonial/import-csv?step=2`)
                            }).then(result)
                            {
                                if (result.value){
                                    setInterval(function () {
                                        // window.location.replace(`http://${window.location.hostname}/pbss_testimonial/import-csv?step=2`);
                                    }, 2000)
                                }
                            }
                        }
                    });
                   // window.location.replace(nextStep);
                },2500);

            },
            function(){ alertify.error('Declined').delay(2) }
        ).setting({
            'labels': {ok: 'Yes', cancel: 'No'},
            'movable': false,
        });
    })

    var $th = $('#importCsvDataTbl').find('thead')
    $('#importCsvDataTbl').on('scroll', function() {
        $th.css('transform', 'translateY('+ this.scrollTop +'px)');
    });

    $('#unimported_csv_list tr td').click(function(e){
        e.preventDefault();
        console.log("clicked");

    });

    $("#btnImport").click(function (e) {
        e.preventDefault();
        let unimp_csv = $("#unimported_csv_list");
        let unimp_head = $("#unimp_csv_list_head");
        let importModal = $("#importModal");
        $.ajax({
            url: `http://${window.location.hostname}/pbss_testimonial/fetch?uploaded-csv`,
            type: 'GET',
            dataType: "JSON",
            success: function(result){
                unimp_csv.html('');
                unimp_head.removeClass('d-none');
                $.each(result,function (i,file) {
                    let tableBody = document.getElementById("unimported_csv_list");
                    let tableRow = tableBody.insertRow(tableBody.length);
                    let cellElem1 = tableRow.insertCell(0);
                    let cellElem2 = tableRow.insertCell(1);
                    let cellElem3 = tableRow.insertCell(2);
                    let cellElem4 = tableRow.insertCell(3);

                    let fileLink = document.createElement('a');
                    fileLink.href = `${window.location.href}#download=${file.file}`;
                    fileLink.innerText = file.name;

                    let importLink = document.createElement('a');
                    importLink.href = `http://${window.location.hostname}/pbss_testimonial/import-csv?step=1&file=${file.file}`;
                    importLink.innerHTML = 'Import <span data-feather="arrow-right-circle"></span>';
                    importLink.className = 'text-success';

                    cellElem1.className = 'text-center';
                    cellElem4.className = 'text-center';

                    cellElem1.innerHTML = i+1;
                    cellElem3.innerHTML = file.upload;

                    cellElem2.appendChild(fileLink);
                    cellElem4.appendChild(importLink);

                });

                $('#uploadCsvBtn').removeAttr('disabled');

            },
            error: function(xhr, status, error){
                // console.log(error);
                sweetAlert.fire("Opps!","Something went wrong","error");
                $('.swal2-confirm').click(function () {
                    $(".modal-backdrop").remove();
                    $("body").removeClass('modal-open');
                    importModal.removeClass('show');
                    importModal.css('display','none');
                });
            }
        });

    });

    $('#csv_list [data-action=import]').click(function (e) {
        e.preventDefault();
        let hrefLoc = $(this).attr('href');
        alertify.confirm(
            'Confirmation',
            'Do you want to import the CSV file?',
            () => {
                window.location.assign(hrefLoc);
            },
            () => {
                alertify.error('Declined').delay(2);
            }
        ).setting({
            'labels': {ok: 'Yes', cancel: 'No'},
            'movable': false,
        });

    });

});