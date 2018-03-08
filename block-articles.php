<?php
$posts = get_posts_for_article_block();
$sing_with_us_block = get_sing_with_us_block();
?>
<section class="articleSpaceBlock container">
    <?php if ( $posts->have_posts() ) : ?>
        <h4 class="tittleBlock padleft"><?php the_title(); ?></h4>

        <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

            <?php get_template_part( 'block', 'article-preview' ); ?>           

        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
    <?php endif; ?>


    <?php if ( $sing_with_us_block->have_posts() ) : ?>
    <h4 class="tittleBlock padleft">
        <?php _e('SING WITH US', 'tettheme');?>
    </h4>

     <?php while ( $sing_with_us_block->have_posts() ) : $sing_with_us_block->the_post(); ?>

        <?php get_template_part( 'block', 'article-preview' ); ?>           

    <?php endwhile; ?>
    <?php wp_reset_query(); ?>

    <?php endif; ?>
</section>
