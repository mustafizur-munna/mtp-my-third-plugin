<?php


/**
 * Plugin Name: mtp
 */



 class Mtp_my_third_plugin {
    private static $instance;

    private function __construct() {
        $this->require_classes();
    }

    public static function get_instance() {
        if ( ! isset( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function require_classes() {
        require_once plugin_dir_path( __FILE__ ) . '/includes/admin-menu.php';
        new Mtp_admin_menu();
    }
 }

Mtp_my_third_plugin::get_instance();
