<?php
/*
  Plugin Name: Cookie Modal
  Plugin URI: http://lukasz-krzyzanowski.pl/
  Description: Simple plugin for display extended cookie alert modal on website
  Version: 1.0.0
  Author: Łukasz Krzyżanowski
  Author URI: http://lukasz-krzyzanowski.pl/
 */


if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

require_once 'includes/Modal.php';

require_once  'templates/class/postRequest.php';

//error_reporting(E_ALL);
//ini_set('display_errors', 'On');

define('PLUGIN_PATH', plugin_dir_path( __FILE__ ));

define('PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

define('PLUGIN_VERSION', '1.0.0');

class cookieModal {

    private $modal;

    public function __construct() {
        $this->modal = new CM_modal();
        $this->run();
    }

    private function run() {
        $this->shortcodes();
        $this->add_actions();
        $this->add_filters();
        $this->addFrontAjax();
    }

    private function shortcodes() {

    }


    private function add_actions() {
        add_action('init', array($this, 'register_my_session'));

        add_action('admin_enqueue_scripts', array($this, 'link_admin_style'));
        add_action('admin_enqueue_scripts', array($this, 'link_admin_script'));

        add_action('wp_enqueue_scripts', array($this, 'link_scripts'));
        add_action('wp_enqueue_scripts', array($this, 'link_styles'));

        add_action('wp_footer', array($this->modal, 'showModal'));
    }

    private function add_filters() {

    }

    public function addAdminAjax() {}

    public function addFrontAjax() {
        $request = new CM_postRequest();
        add_action('wp_ajax_set_all_cookies', array($request, 'checkAllCookies'));
        add_action('wp_ajax_nopriv_set_all_cookies', array($request, 'checkAllCookies'));
        add_action('wp_ajax_set_specific_cookies', array($request, 'checkSpecificCookies'));
        add_action('wp_ajax_nopriv_set_specific_cookies', array($request, 'checkSpecificCookies'));
    }

    public function link_scripts() {
        wp_register_script('cm-modal-js', plugins_url( '/', __FILE__ ).'templates/js/modal.js', array(), PLUGIN_VERSION, true);
        wp_localize_script('cm-modal-js', 'php', array(
            "ajax_url" => admin_url('admin-ajax.php', 'relative'),
        ));
        wp_enqueue_script('cm-modal-js');
        wp_enqueue_script('cm-jqueryui-js', plugins_url( '/', __FILE__ ).'templates/js/jquery-ui.min.js', array(), PLUGIN_VERSION, false);
        wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css');
    }

    public function link_styles() {
        wp_enqueue_style('cm-style', plugins_url( '/', __FILE__ ).'templates/css/style.css');
    }

    public function link_login_styles() {}

    public function link_admin_script() {}

    public function link_admin_style() {}
}

$instance = new cookieModal();