<?php get_header(); ?>
  <section style="border-bottom:none;">
    <h2>Nos batiments</h2>
    <?php
      $query = new WP_query( ['post_type' => 'batiment', 'order' => 'ASC']); //Looking for children articles

      while ( $query->have_posts() ):
    ?>
        <?php $query->the_post(); ?>
        <div class="contact">
          <p class="contact__title">
            <?php the_title(); ?>
          </p>
          <div class="contact__image">
            <!-- Google Maps -->
            <?php
              $iframe = utf8_encode(get_field('map'));

              $aIFrame = explode('&quot;', $iframe);

              echo('<iframe src="'.$aIFrame[1].'" width="480" height="360"></iframe>');
            ?>

          </div>
          <div class="contact__info">
            <p> <span>Adresse :</span> <?php echo get_field('adresse'); ?> </p>
            <p> <span>Téléphone :</span> <?php echo get_field('phone'); ?> </p>
            <p> <span>Fax :</span> <?php echo get_field('fax') ?> </p>
            <?php foreach(get_field('mails') as $mail): ?>
              <div class="contact__mail">
                <p class="contact__header">
                  <?php echo $mail['libelle']; ?>
                </p>
                <p>
                  <?php echo $mail['mail']; ?>
                </p>
              </div>
            <?php endforeach; ?>
            <?php foreach(get_field('num_entreprise') as $mail): ?>
              <div class="contact__entreprise">
                <p class="contact__header">
                  Numéro d'entreprise
                </p>
                <p>
                   <?php echo $mail['libelle']; ?> : <?php echo $mail['num_entreprise']; ?>
                </p>
              </div>
            <?php endforeach; ?>
            <?php foreach(get_field('numero_compte') as $mail): ?>
              <div class="contact__compte">
                <p class="contact__header">
                  Numéro de compte
                </p>
                <p>
                   <?php echo $mail['libelle']; ?> : <?php echo $mail['num_compte']; ?>
                </p>
              </div>
            <?php endforeach; ?>
            <div class="contact__horaire">
              <?php if(!empty(get_field('horaire'))) : ?>
                <p class="contact__header">
                  Horaire
                </p>
                <p>
                   <?php echo(get_field('horaire')); ?>
                </p>
              <?php endif; ?>
            </div>
          </div>
          <p style="clear:both;text-indent:-5000px">
            My job is to clear
          </p>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

  </section>
<?php get_footer(); ?>
