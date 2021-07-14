<?php

class CM_postRequest {


    public function __construct() {}

    public function checkAllCookies() {
        $_SESSION["cookie_accepted"] = 'true';
        setcookie('cookie_accepted', '1', time()+62208000, '/', $_SERVER['HTTP_HOST']);

//        setcookie('cookie_functional', '1', time()+62208000, '/', $_SERVER['HTTP_HOST']);
        setcookie('cookie_analitic', '1', time()+62208000, '/', $_SERVER['HTTP_HOST']);
        setcookie('cookie_social', '1', time()+62208000, '/', $_SERVER['HTTP_HOST']);
        setcookie('cookie_comercial', '1', time()+62208000, '/', $_SERVER['HTTP_HOST']);

        $this->addDbLog($_POST['browser'], [
//            'cookie_functional' => '1',
            'cookie_analitic' => '1',
            'cookie_social' => '1',
            'cookie_comercial' => '1',
        ]);
        die;
    }

    public function checkSpecificCookies() {
        setcookie('cookie_accepted', '1', time()+62208000, '/', $_SERVER['HTTP_HOST']);

//        setcookie('cookie_functional', $_POST['cookie_functional'], time()+62208000, '/', $_SERVER['HTTP_HOST']);
        setcookie('cookie_analitic', $_POST['cookie_analitic'], time()+62208000, '/', $_SERVER['HTTP_HOST']);
        setcookie('cookie_social', $_POST['cookie_social'], time()+62208000, '/', $_SERVER['HTTP_HOST']);
        setcookie('cookie_comercial', $_POST['cookie_comercial'], time()+62208000, '/', $_SERVER['HTTP_HOST']);

        $this->addDbLog($_POST['browser'], [
//            'cookie_functional' => $_POST['cookie_functional'],
            'cookie_analitic' => $_POST['cookie_analitic'],
            'cookie_social' => $_POST['cookie_social'],
            'cookie_comercial' => $_POST['cookie_comercial'],
        ]);
        die;
    }

    private function addDbLog($browser, $cookies) {
        global $wpdb;

        $wpdb->insert($wpdb->prefix . 'cookie_logs', array(
            'user_ip' => md5($this->getClientIp()),
            'browser' => $browser,
            'cookies' => serialize($cookies),
            'create_time' => $this->getCurrentDate()
        ));
    }

    private function getClientIp(): string {
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            $ipaddress = $_SERVER['HTTP_CF_CONNECTING_IP'];
        }
        elseif (isset($_SERVER['HTTP_X_REAL_IP'])) {
            $ipaddress = $_SERVER['HTTP_X_REAL_IP'];
        }
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else if(isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        }
        else if(isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        }
        else if(isset($_SERVER['HTTP_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        }
        else if(isset($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        }
        else {
            $ipaddress = 'UNKNOWN';
        }
        if($ipaddress !== 'UNKNOWN') {
            $ipaddress = explode(', ', $ipaddress)[0];
        }
        return $ipaddress;
    }

    private function getCurrentDate(): string {
        $tz = new DateTimeZone('Europe/Warsaw');

        $date = new DateTime();
        $date->setTimezone($tz);

        return $date->format('Y-m-d H:i:s');
    }

}