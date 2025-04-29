<?php

(defined('ABSPATH')) || exit;

add_action('admin_enqueue_scripts', 'heyat_admin_script');

function heyat_admin_script()
{

    wp_register_style(
        'jalalidatepicker',
        HEYAT_VENDOR . 'jalalidatepicker/jalalidatepicker.min.css',
        [  ],
        '0.9.6'
    );
    wp_register_script(
        'jalalidatepicker',
        HEYAT_VENDOR . 'jalalidatepicker/jalalidatepicker.min.js',
        [  ],
        '0.9.6',
        true
    );

    wp_enqueue_style(
        'heyat_admin',
        HEYAT_CSS . 'admin.css',
        [ 'jalalidatepicker' ],
        HEYAT_VERSION
    );

    wp_enqueue_media();

    wp_enqueue_script(
        'heyat_admin',
        HEYAT_JS . 'admin.js',
        [ 'jquery', 'jalalidatepicker' ],
        HEYAT_VERSION,
        true
    );

    wp_localize_script(
        'heyat_admin',
        'heyat_js',
        [
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce'   => wp_create_nonce('ajax-nonce'),
         ]
    );

}

add_action('wp_enqueue_scripts', 'heyat_style');

function heyat_style()
{
    wp_register_style(
        'bootstrap',
        HEYAT_VENDOR . 'bootstrap/bootstrap.min.css',
        [  ],
        '5.3.3'
    );
    wp_register_style(
        'bootstrap.rtl',
        HEYAT_VENDOR . 'bootstrap/bootstrap.rtl.min.css',
        [ 'bootstrap' ],
        '5.3.3'
    );
    wp_register_style(
        'bootstrap.icons',
        HEYAT_VENDOR . 'bootstrap/bootstrap-icons.min.css',
        [ 'bootstrap' ],
        '1.11.3'
    );
    wp_register_script(
        'bootstrap',
        HEYAT_VENDOR . 'bootstrap/bootstrap.min.js',
        [  ],
        '5.3.3',
        true
    );

    wp_register_style(
        'select2',
        HEYAT_VENDOR . 'select2/select2.min.css',
        [ 'bootstrap' ],
        '4.1.0-rc.0'
    );
    wp_register_script(
        'select2',
        HEYAT_VENDOR . 'select2/select2.min.js',
        [  ],
        '4.1.0-rc.0',
        true
    );

    wp_register_style(
        'jalalidatepicker',
        HEYAT_VENDOR . 'jalalidatepicker/jalalidatepicker.min.css',
        [  ],
        '0.9.6'
    );
    wp_register_script(
        'jalalidatepicker',
        HEYAT_VENDOR . 'jalalidatepicker/jalalidatepicker.min.js',
        [  ],
        '0.9.6',
        true
    );

    wp_register_style(
        'swiper',
        HEYAT_VENDOR . 'swiper/swiper-bundle.min.css',
        [  ],
        '11.2.2',
    );

    wp_register_script(
        'swiper',
        HEYAT_VENDOR . 'swiper/swiper-bundle.min.js',
        [  ],
        '11.2.2',

    );

    wp_enqueue_style(
        'heyat_style',
        HEYAT_CSS . 'public.css',
        [ 'bootstrap.rtl', 'bootstrap.icons', 'swiper', 'jalalidatepicker' ],
        HEYAT_VERSION
    );

    wp_enqueue_script(
        'heyat_js',
        HEYAT_JS . 'public.js',
        [ 'jquery', 'bootstrap', 'swiper', 'jalalidatepicker' ],
        HEYAT_VERSION,
        true
    );

    wp_localize_script(
        'heyat_js',
        'heyat_js',
        [
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce'   => wp_create_nonce('ajax-nonce'),

         ]
    );

}
