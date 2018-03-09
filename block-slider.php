<?php
/* get page option */
$home_slider = get_field('home_slider', get_the_ID());
$slide_count = 1;

if (!empty($home_slider) && is_array($home_slider)) : ?>

    <section class="sliderBlock">
        <div class="owl-carousel owl-theme actSlider">

            <?php foreach ($home_slider as $slide) : ?>
                <div class="item mainSlider<?php echo $slide_count; ?>">
                    <div class="sliderStyle slider<?php echo $slide_count++; ?>"  
                         style="background: url(<?php echo $slide['image'];?>) center center no-repeat;
                            background-position: center center;
                            background-size: cover;" >
                        
                        <div class="containerSlider">
                            <div class="blockNow">
                                
                                <?php if( ! empty( $slide['title'] ) ) : ?>
                                    <h3><?php echo $slide['title']; ?></h3>
                                <?php endif;  ?>
                                    
                                <?php if( ! empty( $slide['content'] ) ) : ?>
                                    <p class="textSlider">
                                        <?php echo $slide['content']; ?>
                                    </p>
                                <?php endif;  ?>
                                
                               
                                 <?php if( ! empty( $slide['link'] ) ) : ?>
                                    <a href="<?php echo $slide['link']; ?>" class="nowLink">
                                        <?php _e('BOOK NOW', 'testtheme');?>
                                    </a>
                                 <?php endif;  ?>
                            </div>
                        </div>           
                    </div>
                </div> 
            <?php endforeach; ?>

        </div>
    </section>
    <!-- Some worrds for test -->

<?php endif; ?>