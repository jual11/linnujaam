<div class="site-menu-xs" style="display: none;">
    <div class="site-menu-xs__inner">

        <div class="site-menu-xs__menu">
			<?php cc_display_menu(); ?>
        </div>

    </div>
    
    <div class="site-menu-xs__close-wrap">
        <button class="btn-close js-close-xs-menu" aria-label="Close menu">&times;</button>
    </div>
</div>

<script>
(function($) {	
    /* Site menu */

    var siteXsMenu = $('.site-menu-xs');
    var siteXsMenuActive = 'site-menu-xs--active';
    
    $('.js-open-xs-menu').click(function(){
        siteXsMenu.fadeIn(250);
        siteXsMenu.addClass(siteXsMenuActive)
    });
    
    $('.js-close-xs-menu').click(function(){
        siteXsMenu.fadeOut(200);
        siteXsMenu.removeClass(siteXsMenuActive)
    });
    
    $(document).on('mousedown touchstart', function(e) {
        var container = siteXsMenu;
        if ( container.is(e.target) || container.has(e.target).length > 0) {
        // do nothing
        } else {
            container.fadeOut();
            container.removeClass(siteXsMenuActive);
        }
    });
    
}) (jQuery);
</script>