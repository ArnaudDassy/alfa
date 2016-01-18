<?php get_header(); ?>

    <section class="map">

        <h2>Plan du site</h2>

        <div>
            <h3>Services</h3>
            <?php
            $args = array(
                'type'                     => 'post',
                'child_of'                 => 0,
                'parent'                   => '',
                'orderby'                  => 'ID',
                'order'                    => 'ASC',
                'hide_empty'               => 0,
                'hierarchical'             => 1,
                'exclude'                  => '',
                'include'                  => '',
                'number'                   => '',
                'taxonomy'                 => 'category',
                'pad_counts'               => false

            );
            $categories = get_categories( $args );
            foreach ($categories as $category) :
                ?>
                <?php if($category->parent == '199'): ?>
                <li>
                    <h4><a href="<?php bloginfo('wpurl'); ?>/category/services/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a></h4>
                    <ul>
                        <?php
                        $cat_id = $category->cat_ID; //Saving id of the cat
                        $cat_slug_parent = $category->slug;

                        $query = new WP_query( 'category__in='.$cat_id ); //Looking for children articles

                        while ( $query->have_posts() ):
                            ?>
                            <li>
                                <?php $query->the_post(); ?>
                                <a href="<?php bloginfo('url') ?>/<?php echo the_slug(); ?>"><?php echo get_the_title(); ?></a>
                            </li>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                        <?php foreach ($categories as $cat_child) : ?>
                            <?php if($cat_child->parent == $cat_id): ?>
                                <li>
                                    <h5><a href="<?php bloginfo('wpurl'); ?>/category/services/<?php echo $cat_slug_parent ?>/<?php echo $cat_child->slug; ?>"><?php echo $cat_child->name ?></a></h5>
                                    <ul>
                                        <?php
                                        $cat_id_child = $cat_child->cat_ID; //Saving id of the cat
                                        $query = new WP_query( 'category__in='.$cat_id_child ); //Looking for children articles

                                        while ( $query->have_posts() ):
                                            ?>
                                            <li>
                                                <?php $query->the_post(); ?>
                                                <a href="<?php bloginfo('url') ?>/<?php echo the_slug(); ?>"><?php echo get_the_title(); ?></a>
                                            </li>
                                        <?php endwhile; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div>
            <h3>Navigation</h3>
            <ul>
                <li><a href="<?php bloginfo('wpurl'); ?>/category/equipe">Equipes</a></li>
                <li><a href="<?php bloginfo('wpurl'); ?>/category/tarif">Tarifs</a></li>
                <li><a href="<?php bloginfo('wpurl'); ?>/category/contact">Contact</a></li>
                <li><a href="<?php bloginfo('wpurl'); ?>/category/self-help">Self-Help</a></li>
                <li><a href="<?php bloginfo('wpurl'); ?>/category/faq">FAQ</a></li>
                <li><a href="<?php bloginfo('wpurl'); ?>/category/liens">Liens</a></li>
                <li><a href="<?php bloginfo('wpurl'); ?>/category/job">Stages & Jobs</a></li>
                <li><a href="<?php bloginfo('wpurl'); ?>/category/partenariat">Partenaires & Réseaux</a></li>
            </ul>
        </div>

    </section>

<?php get_footer(); ?>
