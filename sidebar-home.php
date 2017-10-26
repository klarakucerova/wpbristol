<aside class="sidebar">
    <div class="search-sidebar"><?php get_search_form(); ?></div>
    <h3>Our Meet-ups</h3>
    <?php $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>13)); ?>
    <?php if ( $wpb_all_query->have_posts() ) : ?>
        <ul class="meetup-list">
            <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                <li>
                    <span class="meetup-date"><?php the_field('event_date'); ?></span>
                    <span class="meetup-link">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </span>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
</aside>