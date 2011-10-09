<?php
    
    session_start();

    $cfg = array();

    $cfg['base_url'] = getenv('BASE_SITE_URL');
    $cfg['base_push_url'] = getenv('URL_WHERE_CONDUIT_LISTENS');
    $cfg['base_push_callback_url'] = $cfg['base_push_url'] . 'callback?sub=';
    $cfg['base_socket_url'] = getenv('BASE_SOCKET_URL'); // where socket.io is listening

    $cfg['logout'] = $cfg['base_url'] . 'logout.php';
    $cfg['login'] = $cfg['base_url'] . 'login.php';

    $cfg['flickr_key'] = getenv('FLICKR_KEY');
    $cfg['flickr_secret'] = getenv('FLICKR_SECRET');

    $cfg['account'] = array();

    function global_check_login() {

        if (isset($_SESSION['flickr_token'])) {
            $GLOBALS['cfg']['account'] = $_SESSION['flickr_token'];
            return true;
        } 

        return false;
    }

    function global_redirect($location) {
        header("Location: $location");
        exit;
    }

    require 'flickr.simple.php';
