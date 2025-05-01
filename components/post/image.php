<?php
    $post_id        = get_the_ID();
    $gallery_images = get_post_meta($post_id, '_selected_images', true);
    $image_ids      = ! empty($gallery_images) ? explode(',', $gallery_images) : [  ];

    // اگر گالری خالی بود از عکس شاخص استفاده می‌کنیم
    if (empty($image_ids) && has_post_thumbnail($post_id)) {
        $image_ids = [ get_post_thumbnail_id($post_id) ];
    }

    if (! empty($image_ids)):
?>

<?php endif; ?>

<style>
.swiper-slide {
    display: flex;
    justify-content: center;
    align-items: center;
}

.swiper-slide img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}
</style>

<div class="container">

    <div class="row justify-content-center ">
        <h3 class="text-white text-center">تصاویر</h3>
        <div class="col-12 mt-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1013.87 35.997"
                style="width: 100%;">
                <path id="Path_37" data-name="Path 37"
                    d="M165.491,1113.2H639.982c2.086,9.355,5.9,14.059,9.174,16.633,4.947,3.9,10.224,4.16,16.558,10.456a35.324,35.324,0,0,1,4.811,5.97,36.627,36.627,0,0,1,5.034-6.921c4.461-4.806,8.051-5.963,11.188-8.554,3.169-2.617,6.867-7.518,8.5-17.584h484.112"
                    transform="translate(-165.491 -1112.199)" fill="none" stroke="#d3b572" stroke-miterlimit="10"
                    stroke-width="2"></path>
            </svg></div>


        <div class="swiper-post-container overflow-hidden position-relative my-3">
            <div class="swiper-wrapper">
                <!-- اسلایدها -->
                <?php foreach ($image_ids as $image_id): ?>
                <?php $image_url = wp_get_attachment_image_url($image_id, 'full'); ?>
                <?php if ($image_url): ?>
                <div class="swiper-slide">
                    <img src="<?php echo esc_url($image_url); ?>"
                        alt="<?php echo esc_attr(get_the_title($image_id)); ?>">
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <!-- دکمه‌های ناوبری -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- پاگیشن -->
            <div class="swiper-pagination"></div>
        </div>




    </div>


</div>





<script>
// مقداردهی Swiper
var mySwiper = new Swiper('.swiper-post-container', {
    // پارامترهای تنظیم
    direction: 'horizontal',
    loop: true,
    autoplay: {
        delay: 3000,
    },

    // دکمه‌های ناوبری
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // پاگیشن
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
});
</script>