<?php
$events = get_field('events', get_the_ID());
//pa($events, 1);
?>
<section class="ourEvent container">       
    <div class="row">
        <?php foreach ($events as $event): //pa($event); ?>
            <div class="col-md-4">
                <?php if (!empty($event) && $event['event_type'] == 'page'): ?>
                    <h4 class="tittleBlock"><?php echo $event['page']->post_title; ?></h4>
                    <a href="<?php echo $event['link']; ?>">
                        <img src="<?php echo get_the_post_thumbnail_url($event['page']->ID, 'event-preview'); ?>" alt="fest">
                    </a>
                <?php else: ?>
                    <a href="<?php echo $event['link']; ?>">
                        <div class="concertBlockText">
                            <?php echo $event['text']; ?>
                        </div>
                    </a>
                <?php endif; ?> 
            </div>
        <?php endforeach; ?>  
    </div>      
</section>


