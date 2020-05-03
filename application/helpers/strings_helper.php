<?php

if (!function_exists('dump_debug')) {
    function dump_debug($data, $die = TRUE)
    {
        $arrayCheck = is_array($data) ? 'ARRAY' : 'NOT ARRAY';
        echo '<pre style="background-color: #000;color: #ff7400;padding: 5px 10px 10px 10px;">';
        echo '<p style="color: #fff;">〖 ――――――――――☛ ' . $arrayCheck . ' ☚―――――――――― 〗</p>';
        print_r($data);
        echo '</pre>';

        if ($die == TRUE) {
            die();
        }
    }
}

if (!function_exists('flashData')) {
    function flashData($type, $messages, $uri = 'auth')
    {
        $CI = &get_instance();

        $CI->session->set_flashdata($type, $messages)->redirect($uri);
    }
}

if (!function_exists('textareaConvert')) {
    function textareaConvert($args)
    {
        return nl2br(strip_tags($args));
    }
}

if (!function_exists('get_client_ip')) {
    function get_client_ip()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}
