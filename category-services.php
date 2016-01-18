<?php get_header(); ?>

    <section style="border-bottom:none;" class="category">
        <?php $url = sf_get_current_url('base');
        $category = get_category_by_path($url, false);
        ?>
        <h2><?php echo $category->name; ?></h2>
        <div class="arborescence">
            <p><a href="<?php bloginfo('url'); ?>">Accueil</a></p>
            <?php
            $chain = explode('  >>  ', get_category_parents( $category->cat_ID, true, "  >>  ", false ));
            array_pop($chain);
            $y = 0;
            for ($i=0; $i < count($chain); $i++) {
                echo $chain[$i];
                if(++$y < count($chain)){
                    echo "  >>  ";
                }
            }
            ?>
        </div>
        <p>
            <?php echo $category->description; ?>
        </p>
        <ul>
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
                        <a href="<?php bloginfo('wpurl'); ?>/category/services/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </section>

<?php get_footer(); ?>
