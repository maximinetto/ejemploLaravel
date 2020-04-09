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
});

$(".eliminar-persona").submit(function(e){
  return false;
});

$(".eliminar-persona button").click(function(e){
  const stringToSeparated = e.currentTarget.id;
  const idPersona = stringToSeparated.split("-")[1];
  eliminarAjax(idPersona, this);
});

function token(idPersona){
  let tok = $("#token-" + idPersona).val();
  console.log(tok)
  return tok;
}

function eliminarAjax(idPersona, element){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': token(idPersona)
    }
  });

  $.ajax(
    {
        url: "user/" + idPersona,
        type: 'delete', // replaced from put
        dataType: "JSON",
        data: {
            "id": idPersona // method and token not needed in data
        },
        success: function (response)
        {
            if(!response.ok) // see the reponse sent
            {
              $("fallo-eliminar").modal({
                keyboard: true,
                show: true
              });
              return;
            }

            quitarForm(element);
        },
        error: function(xhr) {
         console.log(xhr.responseText); // this line will save you tons of hours while debugging
        // do something here because of error
       }
    });
}


function quitarForm(element){
  $(element).closest("tr").remove();
}