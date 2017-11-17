<div class="meetup-next">
    <?php $the_query = new WP_Query( 'posts_per_page=1' ); ?>

    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
        <div class="meetup-next-header">
            <div class="meetup-list-date meetup-next-date"><?php the_field('event_date'); ?></div>
            <div>
                <a href="<?php the_permalink(); ?>" class="meetup-next-title"><?php the_title(); ?></a>
                <div class="meetup-next-place">at Famous Royal Navy Volunteer</div>
            </div>
        </div>
        <?php the_content(); ?>
        <a href="<?php the_field('event_link'); ?>" class="button meetup-next-link" target="_blank">Go to Meetup</a>
    <?php endwhile; 
    wp_reset_postdata(); ?>
</div>
