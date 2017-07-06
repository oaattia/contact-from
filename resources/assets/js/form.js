import $ from 'jQuery';
// import Parsley from 'parsleyjs';


$(document).ready(() => {

    $('button[type=submit]').on('click', (e) => {
        e.preventDefault();
        let form = $(e.target).closest('form');
        $(e.target).addClass('is-loading');
        $.post(
            form.attr('action'),
            {
                form: form.serializeArray()
            },
            response => {
                $(e.target).removeClass('is-loading');
                console.log(response);
            }
        );

    });

})