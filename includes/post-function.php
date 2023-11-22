<?php
// Shortcode to display Swiper Card Carousel Post Slider Elementor
function swiper_latest_posts_shortcode($atts) {
    // Shortcode attributes
    $atts = shortcode_atts(
        array(
            'category' => '',  // Specify category slug or ID
            'posts_per_page' => -1, // Change this value based on the number of posts you want to display
        ),
        $atts,
        'swiper_latest_posts'
    );

    ob_start();

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => $atts['posts_per_page'],
        'category_name'  => $atts['category'],
    );

    $latest_posts = new WP_Query($args);

    if ($latest_posts->have_posts()) {
        ?>
        <section>
            <div class="swiper">
                <div class="swiper-wrapper">
                   <?php while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
    <?php
    $post_id = get_the_ID();
    $swiper_class = 'swiper-slide swiper-slide' . $post_id;

    // Get the featured image URL
    $featured_image_url = get_the_post_thumbnail_url($post_id, 'full');

    // Fallback image URL
    $fallback_image_url = plugin_dir_url(__FILE__) . '../fallback-image.jpg';

    // Use the featured image if available, otherwise use the fallback image
    $background_image_url = $featured_image_url ? esc_url($featured_image_url) : esc_url($fallback_image_url);
    ?>
    <div class="<?php echo esc_attr($swiper_class); ?>" style="background-image: url('<?php echo $background_image_url; ?>'); background-repeat: no-repeat; background-size: cover; background-position: center;">
    
                            <span><?php echo get_the_category()[0]->name; ?></span>
                            <div>
                                <h2 class="s-title"><a style="color:#FFFFFF; text-decoration:none" href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                                <p>
                                <svg class="svg-icon" viewBox="0 0 20 20" fill="#FFFFFF">
    <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
</svg>

                                    <?php
                                    $author_id = get_the_author_meta('ID');
                                    $author_name = get_the_author_meta('display_name', $author_id);
                                    echo esc_html($author_name);
                                    ?>
                                </p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>

        <?php
    }

    wp_reset_postdata();

    return ob_get_clean();
}

add_shortcode('swiper_latest_posts', 'swiper_latest_posts_shortcode');