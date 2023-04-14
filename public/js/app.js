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
var input = document.querySelector("#form-field-phone");
window.intlTelInput(input, {
  //       allowDropdown: false,
  // autoHideDialCode: false,
  // autoPlaceholder: "off",
  initialCountry: "auto",
  // dropdownContainer: document.body,
  // excludeCountries: ["us"],
  preferredCountries: ['au', 'be', 'ca', 'dk', 'fi', 'hk', 'ie', 'nl', 'nz', 'no', 'sg', 'se', 'ae', 'us'],
  // formatOnDisplay: false,
  geoIpLookup: function geoIpLookup(callback) {
    $.get("https://ipinfo.io", function () {}, "jsonp").always(function (resp) {
      var countryCode = resp && resp.country ? resp.country : "";
      callback(countryCode);
    });
  },
  // hiddenInput: "full_number",
  // localizedCountries: { 'de': 'Deutschland' },
  nationalMode: false,
  // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
  //       placeholderNumberType: "MOBILE",
  //       	 preferredCountries: ['cn', 'jp'],
  separateDialCode: true,
  utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.0/js/utils.js"
});
/******/ })()
;