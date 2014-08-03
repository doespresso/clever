function isScrolledIntoView(elem)
{
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height() + 70;

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}


$(document).ready(function(){
     $('.section-wrapper').each(function(){
        if(!isScrolledIntoView($(this))){
            $(this).addClass('show-me');
        }
    });

$(document).on('scroll', function(){
    $('.show-me').each(function(){
        if(isScrolledIntoView($(this))){
            $(this).removeClass('show-me').css({ 'display' : 'none' }).fadeIn();
        }
    });
});
});
