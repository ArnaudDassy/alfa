<?php get_header(); ?>
<section style="border-bottom:none;">
    <?php $url = sf_get_current_url('base');
    $category = get_category_by_path($url, false);
    ?>
    <h2><?php echo $category->name; ?></h2>
    <?php
    $query = new WP_query( 'post_type=partenariat'); //Looking for children articles

    while ( $query->have_posts() ):
        ?>
        <?php $query->the_post(); ?>
        <div class="partenariat">
            <p class="partenariat__title">
                <?php the_title(); ?>
            </p>
            <div class="partenariat__content">
                <div class="partenariat__description">
                    <?php if(!!get_field('img')) : ?>
                        <img src="<?php echo get_field('img')['url']; ?>"
                             alt="Logo : <?php the_title(); ?>" />
                    <?php endif; ?>
                    <?php print get_field('descritpion'); ?>
                </div>
            </div>
            <div class="partenariat__contact">
                <p class="partenariat__contact__header">Contact</p>
                <?php $fields = get_field('contact'); ?>
                <ul>
                    <?php foreach($fields as $contact) : ?>
                        <li>
                            <?php print($contact['address']); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
</section>
<?php get_footer(); ?>
