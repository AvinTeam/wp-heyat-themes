<div class="row justify-content-center mx-auto mt-5">
    <div class="col-12 col-md-12 mx-auto mb-4 justify-content-center">
        <h3 class="text-white">دلنوشته ها:</h3><svg xmlns="http://www.w3.org/2000/svg" width="1485.625" height="42.338"
            viewBox="0 0 1485.625 42.338" class="w-100">
            <path id="Path_241" data-name="Path 241"
                d="M188.92,1869.064H1532.958c2.644,11.173,7.485,16.791,11.634,19.866,6.275,4.651,12.967,4.968,21,12.486a42.914,42.914,0,0,1,6.1,7.131,43.865,43.865,0,0,1,6.385-8.266c5.656-5.74,10.21-7.12,14.19-10.216,4.018-3.125,8.71-8.978,10.784-21h56.629"
                transform="translate(-188.92 -1868.064)" fill="none" stroke="#fff" stroke-miterlimit="10"
                stroke-width="2"></path>
        </svg>
    </div>
    <div class="row justify-content-center mb-10">
        <div class="col-12 col-md-12" style="min-height: 300px;">
            <div class="row justify-content-center">
                <div>






                    <div class="heart-swiper overflow-hidden position-relative ">
                        <div class="swiper-wrapper pb-4">

                            <?php
                                            $args = [
                                                'category_name'  => "heart",
                                                'posts_per_page' => 8,

                                             ];
                                            $heart_query = new WP_Query($args);

                                            if ($heart_query->have_posts()) {
                                                $num_row = true;
                                                while ($heart_query->have_posts()) {
                                                    $heart_query->the_post();

                                                    $post_date = tarikh(get_the_date('Y-m-d'), 'm');
                                                    $tags      = get_the_tags();

                                                    $author_name = ($tags) ? $tags[ 0 ]->name : 'گمنام';

                                                    $like_num = number_format(intval(get_post_meta(get_the_ID(), "_h_like", true)));

                                                    $like_array = (isset($_COOKIE[ "heyat_like_list" ])) ? unserialize($_COOKIE[ "heyat_like_list" ]) : [  ];

                                                    $like_type = in_array(get_the_ID(), $like_array) ? 'liked' : 'disliked';

                                                ?>

                            <div class="swiper-slide d-flex justify-content-center align-items-center">
                                <div class="mt-2 mb-3 justify-content-center mx-auto" style="width: 350px;">
                                    <div class="comment-card col-auto mx-auto"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="350" height="250" viewBox="0 0 350 250" preserveAspectRatio="none">
                                            <g id="Group_111" data-name="Group 111"
                                                transform="translate(63.522 -2688.462)">
                                                <path id="Path_57" data-name="Path 57"
                                                    d="M525.066,2892.141v182.808c0,18.528-12.837,33.44-31.645,33.538H392.481a13.723,13.723,0,0,0,4.8-14.579c-1.372-3.946-3.293-8.782-14.088-8.82H316.214c-9.445.419-11.64,5.129-13.424,8.82-1.783,4.709-.549,11.582,4.39,14.579h-101.5c-26.645.121-30.615-15.01-30.615-33.538V2892.141c0-18.528,8.672-32.9,30.615-33.538h81.513c6.43.079,16.75-2.142,24.982,9.8a68.606,68.606,0,0,1,5.213,9.4,70.747,70.747,0,0,1,3.7,8.322,55.117,55.117,0,0,0,4.942,9.17c9.15,10.295,16.052,10.295,24.773,10.295,8.693,0,16.287,0,23.5-10.295a49.247,49.247,0,0,0,4.514-9.17,74.96,74.96,0,0,1,3.694-8.322,97.752,97.752,0,0,1,6.015-9.4c7.7-9.692,16.211-9.554,25.537-9.8h77.083C511.915,2858,525.066,2873.613,525.066,2892.141Z"
                                                    transform="translate(-238.588 -170.026)" opacity="0.3">
                                                </path>
                                                <path id="Path_322" data-name="Path 322"
                                                    d="M11.321,0H79.527A11.117,11.117,0,0,1,90.848,10.9,11.117,11.117,0,0,1,79.527,21.8H11.321A11.117,11.117,0,0,1,0,10.9,11.117,11.117,0,0,1,11.321,0Z"
                                                    transform="translate(66.054 2916.661)" fill="#494949">
                                                </path>
                                                <line id="Line_18" data-name="Line 18" x1="122.85" y2="0.185"
                                                    transform="translate(148.755 2732.18)" fill="none" stroke="#fff"
                                                    stroke-miterlimit="10" stroke-width="2" opacity="0.1"></line>
                                                <line id="Line_10" data-name="Line 10" x1="122.85" y2="0.185"
                                                    transform="translate(-50.686 2732.18)" fill="none" stroke="#fff"
                                                    stroke-miterlimit="10" stroke-width="2" opacity="0.1"></line>
                                            </g>
                                        </svg>
                                        <div class="comment-avatar">
                                            <?php echo image_url('profile-vector.svg') ?>
                                        </div><span dir="ltr"
                                            class="comment-name text-white"><?php echo esc_html($author_name); ?></span>

                                        <span class="comment-date text-white fs-9"><?php echo $post_date; ?></span>
                                        <p class="comment-detail text-white text-center fs-5">
                                            <?php echo get_the_excerpt() ?></p>
                                        <span data-postId="<?php echo get_the_ID() ?>"
                                            class="comment-likes rounded-pill text-white d-flex justify-content-center align-items-center gap-2">
                                            <?php echo $like_num ?> <i
                                                class="bi bi-heart-fill <?php echo $like_type ?> m-0 p-0"></i></span>
                                    </div>
                                </div>
                            </div>

                            <?php
                                            $num_row = false;
                                                }
                                                wp_reset_postdata();
                                            } else {
                                                echo '<p>هیچ دل نوشته ای یافت نشد.</p>';
                                            }

                                        ?>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>