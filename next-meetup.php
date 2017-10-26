<div class="next-meetup">
    <?php $the_query = new WP_Query( 'posts_per_page=1' ); ?>

    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
        <div class="next-meetup-header">
            <div class="meetup-date next-meetup-date"><?php the_field('event_date'); ?></div>
            <div>
                <a href="<?php the_permalink(); ?>" class="next-meetup-title"><?php the_title(); ?></a>
                <div class="next-meetup-place">at Famous Royal Navy Volunteer</div>
            </div>
        </div>
        <?php the_content(); ?>
        <a href="<?php the_field('event_link'); ?>" class="button next-meetup-link">Go to Meetup</a>
    <?php endwhile; 
    wp_reset_postdata(); ?>
</div>
