<?php
    get_header();

    $image      = (has_post_thumbnail()) ? get_the_post_thumbnail_url(get_the_ID(), 'full') : '';
 
?>


<div class="text-center py-5">
    <div class=" d-flex flex-row justify-content-center align-items-center gap-3 mb-5">
        <?php
            $categories = get_the_category();
            if (! empty($categories)) {
                foreach ($categories as $category) {
                    $category_link = esc_url(get_category_link($category->term_id));
                    $category_name = esc_html($category->name);
                    echo "<a class='btn btn-primary' href='{$category_link}'>{$category_name}</a>";
                }
            }
        ?>
    </div>
    <h1 style="font-size: 34px; " class="text-white fw-900"><?php echo get_the_title(); ?></h1>

</div>

<div>
    <div class="container d-flex flex-column justify-content-center align-items-center gap-5 text-white">

        <div>
            <div class="d-flex flex-column justify-content-center align-items-center my-3">

                <img loading="lazy" src="<?php echo $image; ?>" alt="<?php echo get_the_title(); ?>"
                    class="img-fluid  h-100">
            </div>
            <div>
                <?php the_content(); ?>
            </div>


  



            <?php get_component('post/video'); ?>
            <?php get_component('post/image'); ?>







        </div>

    </div>
</div>

<?php get_footer();