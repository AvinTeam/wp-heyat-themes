<?php

add_action('wp_ajax_heyatAjaxActivities', 'heyatAjaxActivities');
add_action('wp_ajax_nopriv_heyatAjaxActivities', 'heyatAjaxActivities');
function heyatAjaxActivities()
{
    if (wp_verify_nonce($_POST[ 'nonce' ], 'ajax-nonce')) {

        $post_id = absint($_POST[ 'postId' ]);

        $gallery_images = get_post_meta($post_id, '_selected_images', true);
        $image_ids      = ! empty($gallery_images) ? explode(',', $gallery_images) : [  ];

        // اگر گالری خالی بود از عکس شاخص استفاده می‌کنیم
        if (empty($image_ids) && has_post_thumbnail($post_id)) {
            $image_ids = [ get_post_thumbnail_id($post_id) ];
        }

        if (! empty($image_ids)):

            $array_image = [  ];
            foreach (sanitize_text_no_item($image_ids) as $image_id):

                $image_url = wp_get_attachment_image_url($image_id, 'full');

                $array_image[  ] = [
                    'image' => esc_url($image_url),
                    'alt'   => esc_attr(get_the_title($image_id)),
                    'title' => get_the_title($post_id),
                 ];

            endforeach;

            if (empty($array_image)) {wp_send_json_error('empty', 401);}

            wp_send_json_success($array_image);

        endif;

    } else {
        wp_send_json_error('nonce error', 403);
    }

}
add_action('wp_ajax_heyatAjaxLike', 'heyatAjaxLike');
add_action('wp_ajax_nopriv_heyatAjaxLike', 'heyatAjaxLike');
function heyatAjaxLike()
{
    if (wp_verify_nonce($_POST[ 'nonce' ], 'ajax-nonce')) {

        $like_array = (isset($_COOKIE[ "heyat_like_list" ])) ? unserialize($_COOKIE[ "heyat_like_list" ]) : [  ];

        $post_id = absint($_POST[ 'postId' ]);

        $like_num = intval(get_post_meta($post_id, "_h_like", true));


        if (! in_array($post_id, $like_array)) {

            $like_array[  ] = $post_id;
            $like_num++;
            $type = 'liked';

        } else if (in_array($post_id, $like_array)) {

            $key = array_search($post_id, $like_array);

            if ($key !== false) {
                unset($like_array[ $key ]);
            }

            $like_num--;
            $type = 'disliked';

        }

        $end = $like_num . ' <i class="bi bi-heart-fill ' . $type . ' m-0 p-0"></i>';

        setcookie("heyat_like_list", serialize(array_unique(array_values($like_array))), time() + (86400 * 365), "/");

        update_post_meta($post_id, "_h_like", $like_num);

        wp_send_json_success([
            'end'  => $end,
            'post' => array_values($like_array),
         ]);

    } else {
        wp_send_json_error('nonce error', 403);
    }

}
