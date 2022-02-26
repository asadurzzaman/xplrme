<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package xplrme
 */

?>

<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-6 col-lg-3">
				<div class="widget">
                    <?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
			</div>
			<div class="col-6 col-lg-3">
				<div class="widget">
                    <?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
			</div>
			<div class="col-6 col-lg-3">
				<div class="widget">
                    <?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
			</div>
			<div class="col-6 col-lg-3">
				<div class="widget">
                    <?php dynamic_sidebar( 'footer-4' ); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="footer_bottom">
					<div class="social text-center">
						<ul>
							<li><a href="#"><img src="<?php echo get_template_directory_uri();
                                ?>/assets/img/facebook (1) 1.svg" alt=""></a></li>
							<li><a href="#"><img src="<?php echo get_template_directory_uri();
                                ?>/assets/img/instagram (1) 1.svg" alt=""></a></li>
						</ul>
					</div>
					<div class="site-info cpoyright text-center">
						<p>&copy; <?php echo date('Y')?> <?php echo bloginfo('title') ?> | <?php echo esc_html__('All rights reserved', 'xplrme') ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>
<script>
    jQuery('.slick-area').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 4000,
        arrows: true,
        centerPadding: '50px',
        prevArrow:'<button type="button" class="slick-prev"><i class="fas fa-angle-left    "></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-angle-right    "></i></button>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]

    });

    jQuery('.autoplay').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        dots:true,
        arrows: false,
    });
</script>
</body>
</html>
