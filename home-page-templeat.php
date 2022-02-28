<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */


get_header();

if(!function_exists('woofusion_get_categories')){
    function woofusion_get_categories($category_type = 'product_cat'){
        $categories = array();
        // get categories
        $query_args = [
            'taxonomy'      => $category_type,
            /*'orderby'       => 'name',
            'order'         => 'DESC',
            'hide_empty'    => false,
            'number'        => 1500*/
        ];

        $terms = get_terms( $query_args );
        $count = count( (array) $terms);

        if($count > 0):
            foreach ($terms as $term) {
                $categories[] = array('name' => $term->name, 'term_id' => $term->term_id);
            }
        endif;

        return $categories;
    }
}

$categories = woofusion_get_categories();

?>

    <section class="course_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-start">
                        <h2><?php echo get_theme_mod( 'courses_title_cb' ,'Browse Courses by Sections') ;  ?></h2>
                    </div>
                    <div class="tab_filter">
                        <ul class="nav">
                            <?php
                                if( !empty( $categories ) ){
                                    $i = 1;
                                    foreach ( $categories as $row ){
                                            $category_slug = strtolower( trim( $row['name'], ' ' ) );
                                        ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link <?php echo ( $i == 1 ) ? 'active' : '';?>" id="" data-bs-toggle="tab" data-bs-target="#<?php echo $category_slug; ?>" ><?php echo $row['name']; ?></button>
                                        </li>
                                    <?php $i++;}
                                }
                            ?>
                        </ul>
                    </div>
                </div>

                <div class="tab-content">
                    <?php
                    if (!empty($categories)) {
                        $count = 1;
                        foreach ($categories as $val) {
                            $category_name = strtolower( trim( $val['name'], ' ' ) );
                            ?>
                            <div class="tab-pane fade <?php echo ( $count == 1 ) ? 'show active' : '';?>" id="<?php echo $category_name; ?>" role="tabpanel" aria-labelledby="home-tab">
                                <div class="slick-area">
                                    <?php
                            global $post;
                            global $woocommerce;
                            global $product;

                            $query = array(
                                'post_type' => 'product',
                                'posts_per_page' => -1,
                                'orderby' => 'rand',
                            );
                            $loop_content = new WP_Query( $query );

                            $counter = 0;
                            while ( $loop_content->have_posts() ) : $loop_content->the_post();
                                $counter++;
                                    ?>
                                    <div class="single_course tab-pane fade <?php echo ( $counter == 1 ) ? 'show active' : '';?>" role="tabpanel" data-cat="">
                                        <div class="course_img">
                                            <?php echo get_the_post_thumbnail(); ?>
                                        </div>
                                        <div class="course_text">
                                            <h3><?php the_title(); ?></h3>
                                            <ul class="course_cat">

                                                <li><a href="#">Group</a></li>
                                                <li><a href="#">Available</a></li>
                                            </ul>
                                        </div>
                                        <div class="course_bottom">
                                            <p class="price"><?php echo $product->get_price_html(); ?></p>
                                            <a href="<?php the_permalink(); ?>"><i class="fas fa-angle-right    "></i></a>
                                        </div>
                                    </div>

                                    <?php
                            endwhile;
                                    wp_reset_query();
                                ?>

                                </div>
                            </div>

                       <?php $count++; }
                    }

                    ?>

 

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="explore_button text-center">
                        <a href="#">Explore More <i class="fas fa-arrow-right    "></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="below_course_section">
        <div class="tab_desc">

            <div class="choose_tab full">
                <ul class="nav">
                    <?php
                    $tab1 = get_theme_mod('tab_1_title');

                    if( !empty($tab1)): ?>
                        <li>
                            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#pills-home">
                                <i class="fas fa-gear    "></i>
                                <p><?php echo $tab1; ?></p>
                            </button>
                        </li>
                    <?php
                    endif;
                    $tab2 = get_theme_mod('tab_2_title');
                    if( !empty($tab2)):
                        ?>
                        <li>
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-profile">
                                <i class="fas fa-gear    "></i>
                                <p><?php echo $tab2; ?></p>
                            </button>
                        </li>
                    <?php
                    endif;
                    $tab3 = get_theme_mod('tab_3_title');
                    if( !empty($tab3)):

                        ?>
                        <li>
                            <button class="nav-link"  data-bs-toggle="pill" data-bs-target="#pills-contact">
                                <i class="fas fa-gear    "></i>
                                <p><?php echo $tab2; ?></p>
                            </button>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="tab-content">
                <?php
                $tab1_desc              = get_theme_mod('tab_1_desc');
                $tab1_desc_title        = get_theme_mod('tab_1_desc_title');
                $tab1_desc_sub_title    = get_theme_mod('tab_1_desc_sub_title');

                if( !empty($tab1)): ?>
                    <div class="tab-pane fade show active" id="pills-home" >
                        <h3><?php echo $tab1_desc_title; ?></h3>
                        <h2><?php echo $tab1_desc_sub_title; ?></h2>
                        <p><?php echo $tab1_desc; ?></p>
                    </div>

                <?php endif;?>

                <div class="tab-pane fade" id="pills-profile">
                    <h3>Why You Should Chooss</h3>
                    <h2>XPLRME</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                </div>
                <div class="tab-pane fade" id="pills-contact">
                    <h3>Why You Should Chooss</h3>
                    <h2>XPLRME</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                </div>
            </div>

            <div class="choose_tab tab_mobile">
                <ul class="nav">
                    <?php
                    $tab1 = get_theme_mod('tab_1_title');

                    if( !empty($tab1)): ?>
                        <li>
                            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#pills-home">
                                <i class="fas fa-gear    "></i>
                                <p><?php echo $tab1; ?></p>
                            </button>
                        </li>
                    <?php
                    endif;
                    $tab2 = get_theme_mod('tab_2_title');
                    if( !empty($tab2)):
                        ?>
                        <li>
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-profile">
                                <i class="fas fa-gear    "></i>
                                <p><?php echo $tab2; ?></p>
                            </button>
                        </li>
                    <?php
                    endif;
                    $tab3 = get_theme_mod('tab_3_title');
                    if( !empty($tab3)):

                        ?>
                        <li>
                            <button class="nav-link"  data-bs-toggle="pill" data-bs-target="#pills-contact">
                                <i class="fas fa-gear    "></i>
                                <p><?php echo $tab2; ?></p>
                            </button>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </section>
    <div class="review_title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_header text-center">
                        <h2><?php echo get_theme_mod( 'review_title_cb' ,'What Our Explorers Think') ;  ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="review_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="carousel_area autoplay">
                        <?php

                        $args = array(
                            'post_type' => 'review',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                        );

                        $loop = new WP_Query( $args );

                        while ( $loop->have_posts() ) : $loop->the_post();
                            global $post;

                            ?>
                            <div class="singe-item">
                                <div class="single_review text-center">
                                    <?php
                                    $id = get_the_ID();
                                    $banner_img = get_post_meta($id, 'post_banner_img', true);
                                    $banner_img = explode(',', $banner_img);
                                    if(!empty($banner_img)) {
                                        ?>
                                        <?php  foreach ($banner_img as $attachment_id) { ?>
                                            <img src="<?php echo wp_get_attachment_url( $attachment_id );?>">
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                                <div class="carousel-text">
                                    <?php the_content(); ?>
                                    <div class="author text-center">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                <?php the_post_thumbnail(); ?>
                                            </a>
                                        <?php endif; ?>

                                        <h4><?php the_title(); ?></h4>
                                        <h6><?php
                                            $categories = get_the_terms( $post->ID, 'country' );
                                            foreach( $categories as $category ) {
                                                echo  $category->name;
                                            } ?></h6>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="join_us_section">
        <div class="container">
            <div class="row">
                <div class="offset-lg-6 col-lg-6">
                    <div class="img_text">
                        <p>Join us as a</p>
                        <h3>Provider</h3>
                        <p>to start a new</p>
                        <h3>Journey</h3>
                        <div class="sign_up">
                            <a href="#">Sign Up Now</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php
get_footer();