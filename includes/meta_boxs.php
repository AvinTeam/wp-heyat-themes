<?php
if (! defined('ABSPATH')) {
    exit;
}

/**
 * افزودن متاباکس برای انتخاب عکس‌ها
 */
function add_image_selection_metabox()
{
    add_meta_box(
        'image_selection_metabox',        // ID متاباکس
        'انتخاب عکس‌ها',     // عنوان متاباکس
        'render_image_selection_metabox', // تابع نمایش محتوا
        'post',                           // نوع پست (می‌توانید تغییر دهید)
        'normal',                         // موقعیت
        'high'                            // اولویت
    );
}
add_action('add_meta_boxes', 'add_image_selection_metabox');

/**
 * نمایش محتوای متاباکس
 */
function render_image_selection_metabox($post)
{
    // دریافت مقادیر ذخیره شده
    $selected_images = get_post_meta($post->ID, '_selected_images', true);
    $image_ids       = ! empty($selected_images) ? explode(',', $selected_images) : [  ];
    wp_nonce_field('image_selection_nonce_action', 'image_selection_nonce');
    include_once HEYAT_VIEWS . 'metabox/gallery.php';

}

/**
 * ذخیره داده‌های متاباکس
 */
function save_image_selection_metabox($post_id)
{
    // بررسی nonce
    if (! isset($_POST[ 'image_selection_nonce' ]) ||
        ! wp_verify_nonce($_POST[ 'image_selection_nonce' ], 'image_selection_nonce_action')) {
        return;
    }

    // بررسی ذخیره خودکار
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // بررسی مجوزهای کاربر
    if (! current_user_can('edit_post', $post_id)) {
        return;
    }

    // ذخیره داده‌ها
    if (isset($_POST[ 'selected_images' ])) {
        update_post_meta($post_id, '_selected_images', sanitize_text_field($_POST[ 'selected_images' ]));
    } else {
        delete_post_meta($post_id, '_selected_images');
    }
}
add_action('save_post', 'save_image_selection_metabox');

add_action('add_meta_boxes', 'zba_add_meta_boxes');

function zba_add_meta_boxes(): void
{
    add_meta_box(
        'zba_aparat_link',
        'لینک ویدیو از آپارات',
        'submenu_zba_aparat_callable',
        'post',
        'normal',
        'high',
    );

    function submenu_zba_aparat_callable($post)
    {

        $zba_aparat = get_post_meta($post->ID, '_zba_aparat', true);

        update_post_meta($post->ID, '_zba_aparat', esc_html($zba_aparat));

        include_once HEYAT_VIEWS . 'metabox/aparat.php';

    }

}

add_action('save_post', 'zba_save_bax', 1, 3);

function zba_save_bax($post_id, $post, $updata)
{
    if (isset($_POST[ 'zba_aparat' ])) {
        update_post_meta($post_id, '_zba_aparat', esc_html($_POST[ 'zba_aparat' ]));
    }

}