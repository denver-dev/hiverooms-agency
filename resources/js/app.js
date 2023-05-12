// require('./bootstrap');

  const menu_btn = document.querySelector('.hamburger');
  const mobile_btn = document.querySelector('.sidebar-left__nav--mobile');
  
  menu_btn.addEventListener('click', function () {
    menu_btn.classList.toggle('is-active');
    mobile_btn.classList.toggle('is-active');
  });
  


  // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }


//   var btns = document.getElementsByClassName("nav-link");
//   for (var i = 0; i < btns.length; i++){
//     btns[i].addEventListener("click", function() {
//     var current = document.getElementsByClassName("is-active");
//     current[0].className = current[0].className.replace("is-active", "");
//     this.className += "is-active";
//   });
// }


config = {
    dateFormat: "Y-m-d",
    altInput: true,
    altFormat: "F j, Y",
    minDate: "today",
  
}
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
     preferredCountries: ['au','be', 'ca', 'dk', 'fi', 'hk', 'ie', 'nl', 'nz', 'no', 'sg', 'se', 'ae', 'us'],
  // formatOnDisplay: false,
  geoIpLookup: function(callback) {
    $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      var countryCode = (resp && resp.country) ? resp.country : "";
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
  utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.0/js/utils.js",
});
