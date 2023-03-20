/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
// require('./bootstrap');

config = {
  dateFormat: "Y-m-d",
  altInput: true,
  altFormat: "F j, Y",
  minDate: "today"
};
flatpickr("input[type=datetime-local]", config);

// function searchDestinations() {
//     var searchText = document.getElementById("destination-search").value;
//     document.getElementById("destination-search").value = "";
// }
/******/ })()
;