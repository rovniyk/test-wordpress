<?php
$images = get_field('instagram_gallery');
//pa($images,1);

?>

<section class="instagramBlock">
    <h4 class="tittleBlock text-center">
        <?php the_field('header_instagramblock_section'); ?>	
    </h4>

    <div class="wiget">
        <?php if ($images): ?>	    
            <?php foreach ($images as $image): ?>
        <img src="<?php echo $image['sizes']['instagram-preview']; ?>" alt="<?php echo $image['alt']; ?> " style="width: 310px"/>            
            <?php endforeach; ?>	    
        <?php endif; ?>
    </div>
</section>