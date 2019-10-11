jQuery(document).ready(function($) {
    "use strict";

    //FontAwesome Icon Control JS
    $('body').on('click', '.business-ezone-icon-list li', function(){
        var icon_class = $(this).find('i').attr('class');
        $(this).addClass('icon-active').siblings().removeClass('icon-active');
        $(this).parent('.business-ezone-icon-list').prev('.business-ezone-selected-icon').children('i').attr('class','').addClass(icon_class);
        $(this).parent('.business-ezone-icon-list').next('input').val(icon_class).trigger('change');
    });

    $('body').on('click', '.business-ezone-selected-icon', function(){
        $(this).next().slideToggle();
    });

});
