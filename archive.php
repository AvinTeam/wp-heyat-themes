<?php get_header(); ?>



<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="archive-title mb-4 text-white">
                <?php
                    if (is_category()) {
                        single_cat_title();
                    } elseif (is_tag()) {
                        single_tag_title();
                    } else {
                        echo 'آرشیو';
                    }
                ?>
            </h1>

            <?php if (have_posts()): ?>
            <div class="row">
                <?php while (have_posts()): the_post(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 bg-dark">
                        <?php if (has_post_thumbnail()): ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium', [ 'class' => 'card-img-top img-fluid' ]); ?>
                        </a>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a class="text-primary" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h5>
                            <div class="card-text text-white"><?php the_excerpt(); ?></div>
                        </div>
                        <div class="card-footer text-white">
                            <small class="text-white-50"><?php echo tarikh(get_the_date('Y-m-d'), 'm'); ?></small>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>

            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center gap-2">
                    <?php
                        global $wp_query;
                        $big   = 999999999; // نیاز به یک عدد غیر واقعی
                        $pages = paginate_links([
                            'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format'    => '?paged=%#%',
                            'current'   => max(1, get_query_var('paged')),
                            'total'     => $wp_query->max_num_pages,
                            'prev_next' => true,
                            'prev_text' => __('&laquo; قبلی'),
                            'next_text' => __('بعدی &raquo;'),
                            'type'      => 'array',
                            'show_all'  => false,
                            'end_size'  => 1,
                            'mid_size'  => 2,
                        ]);

                        if (is_array($pages)) {
                            foreach ($pages as $page) {
                                // اضافه کردن کلاس page-item به liها
                                $page = str_replace('<a', '<a class="page-link rounded-3"', $page);
                                $page = str_replace('<span', '<span class="page-link rounded-3"', $page);

                                // تشخیص وضعیت فعلی
                                if (strpos($page, 'current') !== false) {
                                    echo '<li class="page-item active">' . $page . '</li>';
                                } else {
                                    echo '<li class="page-item">' . $page . '</li>';
                                }
                            }
                        }
                    ?>
                </ul>
            </nav>
            <?php else: ?>
            <div class="alert alert-info">
                مطمئنی دنبال چی می‌گردی؟ اینجا چیزی نیست!
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>




<?php

    get_footer();

?>