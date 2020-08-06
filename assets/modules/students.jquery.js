$(document).ready(function () {

    $("#stuList [data-action=delete]").click((e)=>{
        e.preventDefault();
        let hrefLoc = $(this).attr('href');
        console.log(hrefLoc);
        alertify.confirm(
            'Confirmation',
            'Do you want to delete the student?',
            () => {
                // window.location.assign(hrefLoc);
            },

            () => {
                alertify.error('Declined').delay(2);
            }
        ).setting({
            'labels': {ok: 'Yes', cancel: 'No'},
            'movable': false,
        });
    });

    $("#stuList [data-action=info]").click((e)=>{
        e.preventDefault();

        alertify.confirm(
            'Confirmation',
            'Do you want?',
            () => {
                alertify.success('Ok').delay(2);
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