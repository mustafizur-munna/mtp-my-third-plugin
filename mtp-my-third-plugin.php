<?php


/**
 * Plugin Name: My Third Plugin
 */

 class Mtp_my_third_plugin{

    private static $instance;

    public static function get_instance() {
        if( ! self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    private function __construct() {
        $this->require_classes();
    }

    private function require_classes() {
        require_once __DIR__ . '/includes/admin-menu.php';
        new Mtp_Third_Admin_menu();
        require_once __DIR__ . '/includes/post-column.php';
        new Mtp_Post_Column();
    }
 }

Mtp_my_third_plugin::get_instance();