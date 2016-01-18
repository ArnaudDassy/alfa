    <section class="footer">
      <h2 class="toHide">Navigation Footer</h2>
      <div class="servicesSM">
        <p class="header">Services</p>
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
      </div>
      <div class="navigationSM">
        <p class="header">Navigation</p>
        <ul>
          <li><a href="<?php bloginfo('url'); ?>">Accueil</a></li>
          <li><a href="<?php bloginfo('wpurl'); ?>/plan-du-site">Plan du site</a></li>
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
      <div class="contactSM">
        <p class="header">Contact</p>
        <p class="ico ico__adress">Rue de la Madeleine, 17 - 4000 Liège</p>
        <p class="ico ico__tel">04/223.09.03</p>
        <p class="ico ico__fax">04/223.56.86</p>
        <!-- <p class="ico ico__prevention">alfa.prevention@gmail.com</p>
        <p class="ico ico__therapeutique">alfa.therapeutique@gmail.com</p>
        <p class="ico ico__parentalite">alfa.parentalite@gmail.com</p>
        <p class="ico ico__rdr">alfa.rdr@gmail.com</p>
        <p class="ico ico__social">alfa.servicesocial@gmail.com</p>
        <p class="ico ico__administration">alfa.yvettepetit@gmail.com</p>
        <p class="ico ico__direction">alfa.dungelhoeff@gmail.com</p> -->
      </div>
    </section>
    <div id='hcard-Centre-Alfa' class="vcard toHide">
        <img style="float:left; margin-right:4px" src="http://www.guidesocial.be/_images/assoc/198x198/9309123305074846.jpg" alt="photo of " class="photo"/>
        <a class="url fn n" href="http://www.centrealfa.be"></a>
        <div class="org">Centre Alfa</div>
        <a class="email" href="mailto:alfa.servicesocial@gmail.com">alfa.servicesocial@gmail.com</a>
        <div class="adr">
            <div class="street-address">Rue de la Madeleine, 17 </div>
            <span class="locality">Liège</span>
            ,
            <span class="region">Liège</span>
            ,
            <span class="postal-code">4000</span>

            <span class="country-name">Belgium</span>
        </div>
        <div class="tel"> 04/223.09.03 </div>
    </div>

    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/owl.carousel.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/owl.carousel.min.js"></script>
    <script type="text/javascript">
      $('.owl-carousel').owlCarousel({
      loop:true,
      margin:24,
      nav:true,
      navText:['Précédent','Suivant'],
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
      }
      })
    </script>
  </body>
</html>
