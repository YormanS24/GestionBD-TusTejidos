class ClientJs {
  addClient() {
    var object = new FormData(document.querySelector("#formClient"));
    fetch("ClientController/addClient", {
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
            text: "CLIENTE REGISTRADO CON EXITO",
          });
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  filtroBusqueda() {
    var filtro = document.getElementById("filtro").value;
    var busqueda = document.getElementById("busqueda").value;
    var object = new FormData();
    object.append("filtro", filtro);
    object.append("busqueda", busqueda);
    fetch("ClientController/filtroBusqueda", {
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

  showClient(id)
  {
    var object = new FormData();
    object.append("id", id);

    fetch("ClientController/showClient", {
      method: "POST",
      body: object,
    })
      .then((respuesta) => respuesta.text())
      .then(function (response) {
        $("#my_modal").modal("show");

        document.querySelector("#modal_title").innerHTML =
          "Tus Tejidos - INFORMACION PERSONAL DEL CLIENTE";

        document.querySelector("#modal_content").innerHTML = response;
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  showUpdateClient(id)
  {
    var object = new FormData();
    object.append("id", id);

    fetch("ClientController/showUpdateClient", {
      method: "POST",
      body: object,
    })
      .then((respuesta) => respuesta.text())
      .then(function (response) {
        $("#my_modal1").modal("show");

        document.querySelector("#modal_title1").innerHTML =
          "Tus Tejidos - ACTUALIZAR INFORMACION DEL CLIENTE";

        document.querySelector("#modal_content1").innerHTML = response;
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  updateClient()
  {
    var object = new FormData(document.querySelector("#formUpdateClient"));
    fetch("ClientController/updateClient", {
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
            text: "CLIENTE ACTUALIZADO CON EXITO",
          });
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }
}
var client = new ClientJs();
