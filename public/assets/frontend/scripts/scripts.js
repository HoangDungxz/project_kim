$(document).ready(function(){
    $('#footerSubcribeFormSubmit').submit(function(event){
        if ($('#footerSubcribeFormSubmit').find('#nl_email').val()  == "") {
            alert("Please enter a valid email address, such as john@example.com.");
            $('#footerSubcribeFormSubmit').find('#nl_email').focus();
            return false;
        }

    });
});
$(document).ready(function() {
    $('#mobile-categories > ul').prepend($('#menu.navPages-container nav.navPages > ul').html());
    $('#mobile-categories > ul').css('max-height', screen.height);
    $('#mobile-categories ul li').has('ul li').addClass('hasSub').prepend('<span class="toggle-expand"></span>');

    $('#mobile-categories ul li.hasSub > span').click(function() {
       if ($(this).hasClass('toggle-expand')) {
           $(this).siblings('.subMegaMenu').addClass('sub-expand');
           $(this).parent().addClass('expanded');
           $(this).attr('class', 'toggle-close');
       } else if ($(this).hasClass('toggle-close')) {
           $(this).siblings('.subMegaMenu').removeClass('sub-expand');
           $(this).parent().removeClass('expanded');
           $(this).attr('class', 'toggle-expand');
       }
    });
});
$(document).ready(function() {
    /* Megamenu Settings */

    //BEAUTY ACCESSORIES
    menuItem(4).HaloMegaMenu({
        dropAlign: 'fullWidth',                  // Dropdown MegaMenu Alignment: left, right, center, fullWidth, leftEdge, rightEdge
        dropWidth: '880px',                     // Width of Dropdown MegaMenu (if dropAlign: fullWidth => dropWidth auto set 100%)
        dropType: 'noImage',                 // Type of Dropdown MegaMenu content: imageLeft, imageRight, noImage
        cateAreaWidth: '100%',                 // width of categories area
        cateColumns: 5,                         // columns of categories area - max 5 columns
        // contents for images column (HTML supported)
        bottomCates: '<div class="promotion-area">\
                    <p>Free International Shipping. No Minimum Purchase Required*</p>\
                </div>',
        disabled: false
    });

    //BODY ART
    menuItem(5).HaloMegaMenu({
        dropAlign: 'fullWidth',                  // Dropdown MegaMenu Alignment: left, right, center, fullWidth, leftEdge, rightEdge
        dropWidth: '880px',                     // Width of Dropdown MegaMenu (if dropAlign: fullWidth => dropWidth auto set 100%)
        dropType: 'imageLeft',                 // Type of Dropdown MegaMenu content: imageLeft, imageRight, noImage
        cateAreaWidth: '60%',                 // width of categories area
        imageAreaWidth: '40%',                 // width of images area
        cateColumns: 3,                         // columns of categories area - max 5 columns
        // contents for images column (HTML supported)
        images: '<a href="/demo_url/"><img src="/product_images/uploaded_images/megamenu-image-1.jpg"/></a>',
        disabled: false
    });

});