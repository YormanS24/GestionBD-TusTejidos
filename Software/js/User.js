class UserJs {
  addUser() {
    let nomnre1 = document.getElementById("nombre1").value;
    let nomnre2 = document.getElementById("nombre2").value;
    let apellido1 = document.getElementById("apellido1").value;
    let apellido2 = document.getElementById("apellido2").value;
    let sexo = document.getElementById("sexo").value;
    let tipo_documento = document.getElementById("tipo_documento").value;
    let documento = document.getElementById("documento").value;
    let telefono = document.getElementById("telefono").value;
    let usuario = document.getElementById("usuario").value;
    let contraseña = document.getElementById("password").value;
    let contraseña1 = document.getElementById("password1").value;
    let correo = document.getElementById("correo").value;

    const pattern = new RegExp("^[A-Z]+$", "i");
    const pattern1 = new RegExp("[0-9]");
    const expr =
      /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ((nomnre2 == "" || pattern.test(nomnre2)) && (apellido2 == "" || pattern.test(apellido2))) {
      if (
        !(nomnre1 == "") &&
        !(apellido1 == "") &&
        !(sexo == "") &&
        !(tipo_documento == "") &&
        !(documento == "") &&
        !(telefono == "") &&
        !(correo == "") &&
        !(usuario == "") &&
        !(contraseña == "") &&
        !(contraseña1 == "")
      ) {
        if (pattern.test(nomnre1) && pattern.test(apellido1)) {
          if (
            pattern1.test(documento) &&
            pattern1.test(telefono) &&
            pattern1.test(tipo_documento)
          ) {
            if (expr.test(correo)) {
              if (contraseña === contraseña1) {
                var object = new FormData(document.querySelector("#formUser"));
                fetch("UsersController/createUser", {
                  method: "POST",
                  body: object,
                })
                  .then((respuesta) => respuesta.text())
                  .then(function (response) {
                    try {
                      object = JSON.parse(response);
                      Swal.fire({
                        icon: "error",
                        title: "ERROR",
                        text: object.message,
                      });
                    } catch (error) {
                      document.querySelector("#content").innerHTML = response;
                      Swal.fire({
                        icon: "success",
                        title: "EXITO",
                        text: "USUARIO REGISTRADO CON EXITO",
                      });
                    }
                  })
                  .catch(function (error) {
                    console.log(error);
                  });
              } else {
                Swal.fire({
                  icon: "error",
                  title: "ERROR",
                  text: "!! LAS CONTRASEÑAS NO COINCIDEN ¡¡",
                });
              }
            } else {
              Swal.fire({
                icon: "error",
                title: "ERROR",
                text: "!! POR FAVOR INGRESE UN CORREO VALIDO ¡¡",
              });
            }
          } else {
            Swal.fire({
              icon: "error",
              title: "ERROR",
              text: "!! INGRESE SOLO NUMEROS ¡¡",
            });
          }
        } else {
          Swal.fire({
            icon: "error",
            title: "ERROR",
            text: "!! INGRESE SOLO LETRAS SIN ESPACIOS ¡¡",
          });
        }
      } else {
        Swal.fire({
          icon: "error",
          title: "ERROR",
          text: "!! FALTAN CAMPOS POR LLENAR ¡¡",
        });
      }
    } else {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "!! INGRESE SOLO LETRAS O DEJE EL CAMPO VACIO ¡¡",
      });
    }
  }

  showUserAdmin(id) {
    var object = new FormData();
    object.append("id", id);

    fetch("UsersController/showUser", {
      method: "POST",
      body: object,
    })
      .then((respuesta) => respuesta.text())
      .then(function (response) {
        $("#my_modal").modal("show");

        document.querySelector("#modal_title").innerHTML =
          "Tus Tejidos - Informacion Usuario";

        document.querySelector("#modal_content").innerHTML = response;
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  showUpdateUser(id) {
    var object = new FormData();
    object.append("id", id);

    fetch("UsersController/showUpdateUser", {
      method: "POST",
      body: object,
    })
      .then((repuesta) => repuesta.text())
      .then(function (reponse) {
        $("#my_modal1").modal("show");

        document.querySelector("#modal_title1").innerHTML =
          "Tus Tejidos - ACTUALIZAR USUARIO";

        document.querySelector("#modal_content1").innerHTML = reponse;
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  updateUser() {
    var object = new FormData(document.querySelector("#formUserr"));
    fetch("UsersController/updateUser", {
      method: "POST",
      body: object,
    })
      .then((respuesta) => respuesta.text())
      .then(function (response) {
        try {
          object = JSON.parse(response);
          Swal.fire({
            icon: "error",
            title: "ERROR",
            text: object.message,
          });
        } catch (error) {
          $('#content').html(response);
          Swal.fire({
            icon: "success",
            title: "EXITO",
            text: "USUARIO ACTUALIZADO CON EXITO",
          });
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  showDelateUser(id) {
    Swal.fire({
      icon: "info",
      title: "!! REALMENTE DESEA ELIMINAR ESTE USUARIO  ¡¡",
      cancelButtonColor: "#7a82ff",
      showCancelButton: true,
      confirmButtonColor: "#FF5733",
      confirmButtonText: "ELIMINAR",
    }).then((result) => {
      if (result.isConfirmed) {
        var object = new FormData();
        object.append("id", id);
        object.append("confir", result.isConfirmed);

        fetch("UsersController/delateUser", {
          method: "POST",
          body: object,
        })
          .then((repuesta) => repuesta.text())
          .then(function (reponse) {
            $('#content').html(reponse);
          })
          .catch(function (error) {
            console.log(error);
          });
        Swal.fire({
          icon: "success",
          title: "ELIMINADO CON EXITO",
          showConfirmButton: false,
          timer: 1500,
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "ELIMINACION CANCELADA",
          showConfirmButton: false,
          timer: 1500,
        });
      }
    });
  }

  busquedaFiltro() {
    var filtro = document.getElementById("filtro").value;
    var busqueda = document.getElementById("busqueda").value;
    var vista = document.getElementById("vista").value;
    var object = new FormData();
        object.append("filtro", filtro );
        object.append("busqueda", busqueda);
        object.append("vista", vista);
    fetch("UsersController/busquedaFiltro", {
      method: "POST",
      body: object,
    })
      .then((respuesta) => respuesta.text())
      .then(function (response) {
        try {
          object = JSON.parse(response);
          Swal.fire({
            icon: "error",
            title: "ERROR",
            text: object.message,
          });
        } catch (error) {
          document.querySelector("#content").innerHTML = response;
          Swal.fire({
            icon: "success",
            title: "EXITO",
            text: "BUSQUEDA EXITOSA",
          });
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }
}
var User = new UserJs();
