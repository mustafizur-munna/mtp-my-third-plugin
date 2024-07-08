<?php

// Custom column creation

class Mtp_Post_Column{
    // Constructor
    public function __construct(){
        add_filter( 'manage_page_posts_columns', array($this, 'post_columns'), 10, 1 );
        add_action( 'manage_page_posts_custom_column', array($this,'add_column_value'), 10, 2 );
        add_action( 'wp_head', array( $this,'count_post_view' ) );
    }

    // Add column heading
    public function post_columns( $columns ){
        $new_columns = array();
        foreach($columns as $key => $column){

            if( 'cb' ==  $key){
                $new_columns [$key] = $column;
                $new_columns['image'] = 'Thumbnail';
            } else{
                $new_columns[$key] = $column;
            }

            if( 'author' ==  $key){
                $new_columns [$key] = $column;
                $new_columns['view'] = 'View Count';
            } else{
                $new_columns[$key] = $column;
            }
        }
        return $new_columns;
    }

    // Add column value for that

    public function add_column_value( $column_name, $post_id ){
        if( 'image' == $column_name ){
            if( has_post_thumbnail($post_id) ){
                echo get_the_post_thumbnail( $post_id, array(100, 70) );
            } else {
                echo "Image not found";
            }
        }
        if( 'view' == $column_name ){
            $current_view_value = get_post_meta($post_id,"_post_view_count", true);
            echo $current_view_value ? $current_view_value : 0;
        }
    }

    // Page view counter function
    public function count_post_view(  ) {
        if( is_page() ) {
            global $post;

            $post_id = $post->ID;
            
            // Get previous count
            $current_view_value = get_post_meta($post_id,"_post_view_count", true);

            if( ! $current_view_value ) {
                $current_view_value = intval($current_view_value);
            }

            // Increment view count
            $current_view_value++;

            // save updated value

            update_post_meta( $post_id, "_post_view_count", $current_view_value );

        }
    }
}
