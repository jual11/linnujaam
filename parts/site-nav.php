<?php
if ( is_user_logged_in() ) {
    //Current user
    $current_user = wp_get_current_user();
    $current_user_name = $current_user->data->display_name;
    $current_user_email = $current_user->data->user_email;
}

?>

<div class="site-nav">
    <div class="site-nav__inner">

        <div class="site-nav__mob">
            <div class="site-nav__logo">
                <a class="site-nav__logo-link" href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="">
                </a>
            </div>
            <?php
            if ( is_user_logged_in() ) {
                ?>
                <div class="site-nav__burger js-open-xs-menu">  	
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <?php
            } else {
                ?>
                <a href="<?php echo esc_url(home_url('/login')); ?>" class="site-nav__log-in">
                    Logi sisse
                </a>
                <?php
            }
            ?>
        </div>


        <div class="site-nav__desc">

            <div class="site-nav__logo">
                <a class="site-nav__logo-link" href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="">
                </a>
            </div>

            <div class="site-nav__nav-bar">
                <?php
                // Is user logged in or not
                if ( is_user_logged_in() ) {
                    $logout_url = wp_logout_url();
                    ?>
                    <div class="site-nav__menu">
                        <?php cc_display_menu(); ?>
                    </div>
                    
                    <div class="site-nav__current-user">
                        <p class="site-nav__current-user-name js-current-user-name"><?php echo $current_user_name ?></p>
                        <p class="site-nav__current-user-email"><?php echo $current_user_email ?></p>
                    </div>

                    <a href="<?php echo $logout_url; ?>" class=" site-nav__menu-item site-nav__log-in">
                        Logi välja
                    </a>
                    <?php
                } else { 
                    ?>
                    <a href="<?php echo esc_url(home_url('/login')); ?>" class="site-nav__log-in">
                        Logi sisse
                    </a>
                    <?php
                }
                ?>
            </div>

        </div>

    </div>
</div>

<?php get_template_part('parts/site-menu-xs'); ?>