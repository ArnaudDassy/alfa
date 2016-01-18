<?php get_header(); ?>

<section style="border-bottom:none;" class="team">

    <?php

    $url = sf_get_current_url('base');
    $category = get_category_by_path($url, false);

    ?>

    <h2> <?php echo $category->name; ?> </h2>

    <?php
    $query = new WP_query( 'post_type=job' ); //Looking for children articles

    while ( $query->have_posts() ):
        ?>
        <?php $query->the_post(); ?>
        <div class="job" id='<?php echo the_slug(); ?>'>
            <p class="job__title">
                <?php the_title(); ?>
            </p>
            <div class="job__content">
                <p class="job__description">
                    <?php echo get_field('description'); ?>
                </p>
                <ul>
                    <p class="job__title">Contact :</p>
                    <?php foreach(get_field('contact') as $people): ?>
                        <li><?php echo $people['name']; ?> : <?php echo $people['address']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

</section>

<?php get_footer(); ?>
