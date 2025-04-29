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
+
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

});

