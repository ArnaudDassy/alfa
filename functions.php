<?php

function the_slug($postID="") {
  global $post;
  $postID = ( $postID != "" ) ? $postID : $post->ID;
  $post_data = get_post($postID, ARRAY_A);
  $slug = $post_data['post_name'];
return $slug;
}

if ( !function_exists('sf_get_current_url') ):
 	function sf_get_current_url( $mode = 'base' ) {
 		$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 		switch( $mode ){
 			case 'raw' : 	return $url; break;
 			case 'base' : 	return reset(explode('?', $url)); break;
 			case 'uri' : 	$exp = explode( '?', $url );
 					return trim( str_replace( home_url(),  », reset( $exp ) ), '/' ); break;
			default: 	return false;
 		}
  }
endif;

function create_post_type() {
    register_post_type( 'faq',
        array(
            'labels' => array(
                'name' => __( 'Foire aux Questions' ),
                'singular_name' => __( 'faq' ),
                'add_new' => __('Nouvelle question'),
                'add_new_item' => __('Ajouter une nouvelle question'),
                'menu_name' => __('FAQ'),
                'all_items' => __('Toutes les questions'),
                'name_admin_bar' => __('Foire à Q'),
                'view_item' => __('Voir la question'),
                'edit_item' => __('Modifier la question')

            ),
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title','author', 'thumbnail' ),
        'menu_position' => 5
      )
    );
    register_post_type( 'equipe',
        array(
            'labels' => array(
                'name' => __( 'Equipe' ),
                'singular_name' => __( 'equipe' ),
                'add_new' => __('Nouveau membre'),
                'add_new_item' => __('Ajouter un nouveau membre'),
                'menu_name' => __('Equipe'),
                'all_items' => __('Tous les membres'),
                'name_admin_bar' => __('Membres'),
                'view_item' => __('Voir le membre'),
                'edit_item' => __('Modifier le membre')

            ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('thumbnail', 'title'),
        'menu_position' => 5
      )
    );
    register_post_type( 'lien',
        array(
            'labels' => array(
                'name' => __( 'Lien' ),
                'singular_name' => __( 'lien' ),
                'add_new' => __('Nouveau lien'),
                'add_new_item' => __('Ajouter un nouveau lien'),
                'menu_name' => __('Liens'),
                'all_items' => __('Tous les liens'),
                'name_admin_bar' => __('Liens'),
                'view_item' => __('Voir le lien'),
                'edit_item' => __('Modifier le lien')

            ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('thumbnail', 'title'),
        'menu_position' => 5
      )
    );
    register_post_type( 'news',
        array(
            'labels' => array(
                'name' => __( 'News' ),
                'singular_name' => __( 'news' ),
                'add_new' => __('Nouvelle news'),
                'add_new_item' => __('Ajouter une nouvelle news'),
                'menu_name' => __('News'),
                'all_items' => __('Toutes les news'),
                'name_admin_bar' => __('News'),
                'view_item' => __('Voir la news'),
                'edit_item' => __('Modifier la news')

            ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('thumbnail', 'title'),
        'menu_position' => 5
      )
    );
    register_post_type( 'self-help',
        array(
            'labels' => array(
                'name' => __( 'Self-Help' ),
                'singular_name' => __( 'self-help' ),
                'add_new' => __('Nouvelle self-help'),
                'add_new_item' => __('Ajouter une nouvelle self-help'),
                'menu_name' => __('Self-Help'),
                'all_items' => __('Toutes les self-help'),
                'name_admin_bar' => __('Self-Help'),
                'view_item' => __('Voir la self-help'),
                'edit_item' => __('Modifier la self-help')

            ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('thumbnail', 'title'),
        'menu_position' => 5
      )
    );
    register_post_type( 'batiment',
        array(
            'labels' => array(
                'name' => __( 'Batiment' ),
                'singular_name' => __( 'batiment' ),
                'add_new' => __('Nouveau batiment'),
                'add_new_item' => __('Ajouter un nouveau batiment'),
                'menu_name' => __('Batiment'),
                'all_items' => __('Tous les batiments'),
                'name_admin_bar' => __('Batiment'),
                'view_item' => __('Voir le batiment'),
                'edit_item' => __('Modifier le batiment')

            ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('thumbnail', 'title'),
        'menu_position' => 5
      )
    );
    register_post_type( 'tarif',
        array(
            'labels' => array(
                'name' => __( 'Tarif' ),
                'singular_name' => __( 'tarif' ),
                'add_new' => __('Nouveau tarif'),
                'add_new_item' => __('Ajouter un nouveau tarif'),
                'menu_name' => __('Tarif'),
                'all_items' => __('Tous les tarifs'),
                'name_admin_bar' => __('Tarif'),
                'view_item' => __('Voir le tarif'),
                'edit_item' => __('Modifier le tarif')

            ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('thumbnail', 'title'),
        'menu_position' => 5
      )
    );
    register_post_type( 'job',
        array(
            'labels' => array(
                'name' => __( 'Stages & Jobs' ),
                'singular_name' => __( 'job' ),
                'add_new' => __('Nouvelle offre'),
                'add_new_item' => __('Ajouter une nouvelle offre'),
                'menu_name' => __('Stages & Jobs'),
                'all_items' => __('Toutes les offres'),
                'name_admin_bar' => __('Stages & Jobs'),
                'view_item' => __('Voir l\'offre'),
                'edit_item' => __('Modifier l\'offre')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('thumbnail', 'title'),
            'menu_position' => 5
        )
    );
    register_post_type( 'partenariat',
        array(
            'labels' => array(
                'name' => __( 'Partenaires & Réseaux' ),
                'singular_name' => __( 'partenariat' ),
                'add_new' => __('Nouveau partenariat'),
                'add_new_item' => __('Ajouter un nouveau partenariat'),
                'menu_name' => __('Partenaires & Réseaux'),
                'all_items' => __('Tous les partenariats'),
                'name_admin_bar' => __('Partenaires & Réseaux'),
                'view_item' => __('Voir le partenariat'),
                'edit_item' => __('Modifier le partenariat')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('thumbnail', 'title'),
            'menu_position' => 5
        )
    );
  }

function tab_perso($in){
  $in['toolbar1']='bold , italic , underline, link, unlink, undo, redo';
  $in['toolbar2']='';
  return $in;
}
add_filter( 'tiny_mce_before_init', 'tab_perso');
add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );

function my_toolbars( $toolbars )
{
	$toolbars['Very Simple' ] = array();
	$toolbars['Very Simple' ][1] = array('bold' , 'italic' , 'underline', 'link', 'unlink', 'undo', 'redo' );

	if( ($key = array_search('code' , $toolbars['Full' ][2])) !== false )
	{
	    unset( $toolbars['Full' ][2][$key] );
	}

	unset( $toolbars['Basic' ] );

	return $toolbars;
}
function z_remove_media_controls() {
   remove_action( 'media_buttons', 'media_buttons' );
}
add_action('admin_head','z_remove_media_controls');

// create two taxonomies, course and writers for the post type "post"
function create_membres_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Équipe', 'taxonomy general name' ),
        'singular_name'     => _x( 'team', 'taxonomy singular name' ),
        'search_items'      => __( 'Recherhe' ),
        'all_items'         => __( 'Toutes les sections' ),
        'parent_item'       => __( 'Sélectione la section parent' ),
        'parent_item_colon' => __( 'Sélectione la section parent:' ),
        'edit_item'         => __( 'Modifier la section' ),
        'update_item'       => __( 'Mettre à jour la section' ),
        'add_new_item'      => __( 'Ajouter une nouvelle section' ),
        'new_item_name'     => __( 'Nom de la nouvelle section' ),
        'menu_name'         => __( 'Équipe' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => false,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'team' ),
    );
    register_taxonomy( 'team', array( 'equipe' ), $args );
}
add_action( 'init', 'create_membres_taxonomies', 0 );

add_action( 'init', 'create_post_type' );

add_filter('pre_get_posts','gkp_search_filter');
function gkp_search_filter($query) {
  if ($query->is_search)
  $query->set('post_type',array('post', 'tarif', 'faq', 'self-help', 'lien', 'equipe'));

}
// Remove Comments menu item for all but Administrators
function wptutsplus_remove_comments_menu_item() {
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'plugins.php' );
    remove_menu_page( 'users.php' );
    remove_menu_page( 'themes.php' );
    remove_menu_page( 'index.php' );
    remove_menu_page( 'upload.php' );
    remove_menu_page( 'tools.php' );
    remove_menu_page( 'options-general.php' );
}
add_action( 'admin_menu', 'wptutsplus_remove_comments_menu_item' );