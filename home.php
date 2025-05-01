<?php get_header(); ?>

<div class="index-container">
    <div class="container-xl">
        <div class="row justify-content-center">
            <?php
                get_component('home/slider');
                get_component('home/cart');
                get_component('home/activities');
                get_component('home/heart');
            ?>
        </div>
    </div>
</div>

<?php
    get_footer();
?>
