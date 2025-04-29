<div class="search-component position-relative">
    <form action="<?php echo esc_url(home_url('/')); ?>" method="get"
        class="search-form position-relative d-none d-lg-block">
        <i class="bi bi-search text-secondary-tint-5 position-absolute w-12px h-12px f-12px"
            style="top: 10px;right: 5px;"></i>
        <input type="text" name="s" class="form-control border-secondary text-white ps-4 rounded-8px f-14px h-36px"
            placeholder="جستجو" value="<?php echo get_search_query(); ?>" style="width: 264px;">
    </form>

 
</div>