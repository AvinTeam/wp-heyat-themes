<div class="col-12 col-md-12 mx-auto mt-10">
    <div class="media-slides">
        <div class="row" style="height: 100%;">
            <div class="secondary-slider col-md-5 col-12 order-2 order-md-1">

                <div class="swiper-home-slider2-container">
                    <div class="swiper-wrapper">
                        <!-- slider -->
                        <?php

                            $slider1_query = new WP_Query([ 'category_name' => "slider2" ]);

                            if ($slider1_query->have_posts()) {
                                while ($slider1_query->have_posts()) {
                                    $slider1_query->the_post();

                                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                ?>
                        <div class="swiper-slide">
                            <div class="image-container picsum-img-wrapper">
                                <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>">
                                <div class="carousel-caption text-start">
                                    <div class="row">
                                        <a href="<?php the_permalink(); ?>" target="_blank" class="d-flex">
                                            <div class="col-auto slider-svg"><?php echo image_url('play.svg') ?>
                                            </div>
                                            <div class="col ps-0 d-flex align-items-center">
                                                <h4 class="slider-title rounded-pill text-white my-auto">
                                                    <?php the_title(); ?></h4>
                                            </div>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                            }
                                wp_reset_postdata();
                            } else {
                                echo '<p>هیچ پستی یافت نشد.</p>';
                            }
                        ?>













                    </div>

                    <!-- دکمه‌های نویگیشن -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>












            </div>



            <div class="primary-slider col-md-7 mb-3 mb-md-0 col-12 order-1 order-md-2">



                <div class="swiper-home-slider-container">
                    <div class="swiper-wrapper">



                        <!-- slider -->
                        <?php

                            $slider1_query = new WP_Query([ 'category_name' => "slider" ]);

                            if ($slider1_query->have_posts()) {
                                while ($slider1_query->have_posts()) {
                                    $slider1_query->the_post();

                                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                ?>


                        <div class="swiper-slide ">
                            <div class="image-container picsum-img-wrapper">
                                <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>">

                                <div class="carousel-caption text-start">
                                    <div class="row">
                                        <a href="<?php the_permalink(); ?>" target="_blank" class="d-flex">
                                            <div class="col-auto slider-svg"><?php echo image_url('play.svg') ?>
                                            </div>
                                            <div class="col ps-0 d-flex align-items-center">
                                                <h4 class="slider-title rounded-pill text-white my-auto">
                                                    <?php the_title(); ?></h4>
                                            </div>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                                wp_reset_postdata();
                            } else {
                                echo '<p>هیچ پستی یافت نشد.</p>';
                            }
                        ?>
                    </div>

                    <!-- دکمه‌های نویگیشن -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</div>