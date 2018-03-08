<?php 


$youtube = get_field ('video_link', get_the_ID());
$button_image_id = get_field ('button_on_play', get_the_ID());
$poster_image_id = get_field ('poster_image', get_the_ID());
//pa($youtube,1);
?>


<section class="youtube">
    <h4 class="tittleBlock padleft">
        <?php the_field('header_last_video_section'); ?>
    </h4>
    <div class="video_container" data-youtube-src="<?php echo $youtube; ?>">
        <buttom class="play_button">
            <?php if ($button_image_id):?>
            <img src="<?php echo wp_get_attachment_image_url($button_image_id, 'button-play-preview'); ?>" alt="start Play">
            <?php endif; ?>
        </buttom>
        <div class="poster" >
            <?php if ($poster_image_id):?>
            <img src="<?php echo wp_get_attachment_image_url($poster_image_id, 'video-poster-preview'); ?>" alt="videoYoutube">
            <?php endif; ?>
        </div>
    </div>
</section>