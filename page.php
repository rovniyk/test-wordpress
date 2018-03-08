<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 */
get_header();
?>

<section class="articleSpaceBlock container">  
    
            <?php
            // Start the loop.
            while (have_posts()) : the_post();
                ?>
                <h4 class="tittleBlock text-center">
                    <?php the_title(); ?>            
                </h4>
                <?php the_post_thumbnail('full'); ?>
                <div class="contentText">
                    <?php the_content(); ?>          
                </div>           
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            // End the loop.
            endwhile;
            ?>       
</section>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
