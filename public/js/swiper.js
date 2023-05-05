/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/swiper.js ***!
  \********************************/
// core version + navigation, pagination modules:
// import Swiper, { Navigation, Pagination } from 'swiper';
// import Swiper and modules styles

// init Swiper:
// const swiper = new Swiper('.swiper', {
//   loop: true,
//   // slidesPerView: 3,
//   freeMode: true,

//   pagination: {
//     el: '.swiper-pagination',
//     clickable: true,
//   },

//   navigation: {
//     nextEl: '.swiper-button-next',
//     prevEl: '.swiper-button-prev',
//   },

//   scrollbar: {
//     el: '.swiper-scrollbar',
//   },
// });

var swiper = new Swiper('.swiper', {
  slidesPerView: 3,
  direction: getDirection(),
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev'
  },
  on: {
    resize: function resize() {
      swiper.changeDirection(getDirection());
    }
  }
});
function getDirection() {
  var windowWidth = window.innerWidth;
  var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';
  return direction;
}

//   var swiper = new Swiper(".mySwiper", {
//     cssMode: true,
//     navigation: {
//     nextEl: ".swiper-button-next",
//     prevEl: ".swiper-button-prev",
//     },
//     pagination: {
//     el: ".swiper-pagination",
//     },
//     mousewheel: true,
//     keyboard: true,
// });
/******/ })()
;