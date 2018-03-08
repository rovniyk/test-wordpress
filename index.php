<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 *
 * @package WordPress
 * @subpackage Test Custom4web
 * @since 1.0
 * @version 1.0
 */

?>

<?php get_header(); ?>
<  <div id="main">
    <div class="fix-width">
        <div class="about-page">
            <div id="sidebar-left"><div class="block">HELLOO 
                    <?php show_sidebar(); ?>

                </div>
            </div>

            <?php if (have_posts()) : ?>
                <div id="content">
                    <h2><?php the_title(); ?></h2>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="box-detail">
                            <em>Article posted on <?php the_time('l, F, jS, Y'); ?> at <?php the_time(); ?></em>
                            <?php the_content(); ?>
                            <?php
                        endwhile;
                    else:
                        ?>
                        <h3>Sorry but we could not find what you were looking for</h3> 
                    <?php endif; ?>

                </div>
            </div>   
        </div> 
    </div>
</div>
<?php get_footer(); ?>