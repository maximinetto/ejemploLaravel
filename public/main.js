(function() {
  "use strict";
  window.addEventListener(
    "load",
    function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName("needs-validation");

      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener(
          "submit",
          function(event) {
            console.log("entra");
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add("was-validated");
          },
          false
        );
      });
    },
    false
  );
})();

let personas = document.querySelectorAll("[id^='persona-']");
personas.forEach(per => {
  per.addEventListener("click", (ev) => {
    const stringToConvert = per.id;
    const idPersona = stringToConvert.split("-")[1];

    window.location = "user/" + idPersona;
  })
})