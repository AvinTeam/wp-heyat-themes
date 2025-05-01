<?php

(defined('ABSPATH')) || exit;
function setup_theme_install()
{
    $main_categories = [
        'news'       => 'اخبار و اطلاعیه',
        'slider'     => 'اسلایدر برنامه ها',
        'slider2'    => 'اسلایدر سخنرانی',
        'media'      => 'چندرسانه‌ای',
        'activities' => 'فعالیت ها',
        'heart'      => 'دل نوشته',
     ];

    foreach ($main_categories as $slug => $name) {
        $term = term_exists($slug, 'category');
        if (! $term) {
            wp_insert_term($name, 'category', [
                'slug'        => $slug,
                'description' => $name,
             ]);
        }
    }



    

}
add_action('after_switch_theme', 'setup_theme_install');
