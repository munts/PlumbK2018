<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
    require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
    require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

add_action( 'cmb2_admin_init', 'one_register_podcast_metabox' );

/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function one_register_podcast_metabox() {
    $prefix = '_one_podcast_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_demo = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => __( 'Podcast custom fields', 'cmb2' ),
        'object_types'  => array( 'podcasts', ), // Post type
        //'show_on'      => array( 'key' => 'page-template', 'value' => 'podcast-template.php' ),
        //'show_on_cb' => 'show_if_front_page', // function should return a bool value
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
    ) );


    $cmb_demo->add_field( array(
        'name' => __( 'Alternate Title', 'cmb2' ),
        'desc' => __( 'This is the title that gets displayed in the middle Title Block container.  Ie. Purpose, but it can be changed to love or passion, etc.', 'cmb2' ),
        'id'   => $prefix . 'top_title',
        'type' => 'text',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Direct Download URL', 'cmb2' ),
        'desc' => __( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'direct_download_url',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );
    $cmb_demo->add_field( array(
        'name'    => __( 'Podcast Notes Content', 'cmb2' ),
        'desc'    => __( 'This is where you enter the Podcast Notes provided by Travis.', 'cmb2' ),
        'id'      => $prefix . 'description',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
    ) );
    $cmb_demo->add_field( array(
        'name'    => __( 'Podcast Short Description Content', 'cmb2' ),
        'desc'    => __( 'This is where you enter a short description of the podcast.', 'cmb2' ),
        'id'      => $prefix . 'short_description',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 2, ),
    ) );

}