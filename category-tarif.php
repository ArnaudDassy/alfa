<?php get_header(); ?>

<section style="border-bottom:none;" class="team">

    <?php

    $url = sf_get_current_url('base');
    $category = get_category_by_path($url, false);

    ?>

    <h2> <?php echo $category->name; ?> </h2>

    <?php
    $query = new WP_query( 'post_type=tarif' ); //Looking for children articles

    while ( $query->have_posts() ):
        ?>
        <?php $query->the_post(); ?>
        <div class="tarif" id='<?php echo the_slug(); ?>'>
            <p class="tarif__title">
                <?php the_title(); ?>
            </p>
            <div class="tarif__content">
                <?php if(!empty(get_field('description'))): ?>
                    <p class="tarif__description">
                        <?php echo get_field('description'); ?>
                    </p>
                <?php endif; ?>
                <ul>
                    <?php foreach(get_field('tarif') as $tarif): ?>
                        <li><?php echo $tarif['titre_tarif']; ?> : <?php echo $tarif['prix']; ?>€</li>
                    <?php endforeach; ?>
                </ul>
                <?php if(!empty(get_field('note'))): ?>
                    <p class="tarif__note">
                        <?php echo get_field('note'); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

</section>

<?php get_footer(); ?>
