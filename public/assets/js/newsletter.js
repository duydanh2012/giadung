$('.wrapFrmSubcribe form').on('submit', function(e){
    e.preventDefault();

    const textSubscribe = $('.wrapTextSubscibe').html();
    const url           = $(this).attr('action');
    var   data          = $(this).serialize();

    $.ajax({
        type: 'post',
        data: data,
        url : url,
        success: function(data){
            $('.inputSearchPopup').val('');
            $('.wrapTextSubscibe').html(data.message);
        },
        error: function(error){
            $('.inputSearchPopup').val('');
            $('.wrapTextSubscibe').html(error.responseJSON.errors.email);
        }
    });

    setTimeout(function() { 
        $('.wrapTextSubscibe').html(textSubscribe);
    }, 10000);
});
