<div class="row">
    <div class="col-12 col-md-12 mx-auto mt-10">
        <div class="row">
            <div class="col-12 col-lg-4 px-2 mb-xl-0 mb-3">
                <div class="report-list px-4 py-4 pb-0">
                    <h4 class="text-white ms-4">گزارش فعالیت ها:</h4>
                    <div class="col-12 overflow-hidden"><svg xmlns="http://www.w3.org/2000/svg" width="360.605"
                            height="35.929" viewBox="0 0 360.605 35.929">
                            <path id="Path_239" data-name="Path 239"
                                d="M888.92,1442.371h241.831c2.215,9.359,6.27,14.065,9.745,16.641,5.256,3.9,10.862,4.161,17.592,10.459a35.936,35.936,0,0,1,5.111,5.974,36.733,36.733,0,0,1,5.348-6.924c4.738-4.808,8.552-5.965,11.886-8.557,3.366-2.618,7.3-7.52,9.033-17.592H1236.9"
                                transform="translate(-888.92 -1441.371)" fill="none" stroke="#fff"
                                stroke-miterlimit="10" stroke-width="2"></path>
                        </svg></div>
                    <ul class="reports text-white mt-2 mb-1 mb-0 fs-5" style="list-style-type: none;">


                        <?php
                                        $args = [
                                            'category_name'  => "activities",
                                            'posts_per_page' => 8,

                                         ];
                                        $slider1_query = new WP_Query($args);

                                        if ($slider1_query->have_posts()) {
                                            $num_row = true;
                                            while ($slider1_query->have_posts()) {
                                                $slider1_query->the_post();
                                            ?>

                        <li class="row mb-0 pb-0 <?php echo $num_row ? 'active' : ''; ?> "
                            style="cursor: pointer;" data-postId="<?php the_ID()?>">
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="43.106"
                                    viewBox="0 0 35.251 43.106" class="mb-1">
                                    <g id="Group_91" data-name="Group 91" transform="translate(-1129.496 -1463.694)">
                                        <g id="Group_90" data-name="Group 90">
                                            <path id="Path_282" data-name="Path 282"
                                                d="M1149.04,1489.279c-.067-.791-.13-1.887-.111-3.2.013-.952.085-1.385.113-2.366a30.128,30.128,0,0,0-.08-3.256"
                                                fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2">
                                            </path>
                                        </g>
                                        <path id="Path_283" data-name="Path 283"
                                            d="M1158.029,1466.179v37.165a13.3,13.3,0,0,1-7.738,2.456h-6.339a13.447,13.447,0,0,1-13.456-13.45v-6.345a13.446,13.446,0,0,1,13.456-13.45h3.966c1.394-1.58,3.338-1.97,5.251-2.852A15.879,15.879,0,0,0,1158.029,1466.179Z"
                                            fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2"></path>
                                        <path id="Path_284" data-name="Path 284"
                                            d="M1163.747,1486.005v6.345a13.4,13.4,0,0,1-5.718,10.994v-28.333A13.4,13.4,0,0,1,1163.747,1486.005Z"
                                            fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2"></path>
                                        <path id="Path_285" data-name="Path 285"
                                            d="M1147.918,1472.555a42.077,42.077,0,0,1-11.649,7.87q-.07,1.573-.114,3.179c-.125,4.723-.054,9.27.171,13.626a16.151,16.151,0,0,0,6.755-2.555c1.1-.746,1.125-.987,5.394-4.882,2.613-2.385,3.33-2.959,4.437-3.495a12,12,0,0,1,5.117-1.161"
                                            fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="col d-flex align-items-center"><span><?php the_title(); ?></span>
                            </div>
                            <div class="col-auto d-flex align-items-center">
                                <span class="list-next rounded-circle"><i class="bi bi-chevron-left"
                                        style="color: white; font-size: medium;"></i></span>
                            </div>
                        </li>
                        <?php
                                        $num_row = false;
                                            }
                                            wp_reset_postdata();
                                        } else {
                                            echo '<p>هیچ پستی یافت نشد.</p>';
                                        }

                                    ?>



                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-8 px-2">
                <div id="activities-slider" class="third-slider d-none">
                    <div class="tertiary-slider">

                        <div class="swiper-activities-container">
                            <div class="swiper-wrapper">
                            </div>

                            <!-- دکمه‌های نویگیشن -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>

                <div id="skeleton-slider" class="third-slider p-0">
                    <div class="skeleton">
                        <div class="skeleton-gradient"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>