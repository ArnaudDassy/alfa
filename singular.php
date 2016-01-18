<?php get_header(); ?>
<?php while ( have_posts() ): ?>
  <?php the_post(); ?>
  <article>
    <h2><?php echo get_the_title(); ?></h2>
    <div class="arborescence">
      <p><a href="index.php">Accueil</a></p>
      <?php echo the_category('  >>  ', 'multiple')."  >>  "; ?>
      <p><?php echo get_the_title(); ?></p>
    </div>
    <div class="contentArticle">
      <?php echo the_content(); ?>
    </div>
  </article>
<?php endwhile; ?>
<?php get_footer(); ?>
