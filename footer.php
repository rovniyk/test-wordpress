<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package WordPress * 
 * @since 1.0
 * @version 1.0
 */
?>
<?php
$our_partn = get_field('our_partners', "option");
$partner_count = 1;
?>

<footer>
    <h4 class="tittleBlock text-center"><?php the_field('footer_title', 'option'); ?></h4>     
    <div class="owl-carousel owl-theme logoList actSliderFooter">

        <?php foreach ($our_partn as $part): ?>
            <div class="item">
                <?php if (!empty($part['partner_link'])): ?>
                    <a href="<?php echo $part['partner_link'] ?>" target="_blank">
                    <?php endif; ?> 
                    <?php if (!empty($part['partner_image']['url'])): ?>
                        <img src="<?php echo $part['partner_image']['url'] ?>" alt="<?php echo $part['partner_image']['name'] ?>" class="logo<?php echo $partner_count++ ?>">
                    <?php endif; ?> 
                    <?php if (!empty($part['partner_link'])): ?>    
                    </a>
                <?php endif; ?> 
            </div>
        <?php endforeach; ?>
    </div>

    <div class="back-to-top">  
        <img src="<?php echo get_template_directory_uri() . '/images/upArroy.png'; ?>" alt="up">
    </div>
    <p class="textFooter text-center"><?php the_field('site_footer_title', 'option'); ?></p>
    <p class="textFooter text-center"><?php the_field('address', 'option'); ?></p>
    <p class="textFooter text-center">Phone:<a href="tel:<?php the_field('phone', 'option'); ?>" class="footerLinkNum"> <?php the_field('phone', 'option'); ?></a></p>
    <a href="mailto:<?php the_field('admin_email', 'option'); ?>" class="text-center footerLink"><?php the_field('admin_email', 'option'); ?></a>
    <a href="<?php the_field('site_link_1', 'option'); ?>" class="text-center footerLink"><?php the_field('site_link_1', 'option'); ?></a>
    <a href="<?php the_field('site_link_2', 'option'); ?>" class="text-center footerLink"><?php the_field('site_link_2', 'option'); ?> </a>
    <ul class="footerListSoc">
        <li><a target="_blank" href="<?php the_field('facebook_link', 'option'); ?>"><img src="<?php echo get_template_directory_uri() . '/images/fb.png'; ?>" alt="facebook"></a></li>
        <li><a target="_blank" href="<?php the_field('twitter_link', 'option'); ?>"><img src="<?php echo get_template_directory_uri() . '/images/tw.png'; ?>" alt="twiter"></a></li>
        <li><a target="_blank" href="<?php the_field('instagram_link', 'option'); ?>"><img src="<?php echo get_template_directory_uri() . '/images/ins.png'; ?>" alt="instagram"></a></li>
        <li><a target="_blank" href="<?php the_field('youtube_link', 'option'); ?>"><img src="<?php echo get_template_directory_uri() . '/images/youtube.png'; ?>" alt="youtube"></a></li>
        <li><a target="_blank" href="#"><img src="<?php echo get_template_directory_uri() . '/images/search.png'; ?>" alt="search"></a></li>
    </ul>
    <p class="textFooter text-center"><?php the_field('design_text', 'option'); ?><a href="www.spacelabdesign.com" class="footerLinkNum"><?php the_field('design_link', 'option'); ?></a></p>
    <p class="textFooter text-center">
        <?php the_field('photography', 'option'); ?>
    </p>    

    <!-- </footer> -->

    <?php wp_footer(); ?>

</body>
</html>
