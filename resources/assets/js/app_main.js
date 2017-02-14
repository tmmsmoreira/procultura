$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $("#subscribe").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: 'subscribe',
            type: 'POST',
            data: {
                email: $("#subscribe").find("#email").val()
            }
        })
        .done(function(data) {
            $('#subscribe_modal').modal();
            $("#subscribe")[0].reset();
        })
        .fail(function(error) {
            console.log(error)
        });
    });
});
