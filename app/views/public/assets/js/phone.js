document.addEventListener("DOMContentLoaded", function () {
  const phoneInput = document.querySelector("#phone");
  if (phoneInput) {
    window.intlTelInput(phoneInput, {
      initialCountry: "auto",
      geoIpLookup: function (callback) {
        fetch("https://ipinfo.io/json")
          .then((response) => response.json())
          .then((data) => {
            const countryCode = data && data.country ? data.country : "us";
            callback(countryCode);
          })
          .catch((error) => {
            console.error("GeoIP lookup failed:", error);
            callback("us"); // Define "us" como padrão em caso de erro
          });
      },
      utilsScript:
        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
  } else {
    console.error("Elemento #phone não encontrado");
  }
});
