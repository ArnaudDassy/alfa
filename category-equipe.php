<?php get_header(); ?>

<section style="border-bottom:none;" class="team">

    <?php

    $url = sf_get_current_url('base');
    $category = get_category_by_path($url, false);

    ?>

    <h2> <?php echo $category->name; ?> </h2>

    <?php

    $args = array(
        'type'                     => 'post',
        'child_of'                 => 0,
        'parent'                   => 0,
        'orderby'                  => 'ID',
        'order'                    => 'ASC',
        'hide_empty'               => 0,
        'hierarchical'             => 1,
        'exclude'                  => '',
        'include'                  => '',
        'number'                   => '',
        'taxonomy'                 => 'team',
        'pad_counts'               => false
    );

    $categories = get_categories( $args );
    $idPrimary = [];

    ?>

    <?php foreach ($categories as $category) : ?>

        <div class="people__container">

            <?php $args = array(
                'orderby'           => 'name',
                'order'             => 'ASC',
                'hide_empty'        => false,
                'exclude'           => array(),
                'exclude_tree'      => array(),
                'include'           => array(),
                'number'            => '',
                'fields'            => 'all',
                'slug'              => '',
                'parent'            => $category->cat_ID,
                'hierarchical'      => true,
                'child_of'          => $category->cat_ID,
                'childless'         => false,
                'get'               => '',
                'name__like'        => '',
                'description__like' => '',
                'pad_counts'        => false,
                'offset'            => '',
                'search'            => '',
                'cache_domain'      => 'core'
            );
            ?>

            <?php

            $childCategory = get_terms('team', $args);

            ?>

            <h3> <?php echo $category->name; ?> </h3>

            <?php if(!empty($childCategory)) : ?>

                <?php foreach ($childCategory as $child) : ?>

                    <h4> <?php echo $child->name; ?> </h4>

                    <?php

                    $cat_id = $child->cat_ID;
                    $args = array(
                        'post_type' => 'equipe',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'team',
                                'field'    => 'term_id',
                                'terms'    => $child->term_taxonomy_id
                            ),
                        ),
                    );
                    $query = new WP_Query( $args );


                    ?>
                    <?php while( $query->have_posts() ) : ?>
                        <?php $query->the_post(); ?>
                        <div class="people" id='<?php echo the_slug(); ?>'>
                            <div class="people__photo">
                                <?php if(!!get_field('photo')) : ?>
                                    <img
                                        src="<?php echo get_field('photo')['url']; ?>"
                                        alt="Photo de <?php the_title(); ?>"
                                    />
                                <?php endif; ?>
                                <?php if(!get_field('photo')) : ?>
                                    <img
                                        src="<?php bloginfo('template_directory'); ?>/img/2.jpg"
                                        alt="Photo de <?php the_title(); ?>"
                                    />
                                <?php endif; ?>
                            </div>
                            <div class="people__infos">
                                <p class="people__infos__name">
                                    <span class="people__header">Nom et prénom</span><?php the_title(); ?>
                                </p>
                                <p class="people__infos__service">
                                    <span class="people__header">Rôle(s)</span>
                                    <span><?php echo get_field('role'); ?></span>
                                    <span><?php echo get_field('role_secondaire'); ?></span>
                                </p>
                            </div>
                        </div>

                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

                <?php endforeach; ?>

            <?php endif; ?>

            <?php if(empty($childCategory)) : ?>

                <?php

                $cat_id = $category->cat_ID;
                $args = array(
                    'post_type' => 'equipe',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'team',
                            'field'    => 'term_id',
                            'terms'    => $category->cat_ID
                        ),
                    ),
                );
                $query = new WP_Query( $args );

                ?>

                <?php while( $query->have_posts() ) : ?>

                    <?php $query->the_post(); ?>

                    <div class="people" id='<?php echo the_slug(); ?>'>
                        <div class="people__photo">
                            <?php if(!!get_field('photo')) : ?>
                                <img
                                    src="<?php echo get_field('photo')['url']; ?>"
                                    alt="Photo de <?php the_title(); ?>"
                                />
                            <?php endif; ?>
                            <?php if(!get_field('photo')) : ?>
                                <img
                                    src="<?php bloginfo('template_directory'); ?>/img/2.jpg"
                                    alt="Photo de <?php the_title(); ?>"
                                />
                            <?php endif; ?>
                        </div>
                        <div class="people__infos">
                            <p class="people__infos__name">
                                <span class="people__header">Nom et prénom</span><?php the_title(); ?>
                            </p>
                            <p class="people__infos__service">
                                <span class="people__header">Rôle(s)</span>
                                <span><?php echo get_field('role'); ?></span>
                                <span><?php echo get_field('role_secondaire'); ?></span>
                            </p>
                        </div>
                    </div>

                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            <?php endif; ?>

        </div>

    <?php endforeach; ?>

</section>

<?php get_footer(); ?>
