<div class="image-selection-metabox">
    <input type="hidden" id="selected_images" name="selected_images" value="<?php echo esc_attr($selected_images); ?>">

    <div id="image-selection-container">
        <?php
                if (! empty($image_ids)) {
                        foreach ($image_ids as $image_id) {
                            $image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
                            if ($image_url) {
                                echo '<div class="selected-image" data-id="' . esc_attr($image_id) . '">';
                                echo '<img src="' . esc_url($image_url) . '" width="150">';
                                echo '<button type="button" class="remove-image">حذف</button>';
                                echo '</div>';
                            }
                        }
                    }
                ?>
    </div>

    <button type="button" id="add-images-btn" class="button button-primary">انتخاب عکس‌ها</button>

    <style>
    .selected-image {
        display: inline-block;
        margin: 5px;
        position: relative;
    }

    .remove-image {
        position: absolute;
        top: 0;
        right: 0;
        background: red;
        color: white;
        border: none;
        cursor: pointer;
    }
    </style>

    <script>
    jQuery(document).ready(function($) {
        // باز کردن مدیا آپلودر
        $('#add-images-btn').click(function() {
            var frame = wp.media({
                title: 'عکس‌ها را انتخاب کنید',
                multiple: true,
                library: {
                    type: 'image'
                },
                button: {
                    text: 'استفاده از عکس‌های انتخاب شده'
                }
            });

            frame.on('select', function() {
                var attachments = frame.state().get('selection').toJSON();
                var imageIds = [];
                var container = $('#image-selection-container');

                // container.empty();

                attachments.forEach(function(attachment) {

                    container.append(
                        '<div class="selected-image" data-id="' +
                        attachment.id + '">' +
                        '<img src="' + attachment.url +
                        '" width="150">' +
                        '<button type="button" class="remove-image">حذف</button>' +
                        '</div>'
                    );
                    imageIds.push(attachment.id);
                });

                let old_img = $('#selected_images').val();
                $('#selected_images').val(old_img + ',' + imageIds.join(','));


            });

            frame.open();
        });

        // حذف عکس
        $(document).on('click', '.remove-image', function() {
            var imageId = $(this).parent().data('id');
            var currentIds = $('#selected_images').val().split(',');
            var newIds = currentIds.filter(function(id) {
                return id != imageId;
            });

            $('#selected_images').val(newIds.join(','));
            $(this).parent().remove();
        });
    });
    </script>
</div>