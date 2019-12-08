<?php

/**
 * Plugin Name: NYC Open Data
 * Author: MaxLynx
 * Version: 1.0
 */


function load_open_data($url){

	$args = array( 'timeout' => 20,
                    'headers' => 
                    array( 'Limit' => 1,
                         'App-Token'=> '2s1oq316a06sezq7b5pwsh5h1' ) 
                    );
    $response = wp_remote_get( $url, $args );

    if( ! is_wp_error( $response ) ) {
                
        $body = wp_remote_retrieve_body( $response );

        $data = json_decode( $body );

        return $data;
    }
}

add_action( 'wp_enqueue_scripts', 'load_open_data' );
