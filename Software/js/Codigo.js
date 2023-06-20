class CodigoJs {
  validarAcceso() {
    var usuario = document.getElementById("usuario").value;
    var password = document.getElementById("password").value;

    if (!(usuario == "" || password == "")) {
      if (!(password.length < 6)) {
        var object = new FormData(document.querySelector("#fvalida"));

        fetch("AccessController/validateFromSession", {
          method: "POST",
          body: object,
        })
          .then((respuesta) => respuesta.json())
          .then(function (response) {
            Swal.fire({
              icon: "success",
              title: response.message,
              showConfirmButton: false,
              timer: 1500,
            });

            setTimeout(function () {
              location.href = "index.php";
            }, 900);
          })
          .catch(function (error) {
            Swal.fire({
              icon: "error",
              title: "USUARIO NO REGISTRADO EN EL SISTEMA",
              showConfirmButton: false,
              timer: 1500,
            });
          });
      } else {
        Swal.fire({
          icon: "warning",
          title: "CONTRASEÑA IMCOMPLETA",
          showConfirmButton: false,
          timer: 1500,
        });
      }
    } else {
      Swal.fire({
        icon: "warning",
        title: "DEBE INGRESAR USUARIO Y/O CONTRASEÑA",
        showConfirmButton: false,
        timer: 1500,
      });
    }
  }
}
var Codigo = new CodigoJs();
