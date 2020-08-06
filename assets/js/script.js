$(document).ready(function () {

    setTimeout(function () {
        $(".alert").fadeOut();
        $(".alert-box").remove();
    }, 5000);

    function remErrMsgDelay() {
        setTimeout(function () {
            $(".error-message").fadeOut();
        }, 5000);
    }

    function removeErrMsg() {
        $(".error-message").fadeOut();
        $(".error-input").removeClass("error-input");
    }

    var csvFileLink = $('#csv_list [data-action=info]');
    csvFileLink.click(function (e) {
        e.preventDefault();
        var csvId = $(this).data('csvid');
        alert("File id = " + csvId);
    });

});

