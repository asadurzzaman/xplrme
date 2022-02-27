<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package xplrme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<style>
    <?php

    $img_id = get_theme_mod("banner_image");

    $img_url = wp_get_attachment_image_src($img_id );

     ?>
    .hero_section:after {
        content: "";
        width: 100%;
        height: 100%;
        background: url(<?php echo $img_url; ?>) no-repeat center center;
        top: 0;
        right: 0;
        position: absolute;
        display: inline-block;
        background-size: cover;
        z-index: -1;
    }
</style>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header class="header site-header">
		<div class="header_top">
			<div class="nav">
				<input type="checkbox" id="nav-check">
				<div class="nav-header">
					<div class="nav-title">
						<div class="logo">
							<?php
                            the_custom_logo();
                            if ( is_front_page() && is_home() ) :
                                ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php
                            else :
                                ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                            <?php
                            endif;
                            $xplrme_description = get_bloginfo( 'description', 'display' );
                            if ( $xplrme_description || is_customize_preview() ) :
                                ?>
								<p class="site-description"><?php echo $xplrme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                            <?php endif; ?>
						</div>
					</div>
				</div>
				<div class="cart">
					<img src="<?php echo get_template_directory_uri();
                    ?>/assets/img/add-to-basket.png" alt="">
				</div>
				<div class="nav-btn">
					<label for="nav-check">
						<span></span>
						<span></span>
						<span></span>
					</label>
				</div>
				<div class="nav-links">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                        )
                    );
                    ?>
				</div>
			</div>
			<div class="container mobile_hide">
				<div class="row">
					<div class="col-lg-6">
						<div class="header_left">
							<div class="logo">
								<?php
                                the_custom_logo();
                                if ( is_front_page() && is_home() ) :
                                    ?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php
                                else :
                                    ?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php
                                endif;
                                $xplrme_description = get_bloginfo( 'description', 'display' );
                                if ( $xplrme_description || is_customize_preview() ) :
                                    ?>
									<p class="site-description"><?php echo $xplrme_description;?></p>
                                <?php endif; ?>
							</div>
							<div class="category">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'menu-1',
                                        'menu_id'        => 'primary-menu',
                                    )
                                );
                                ?>
							</div>
							<div class="search">
								<a href="#"><i class="fa fa-search"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="header_right">
	                        <?php
	                        wp_nav_menu(
	                            array(
	                                'theme_location' => 'menu-2',
	                                'menu_id'        => 'right-menu',
	                            )
	                        );
	                        ?>
							<div class="cart">
								<img src="<?php echo get_template_directory_uri();
                                ?>/assets/img/add-to-basket.png" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="hero_section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="banner_text text-right">
							<h1>Banner Title<br> Goes Here</h1>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
								Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
							<a href="#">Get Started</a>
						</div>
						<div class="for_mobile">
							<img src="<?php echo get_template_directory_uri();
                            ?>/assets/img/banner-image.png" alt="">
							<a href="#">Get Started</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
