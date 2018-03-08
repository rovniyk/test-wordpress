<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
  * @since 1.0
 * @version 1.0
 */
get_header();
?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="articleSpace">   
                <?php
                // Start the loop.
                while (have_posts()) : the_post();
                    ?>
                    <h4 class="tittleBlock  padleft">
                        <?php the_title(); ?>            
                    </h4>
                    <div class="contentText">
                        <?php the_content(); ?>          
                    </div>           
                    <?php
                // End the loop.
                endwhile;
                ?>           
            </div>     
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
