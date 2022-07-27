<?php
/**
 * Plugin Name:       cborka21p
 * Plugin URI:        https://github.com/cborka/wpp_cborka21p
 * Description:       My test plugin.
 * Version:           1.0.0
 * Author:            cborka

 * Created by PhpStorm.
 * User: bor
 * Date: 07.09.2021
 * Time: 16:30
 */

//function wporg_filter_title( $title ) {
//    return 'The ' . $title . ' was filtered';
//}
//add_filter( 'the_title', 'wporg_filter_title' );

function wporg_options_page_html() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <h1><?php echo  '__FILE__ == ' . plugin_dir_path(__FILE__) ; ?></h1>
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "wporg_options"
            settings_fields( 'wporg_options' );
            // output setting sections and their fields
            // (sections are registered for "wporg", each field is registered to a specific section)
            do_settings_sections( 'wporg' );
            // output save settings button
            submit_button( __( 'Save Settings', 'textdomain' ) );
            ?>
        </form>
    </div>
    <?php
}

add_action( 'admin_menu', 'wporg_options_page' );
function wporg_options_page() {
    add_menu_page(
        'WPOrg',
        'WPOrg Options',
        'manage_options',
        'wporg',
        'wporg_options_page_html',
        plugin_dir_url(__FILE__) . 'images/icon_wporg.png',
        20
    );
}