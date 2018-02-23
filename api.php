<?php

function pivotpilotcustom_map_terms($term){
  return $term->name;
}

/**
 * This is our callback function that embeds our resource in a WP_REST_Response
 */
function pivotpilotcustom_get_clients( $request ) {
    // In practice this function would fetch the desired data. Here we are just making stuff up.

    $category = isset( $request['category'] ) ? intval($request['category']) : 0;
    $page_index = isset( $request['page_index'] ) ? intval($request['page_index']) : 0;
    $taxonomy = isset( $request['taxonomy'] ) ? $request['taxonomy'] : 'category';

    $paged = isset( $request['paged'] ) ? intval($request['paged']) : 1;

    $tax_query = array(
      array(
        'taxonomy' => $taxonomy,
        'field' => 'term_id',
        'terms' => $category
      )
    );

    if(!$category){
      $tax_query = '';
    }

    $args = array(
      'paged'            => $paged,
      'posts_per_page'   => 6,
      'post_type'        => 'clients',
      'tax_query' => $tax_query,
    );

    $return_data = array(
        'post_data' => array(),
        'post_meta' => array(
            'page_index'    => $page_index,
            'total_posts' => null,
        )
    );

    $clientquery = new WP_Query( $args );

    while($clientquery->have_posts()){
      $clientquery->the_post();
      $post_data = array(
        'excerpt'   => get_the_excerpt(),
        'permalink' => get_permalink(),
        'thumbnail' => get_the_post_thumbnail_url(),
        'title'     => get_the_title(),
        'terms'     => array_map('pivotpilotcustom_map_terms', get_the_terms($post, 'category'))
      );
      array_push($return_data['post_data'], $post_data);
    }

    $return_data['post_meta']['paged'] = $paged;
    $return_data['post_meta']['total_pages'] = $clientquery->max_num_pages;

    wp_reset_postdata();

    return rest_ensure_response( $return_data );
}
 
/**
 * We can use this function to contain our arguments for the example product endpoint.
 */
function pivotpilotcustom_get_client_arguments() {
    $args = array();
    // Here we are registering the schema for the filter argument.
    $args['category'] = array(
        // description should be a human readable description of the argument.
        'description' => esc_html__( 'The filter parameter is used to filter the collection of clients', 'my-text-domain' ),
        // type specifies the type of data that the argument should be.
        'type'        => 'integer'
        // enum specified what values filter can take on.
    );

    $args['taxonomy'] = array(
        // description should be a human readable description of the argument.
        'description' => esc_html__( 'The filter parameter is used to filter the collection of clients', 'my-text-domain' ),
        // type specifies the type of data that the argument should be.
        'type'        => 'string',
        // enum specified what values filter can take on.
        'enum'        =>  array( 'category' , 'post_tag' )
    );

    return $args;
}

function pivotpilotcustom_get_posts( $request ) {
    // In practice this function would fetch the desired data. Here we are just making stuff up.

    $blog_tag = isset( $request['blog_tag'] ) ? intval($request['blog_tag']) : 0;
    $paged = isset( $request['paged'] ) ? intval($request['paged']) : 1;
    $searchterm = isset( $request['searchterm'] ) ? request['searchterm'] : '';

    $tax_query = array(
      array(
        'taxonomy' => 'blog_tag',
        'field' => 'term_id',
        'terms' => $blog_tag
      )
    );

    if($blog_tag === 0){
        $tax_query = '';
    }

    $args = array(
      's' => $searchterm,
      'paged'            => $paged,
      'posts_per_page'   => 6,
      'post_type'        => 'post',
      'tax_query' => $tax_query
    );

    $return_data = array(
        'post_data' => array(),
        'post_meta' => array(
            'paged'    => $paged,
            'total_pages' => '',
        )
    );

    $blogquery = new WP_Query($args);

    $return_data['post_meta']['total_pages'] = $blogquery->max_num_pages;

    while( $blogquery->have_posts() ){
      $blogquery->the_post();
      $post_data = array(
        'date'      => pivotpilotcustom_posted_on(),
        'permalink' => get_permalink(),
        'thumbnail' => get_the_post_thumbnail_url(),
        'title'     => get_the_title(),
        'terms'     => array_map('pivotpilotcustom_map_terms', get_the_terms($post, 'blog_tag'))
      );
      array_push($return_data['post_data'], $post_data);
    }

    wp_reset_postdata();

    return rest_ensure_response( $return_data );
}
 
/**
 * We can use this function to contain our arguments for the example product endpoint.
 */
function pivotpilotcustom_get_post_arguments() {
    $args = array();
    // Here we are registering the schema for the filter argument.
    $args['blog_tag'] = array(
        // description should be a human readable description of the argument.
        'description' => esc_html__( 'The filter parameter is used to filter the collection of clients', 'my-text-domain' ),
        // type specifies the type of data that the argument should be.
        'type'        => 'integer'
        // enum specified what values filter can take on.
    );

    $args['page_index'] = array(
        // description should be a human readable description of the argument.
        'description' => esc_html__( 'The filter parameter is used to filter the collection of clients', 'my-text-domain' ),
        // type specifies the type of data that the argument should be.
        'type'        => 'integer'
    );

    return $args;
}
 
/**
 * This function is where we register our routes for our example endpoint.
 */
function pivotpilotcustom_register_example_routes() {
    // register_rest_route() handles more arguments but we are going to stick to the basics for now.
    register_rest_route( 'posts/v1', '/clients', array(
        // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
        'methods'  => WP_REST_Server::READABLE,
        // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
        'callback' => 'pivotpilotcustom_get_clients',
        // Here we register our permissions callback. The callback is fired before the main callback to check if the current user can access the endpoint.
        'args' => pivotpilotcustom_get_client_arguments(),
    ) );

    register_rest_route( 'posts/v1', '/posts', array(
        // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
        'methods'  => WP_REST_Server::READABLE,
        // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
        'callback' => 'pivotpilotcustom_get_posts',
        // Here we register our permissions callback. The callback is fired before the main callback to check if the current user can access the endpoint.
        'args' => pivotpilotcustom_get_post_arguments(),
    ) );
}
 
add_action( 'rest_api_init', 'pivotpilotcustom_register_example_routes' );

?>