<?php require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if( is_plugin_active( 'mailchimp-for-wp/mailchimp-for-wp.php' ) ):?>

<section class="subscribe">  
    <h4 class="tittleBlock text-center">
        <?php the_field('header_subscribe_section'); ?>
    </h4>
    <div class="formEmail">
        <?php echo do_shortcode('[mc4wp_form id="173"]'); ?>
    </div>
</section>

<?php endif; ?>




