jalaliDatepicker.startWatch({
    minDate: "attr",
    maxDate: "attr"
});


function startLoading() {
    let overlay = document.getElementById("overlay");

    if (overlay) {
        overlay.style.display = "flex"; // نمایش به صورت flex
        overlay.style.opacity = "0"; // آماده‌سازی برای افکت fadeIn
        overlay.style.transition = "opacity 0.5s ease-in-out"; // اضافه کردن انیمیشن

        // تأخیر برای اعمال transition
        setTimeout(() => {
            overlay.style.opacity = "1";
        }, 10);
    }

    document.body.classList.add("no-scroll"); // اضافه کردن کلاس به body
}

function endLoading() {

    let overlay = document.getElementById("overlay");

    if (overlay) {
        overlay.style.transition = "opacity 0.5s ease-in-out"; // اضافه کردن انیمیشن
        overlay.style.opacity = "0"; // شروع افکت fadeOut

        setTimeout(() => {
            overlay.style.display = "none"; // بعد از محو شدن، مخفی کردن کامل
        }, 500); // مقدار 500 باید با زمان transition هماهنگ باشه
    }

    document.body.classList.remove("no-scroll"); // حذف کلاس از body

}

document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.swiper-home-slider-container', {
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    });

    new Swiper('.swiper-home-slider2-container', {
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    });





    // new Swiper('.swiper-container', {
    //     slidesPerView: 4,
    //     spaceBetween: 20,
    //     breakpoints: {
    //         0: {
    //             slidesPerView: 2.7,
    //             spaceBetween: 15
    //         },
    //         960: {
    //             slidesPerView: 4,
    //             spaceBetween: 15
    //         }
    //     }
    // });

    // new Swiper('.swiper-media', {
    //     slidesPerView: 4,
    //     spaceBetween: 20,
    //     breakpoints: {
    //         0: {
    //             slidesPerView: 2.7,
    //             spaceBetween: 15
    //         },
    //         960: {
    //             slidesPerView: 3,
    //             spaceBetween: 15
    //         }
    //     }
    // });

});




jQuery(document).ready(function ($) {

    $('.onlyNumbersInput').on('input paste', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });










    let swiperActivities;



    function initSwiper() {
        swiperActivities = new Swiper('.swiper-activities-container', {
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });



    }


    function resetSwiper() {
        if (swiperActivities) {
            swiperActivities.destroy(true, true); 
            swiperActivities = null; 
        }

        // ایجاد مجدد Swiper
        initSwiper();
    }

    let postId = 0

    function ajaxActivities() {

        $('#activities-slider').addClass('d-none');
        $('#skeleton-slider').removeClass('d-none');

        const activitiesSlider = $('#activities-slider .swiper-activities-container .swiper-wrapper');
        activitiesSlider.empty();

        if (!postId) {
            postId = $('ul.reports li.active').attr('data-postid');
        }

        const formData = {
            action: 'heyatAjaxActivities',
            nonce: heyat_js.nonce,
            postId: postId,

        };

        $.ajax({
            url: heyat_js.ajaxUrl,
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {

                if (response.success) {

                    response.data.forEach(item => {

                        const label = $(`
                                        <div class="swiper-slide">
                                            <div class="image-container picsum-img-wrapper">
                                                <img src="${item.image}"
                                                    alt="${item.alt}">
                                                <div class="carousel-caption text-start">
                                                    <div class="row">
                                                        <div class="col ps-0 d-flex align-items-center">
                                                            <h4 class="slider-title rounded-pill text-white my-auto">${item.title}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`);
                        activitiesSlider.append(label);

                    });

                    $('#activities-slider').removeClass('d-none');
                    $('#skeleton-slider').addClass('d-none');

                    resetSwiper();

                }
                else {
                    console.error(response);
                }

            },
            error: function (xhr, status, error) {
                console.error(xhr);
                console.error("خطا در درخواست AJAX:", error);

            }
        });










    }

    ajaxActivities();










    $('ul.reports li').click(function (e) {
        e.preventDefault();

        $('ul.reports li').removeClass('active');
        let newIdPost = $(this).attr('data-postid');

        if (newIdPost != postId) {
            postId = newIdPost

            $(this).addClass('active');

            ajaxActivities();
        }
    });















});

