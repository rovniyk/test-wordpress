<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 */
?>
<!-- Header test text  -->
<!DOCTYPE html>
<html >
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <header class="container">
            <div class="row">
                <?php $head_logo = get_field('header_images', "option"); ?>
                <div class="col-md-7 col-sm-7">                
                    <ul class="logoLine">
                        <?php foreach ($head_logo as $logo):  //pa($head_logo);?>
                            <li>
                                <?php if (!empty($logo['link'])): ?>
                                    <a href="<?php echo $logo['link']; ?>" >
                                    <?php endif; ?>  
                                    <?php if (!empty($logo['image'])): ?>
                                        <img src="<?php echo wp_get_attachment_image_url($logo['image'], 'header-preview'); ?>" alt="logo" >                                
                                    </a>
                                <?php endif; ?>   
                            </li>
                        <?php endforeach; ?>  
                    </ul>
                </div>
                <div class="col-md-5 col-sm-5">              
                    <div class="topHeaderBlock">
                        <ul class="headerNav">
                            <li><a href="<?php the_field('shop_cart', 'option'); ?>" class="shop">Shop cart</a></li>
                            <li>
                                <ul class="headerListSoc">
                                    <li>
                                        <div class="sendSearch" style="background: url( <?php echo get_template_directory_uri() . '/images/headerSoc/soc5.png'; ?> )">
                                        </div>
                                    </li>
                                    <li><a target="_blank" href="<?php the_field('youtube_link', 'option'); ?>">
                                            <img src="<?php echo get_template_directory_uri() . '/images/headerSoc/soc4.png'; ?>" alt="youtube"></a>
                                    </li>
                                    <li><a target="_blank" href="<?php the_field('instagram_link', 'option'); ?>">
                                            <img src="<?php echo get_template_directory_uri() . '/images/headerSoc/soc3.png'; ?>" alt="instagram"></a>
                                    </li>
                                    <li><a target="_blank" href="<?php the_field('twitter_link', 'option'); ?>">
                                            <img src="<?php echo get_template_directory_uri() . '/images/headerSoc/soc2.png'; ?>" alt="twitter"></a>
                                    </li>
                                    <li><a target="_blank" href="<?php the_field('facebook_link', 'option'); ?>">
                                            <img src="<?php echo get_template_directory_uri() . '/images/headerSoc/soc1.png'; ?>" alt="facebook"></a>
                                    </li>  
                                </ul>
                            </li>
                            <li><a target="_blank" href="<?php the_field('donate_link', 'option'); ?>">donate</a></li>                        
                        </ul>                       
                        <p class="headerText">
                            <span><?php the_field('header_text_orange', 'option'); ?></span>
                            <?php the_field('header_text_black', 'option'); ?>
                        </p>                       
                    </div>  
                    <div class="searchRow">             
                        <form role="search" method="get"  action="">                       

                            <div class="searchHeaderBlock">                        
                                <div class="small-8 columns">
                                    <input type="text" value="" name="s"  placeholder="Search" class="inputSearch" autofocus/>                          
                                </div>  
                                <div class="small-4 columns">
                                    <input type="submit" value="Search" class="buttonSearch">
                                </div>                          
                            </div>                                                                   
                        </form>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-default navbar-static-top">             
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed icon-menu menuActive" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>                                 
                </div>
                <div id="navbar" class="navbar-collapse menu">

                    <?php if (has_nav_menu('primary')) : ?>
                        <?php
                        wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    'menu_class' => 'nav navbar-nav',
                                    'walker' => new My_Walker_Nav_Menu(),
                                )
                        );
                        ?>

                    <?php endif; ?>                    
                </div>            
            </nav>
        </header>
