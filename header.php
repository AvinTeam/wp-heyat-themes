<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>

<body class="mat-typography" direction="rtl" dir="rtl" style="direction: rtl">
    <div class="container-fluid index-header mx-0 px-0 overflow-hidden">
        <h5 class="header-moto mt-10 d-none">این پادگان هنوزش سرباز می پذیرد</h5>
        <div class="row">
            <div class="nav-right col-6 col-md-4 order-2 order-md-1">
                <div class="nav-icon-cont me-md-1 row justify-content-end">
                    <a href="https://splus.ir/sarallah_zanjan" target="_blank"
                        class="nav-item me-md-2 rounded-circle"><?php echo image_url('splus.svg') ?></a>

                    <a href="https://eitaa.com/sarallah_zanjan" target="_blank"
                        class="nav-item me-md-2 rounded-circle"><?php echo image_url('eitaa.svg') ?></a>

                    <a href="https://instagram.com/sarallahzanjan" target="_blank"
                        class="nav-item me-md-2 rounded-circle"><?php echo image_url('instagram.svg') ?></a>

                    <a href="http://rubika.ir/sarallah_zanjan" target="_blank"
                        class="nav-item me-md-2 rounded-circle"><?php echo image_url('rubika.svg') ?></a>
                </div>
                <div class="nav-text-cont justify-content-end mt-3">
                    <div style="width: max-content; margin-right: auto;"><span class="px-sm-3 px-1"><a href="/">صفحه
                                نخست​</a></span>
                        <!----><span class="px-sm-3 px-1 d-none"><a href="#">بایگانی​</a></span><span
                            class="px-sm-3 px-1"><a href="/khadem">سامانه خادمین‌​</a></span>
                        <!---->
                    </div>
                </div>
            </div>
            <div class="text-center mt-4 col-12 col-md-4 order-md-2 order-1">

                <?php echo image_url('logo.png','logo','logo');?>


            </div>
            <div class="nav-left col-6 col-md-4 order-3 order-md-3">
                <div class="nav-icon-cont ms-md-1 row">
                    <a href="https://aparat.com/sarallahzanjan" target="_blank"
                        class="nav-item ms-md-2 rounded-circle"><?php echo image_url('aparat.svg') ?></a>

                    <a href="https://splus.ir/sarallah_zanjan" target="_blank"
                        class="nav-item ms-md-2 rounded-circle"><?php echo image_url('bale.svg') ?></a>

                    <a href="https://gap.im/sarallah_zanjan" target="_blank"
                        class="nav-item ms-md-2 rounded-circle"><?php echo image_url('gap.svg') ?></a>

                    <a href="https://t.me/sarallah_zanjan" target="_blank"
                        class="nav-item ms-md-2 rounded-circle"><?php echo image_url('telegram.svg') ?></a>
                </div>
                <div class="nav-text-cont mt-3">
                    <div style="width: max-content;">
                        <span class="px-sm-3 px-1 d-none"><a routerlink="/auth/login"
                                href="/auth/login">ورود​</a></span>

                        <span class="px-sm-3 px-1"><a href="/contact">ارتباط با ما​</a></span>
                        <span class="px-sm-3 px-1"><a href="/pay">نذر نگاه او​</a></span>
                    </div>
                </div>
            </div>
        </div>