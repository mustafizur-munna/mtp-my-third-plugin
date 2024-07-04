<?php

class Mtp_admin_menu{
    public function __construct(){
        add_action('admin_menu', array( $this,'admin_menu') );
    }
    public function admin_menu(){
        add_menu_page('MTP', 'MTP', 'manage_options', 'mtp', array( $this,'mtp_callback' ) );
    }

    public function mtp_callback() {
        include_once __DIR__ . '/templates/mtp-menu.php';
    }
}