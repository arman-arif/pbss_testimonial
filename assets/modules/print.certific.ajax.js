$(document).ready(function () {

    $('#singlePrint').click(function (e) {
        $('#singleTestForm').show();
        $('.btn').hide();
    });

    $('#closeSingle').click(function (e) {
        $().hide();
    });

    $('#printInfo').click(function (e) {
        e.preventDefault();
    });

});