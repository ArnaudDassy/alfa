<?php get_header(); ?>

<?php

  $items = [
    'articles' => [],
    'membres' => [],
    'liens' => [],
    'news' => []
  ];

  foreach ($wp_query->posts as $post) {

    if($post->post_type == 'post'){
      array_push( $items['articles'], $post);
    }
    if($post->post_type == 'equipe'){
      array_push( $items['membres'], $post);
    }
    if($post->post_type == 'lien'){
      array_push( $items['liens'], $post);
    }
    if($post->post_type == 'news'){
      array_push( $items['news'], $post);
    }
  }

?>
<section style="border-bottom:none;" class="search">
  <h2>Recherche pour : <?php echo $_GET['s']; ?> </h2>
  <!--<form class="search__selectors">
    <p class="search__selectors__infos">
      Masquer / Afficher
    </p>
    <div class="search__selectors__button">
      <input type="checkbox" name="articles" id="search__selectors__button__articles" checked="checked"><label for="search__selectors__button__articles">Articles</label>
    </div>
    <div class="search__selectors__button">
      <input type="checkbox" name="membres" id="search__selectors__button__membres" checked="checked"><label for="search__selectors__button__membres">Membres</label>
    </div>
    <div class="search__selectors__button">
      <input type="checkbox" name="liens" id="search__selectors__button__liens" checked="checked"><label for="search__selectors__button__liens">Liens</label>
    </div>
    <div class="search__selectors__button">
      <input type="checkbox" name="news" id="search__selectors__button__news" checked="checked"><label for="search__selectors__button__news">News</label>
    </div>
  </form>-->
  <div class="search__results">
    <?php if(!empty($items['articles'])): ?>
      <div class='search__articles'>
        <h3>Articles</h3>
        <ul>
        <?php foreach($items['articles'] as $item) : ?>
          <?php if($item->post_name != 'qui-sommes-nous' && $item->post_name != 'contact') : ?>
            <li>
              <a href="<?php echo $item->guid; ?>">
                <?php echo $item->post_title; ?>
              </a>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <?php if(!empty($items['membres'])): ?>
      <div class='search__membres'>
        <h3>Membres</h3>
        <ul>
        <?php foreach($items['membres'] as $item) : ?>
          <?php if($item->post_name != 'qui-sommes-nous' && $item->post_name != 'contact') : ?>
            <li>
              <a href="<?php bloginfo('wpurl'); ?>/category/equipe/#<?php echo $item->post_name; ?>">
                <?php echo $item->post_title; ?>
              </a>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <?php if(!empty($items['liens'])): ?>
      <div class='search__liens'>
        <h3>Liens</h3>
        <ul>
        <?php foreach($items['liens'] as $item) : ?>
          <?php if($item->post_name != 'qui-sommes-nous' && $item->post_name != 'contact') : ?>
            <li>
              <a href="<?php bloginfo('wpurl'); ?>/category/liens/#<?php echo $item->post_name; ?>">
                <?php echo $item->post_title; ?>
              </a>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <?php if(!empty($items['news'])): ?>
      <div class='search__news'>
        <h3>News</h3>
        <ul>
        <?php foreach($items['news'] as $item) : ?>
          <?php if($item->post_name != 'qui-sommes-nous' && $item->post_name != 'contact') : ?>
            <li>
              <a href="<?php bloginfo('wpurl'); ?>/category/news/#<?php echo $item->post_name; ?>">
                <?php echo $item->post_title; ?>
              </a>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
  </div>

</section>

<!--<script type="text/javascript">

  (function(){
    "use strict";

    var buttons = document.querySelectorAll('.search__selectors__button');

    for( var i = -1 ; ++i < buttons.length ; ){
      buttons[i].children[0].addEventListener('click', display);
    }

    function display(){

      var sectionToHide = document.querySelector(".search__"+ this.name);

      if(this.checked){
        sectionToHide.style.display = 'block';
      }

      else{
        sectionToHide.style.display = 'none';
      }

    }

  })();

</script>-->


<?php get_footer(); ?>
