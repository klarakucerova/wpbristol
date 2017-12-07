<aside class="sidebar">
    <div class="search-sidebar"><?php get_search_form(); ?></div>
    <h3>Previous Meetups</h3>
    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

    <?php $args = array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' =>  14,
        'paged' => $paged
    );

    $wp_query = new WP_Query( $args ); ?>

    <?php if ( $wp_query->have_posts() ) : ?>
        <ul class="meetup-list">
            <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                <li <?php post_class(); ?>>
                    <span class="meetup-list-date"><?php the_field('event_date'); ?></span>
                    <span class="meetup-list-link">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </span>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
</aside>
