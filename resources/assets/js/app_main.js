$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#subscribe").submit(function(e) {
        e.preventDefault();

        $('#email')[0].disabled = true;
        
        $.ajax({
            url: 'subscribe',
            type: 'POST',
            data: {
                email: $("#subscribe").find("#email").val()
            }
        })
        .done(function(data) {
            $('#subscribe_modal').modal();
            $('#subscribe_modal #message').text("O seu email foi adicionado com sucesso à nossa lista. Obrigado pelo seu interesse.");
            $("#subscribe")[0].reset();
            $('#email')[0].disabled = false;
        })
        .fail(function(error) {
            $('#subscribe_modal #message').text("Houve um problema ao adicionar o seu email. por favor, tente mais tarde.");
            $('#subscribe_modal #email')[0].disabled = false;
            console.log(error);
        });
    });
});
