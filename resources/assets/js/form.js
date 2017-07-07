import $ from 'jQuery';
import swal from 'sweetalert2'


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
                swal({
                    title: 'You are awesome!!',
                    type: 'success',
                    confirmButtonText: 'Cool',
                    onClose: () => {
                        $(e.target).removeClass('is-loading');
                        $('input', 'textarea').val('');
                    }
                })
            }
        ).fail(response => {
            let errors = response.responseJSON;
            let block = "<ul class='has-text-centered'>";
            for( let error of errors ) {
                block += "<li>" + error + "</li>";
            }
            block += "</ul>";
            swal({
                title: 'Error!',
                html: block,
                type: 'error',
                confirmButtonText: 'Okaaaay',
                onClose: () => {
                    $(e.target).removeClass('is-loading');
                }
            })
        });

    });

})