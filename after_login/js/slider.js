/* Swiper JS */

// Load Library Swiper JS lewat CDN
var swiperScript = document.createElement("script");
swiperScript.src = "https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js";

swiperScript.addEventListener("load", function () {
  // Konfigurasi Slider
  var swiper1 = new Swiper(".mySwiper1", {
    slidesPerView: 1,
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
  });
});

document.head.appendChild(swiperScript);