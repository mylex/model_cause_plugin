<?php
/*
* Creating a function to create Custom Post Type
*/

  function custom_post_type() {

  // Set UI labels for Custom Post Type
  	$labels = array(
  		'name'                => _x( 'Model Cause', 'Post Type General Name', 'twentythirteen' ),
  		'singular_name'       => _x( 'model_cause', 'Post Type Singular Name', 'twentythirteen' ),
  		'menu_name'           => __( 'Model Cause', 'twentythirteen' ),
  		'parent_item_colon'   => __( 'Parent model_cause', 'twentythirteen' ),
  		'all_items'           => __( 'All model_cause', 'twentythirteen' ),
  		'view_item'           => __( 'View model_cause', 'twentythirteen' ),
  		'add_new_item'        => __( 'Add New model_cause', 'twentythirteen' ),
  		'add_new'             => __( 'Add model_cause', 'twentythirteen' ),
  		'edit_item'           => __( 'Edit model_cause', 'twentythirteen' ),
  		'update_item'         => __( 'Update model_cause', 'twentythirteen' ),
  		'search_items'        => __( 'Search model_cause', 'twentythirteen' ),
  		'not_found'           => __( 'Not Found', 'twentythirteen' ),
  		'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
  	);

  // Set other options for Custom Post Type

  	$args = array(
  		'label'               => __( 'Model Cause', 'twentythirteen' ),
  		'description'         => __( 'Model Cuase Custom Post', 'twentythirteen' ),
  		'labels'              => $labels,
  		// Features this CPT supports in Post Editor
  		//'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', ),  
  		// You can associate this CPT with a taxonomy or custom taxonomy.
  		'taxonomies'          => array( 'modelCause' ),
  		/* A hierarchical CPT is like Pages and can have
  		* Parent and child items. A non-hierarchical CPT
  		* is like Posts.
  		*/
  		'hierarchical'        => false,
  		'public'              => true,
  		'show_ui'             => true,
  		'show_in_menu'        => true,
  		'show_in_nav_menus'   => true,
  		'show_in_admin_bar'   => true,
  		'menu_position'       => 5,
  		'can_export'          => true,
  		'has_archive'         => true,
  		'exclude_from_search' => false,
  		'publicly_queryable'  => true,
  		'capability_type'     => 'page',
  	);

  	// Registering your Custom Post Type
  	register_post_type( 'model_cause', $args );

  }

  /* Hook into the 'init' action so that the function
  * Containing our post type registration is not
  * unnecessarily executed.
  */

  add_action( 'init', 'custom_post_type', 0 );



?>
