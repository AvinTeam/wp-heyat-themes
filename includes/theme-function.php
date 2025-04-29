<?php

(defined('ABSPATH')) || exit;

function image_url($path, $alt = null, $class = null)
{
    if ($alt) {$alt = 'alt="' . $alt . '"';}
    if ($class) {$class = 'class="' . $class . '"';}
    return '<img ' . $class . ' src="' . HEYAT_IMAGE . $path . '?ver=' . HEYAT_VERSION . '" ' . $alt . '>';
}

function get_view_part($path)
{
    require HEYAT_VIEWS . "/$path.php";
}

function get_component($path)
{
    require HEYAT_COMPONENTS . "/$path.php";
}
function sanitize_number($text)
{

    $western = [ '0', '1', '2', '3', '4', '5', '6', '7', '8', '9' ];
    $persian = [ '۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹' ];
    $arabic  = [ '٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩' ];
    $text    = str_replace($persian, $western, $text);
    $text    = str_replace($arabic, $western, $text);
    return $text;

}

function heyat_remote(string $url)
{
    $res = wp_remote_get(
        $url,
        [
            'timeout' => 1000,
         ]);

    if (is_wp_error($res)) {
        $result = [
            'code'   => 1,
            'result' => $res->get_error_message(),
         ];
    } else {
        $result = [
            'code'   => 0,
            'result' => json_decode($res[ 'body' ]),
         ];
    }

    return $result;
}

function is_transient()
{
    $is_transient = get_transient('is_transient');
    if ($is_transient) {
        delete_transient('is_transient');
        return $is_transient;
    }
}

function sanitize_text_no_item($item)
{
    $new_item = [  ];

    foreach ($item as $value) {
        if (empty($value)) {continue;}
        $new_item[  ] = sanitize_text_field($value);
    }

    return $new_item;

}

function heyat_cookie(): string
{

    if (! isset($_COOKIE[ "setcookie_heyat_nonce" ])) {

        $is_key_cookie = wp_generate_password(20, true, true);

        setcookie("setcookie_heyat_nonce", $is_key_cookie, time() + 1800, "/");

    } else {

        $is_key_cookie = $_COOKIE[ "setcookie_heyat_nonce" ];

    }

    return $is_key_cookie;
}

function link_to_code($input)
{
    if (preg_match('/^[a-zA-Z0-9]+$/', $input)) {
        return $input; // ورودی همان کد است
    }

    if (preg_match('/aparat\.com\/v\/([a-zA-Z0-9]+)/', $input, $matches)) {
        return $matches[ 1 ]; // کد ویدیو را برگردان
    }

    return null;
}

function limit_words($text, $limit = 10)
{
    $words = explode(' ', $text);

    if (count($words) > $limit) {
        $words = array_slice($words, 0, $limit);
        $text  = implode(' ', $words) . '...';
    }

    return $text;
}