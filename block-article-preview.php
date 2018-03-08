<div class="articleSpace">

    <?php if ($image_id = get_field('post_image', get_the_ID())) : ?>
        <div class="imgBlock">
            <img 
                src="<?php echo wp_get_attachment_image_url($image_id, 'post-preview'); ?>" 
                alt="<?php the_title(); ?>">
        </div>
    <?php endif; ?>

    <div class="contentText">
        <h5 class="titleArticle"><?php the_title(); ?></h5>
        <?php the_content(); ?>

        <a href="<?php the_permalink(); ?>" class="moreInfo">
            <?php _e('MORE INFO', 'testtheme'); ?>
        </a>

        <?php if ($more_info_link = get_field('more_info_link', get_the_ID())) : ?>
            <a href="<?php echo $more_info_link; ?>" class="bookNow">
                <?php _e('BOOK NOW', 'testtheme'); ?>
            </a>
        <?php endif; ?>
    </div>
</div>