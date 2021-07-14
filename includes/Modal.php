<?php


class CM_Modal{

    /**
     * Show cookie modal on website
     */
    public function showModal() {
        require_once PLUGIN_DIR . 'templates/modal.php';
    }

    /**
     * Check if accept modal requirements cookie is set
     * @return bool
     */
    public function isCookieSet() {
        if(isset($_COOKIE['cookie_accepted'])) {
            return true;
        }

        return false;
    }
    public function isCookieSession() {
        if(isset($_COOKIE['cookie_accepted'])) {
            return true;
        }

        return false;
    }
}