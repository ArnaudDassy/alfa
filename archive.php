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
        $query = new WP_query( 'category__in='.$category->cat_ID); //Looking for children articles

        while ( $query->have_posts() ):
      ?>
        <li>
          <?php $query->the_post(); ?>
          <a href="<?php bloginfo('url') ?>/<?php echo the_slug(); ?>"><?php echo get_the_title(); ?></a>
        </li>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </ul>

    <?php $categoryChild = get_categories(array(
      'child_of' => $category->cat_ID
    )) ?>

    <?php if (!empty($categoryChild)): ?>

      <ul>
        <?php foreach ($categoryChild as $child) : ?>
          <li>
            <a href="/<?php bloginfo('wpurl'); ?>/category/services/<?php echo $category->slug ?>/<?php echo $child->slug; ?>"><?php echo $child->name ?></a>
            <ul>
              <?php
                $cat_id_child = $child->cat_ID; //Saving id of the cat
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
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </section>

<?php get_footer(); ?>
