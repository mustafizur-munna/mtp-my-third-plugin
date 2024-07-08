<?php

class Mtp_Third_Admin_menu{
    public function __construct(){
        add_action('admin_menu', array($this, 'admin_menu'));
    }
    public function admin_menu(){
        add_menu_page( "MTP Third", "MTP Third", "manage_options", "mtp-third", array( $this, 'mtp_third_menu_callback'), "dashicons-image-filter", 5 );
    }
    public function mtp_third_menu_callback(){
        include_once __DIR__ . '/templates/mtp-third-admin-menu.php';
    }
}