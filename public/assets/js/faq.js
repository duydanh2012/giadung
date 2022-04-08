// FAQ text
$('.linkItemFAQ, .btnFAQ').on('click', function() {
    setTimeout(function(){
        setTableInText('.wrapTextModalControl table');
    }, 3000);
});
// end FAQ text

// FAQ
$('.contentTitleFAQ').on('click', function() {
    if($(this).parents('.contentItemFAQ').hasClass('active')) {
        if($(this).next('.listQuestion').length) {
            $(this).next('.listQuestion').slideUp();
        }
        
        $(this).parents('.contentItemFAQ').removeClass('active');
    } else {
        if($(this).next('.listQuestion').length) {
            $(this).next('.listQuestion').slideDown();
        }
        
        $(this).parents('.contentItemFAQ').addClass('active');
    }
});
// END FAQ