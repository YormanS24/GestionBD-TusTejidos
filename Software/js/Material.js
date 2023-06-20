class MaterialJs {
  busquedaFiltro() {
    var filtro = document.getElementById("filtro").value;
    var busqueda = document.getElementById("busqueda").value;
    var vista = document.getElementById("vista").value;
    var object = new FormData();
        object.append("filtro", filtro );
        object.append("busqueda", busqueda);
        object.append("vista", vista);
    fetch("MaterialPriController/busquedaFiltro", {
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

  addMaterial() {
    var object = new FormData(document.querySelector("#formAddMaterial"));
    fetch("MaterialPriController/addMaterial", {
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
            text: "MATERIA PRIMA REGISTRADA CON EXITO",
          });
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  showMaterial(tipo,marca,color,peso,nit) {
    var object = new FormData();
    object.append("tipo", tipo);
    object.append("marca", marca);
    object.append("color", color);
    object.append("peso", peso);
    object.append("nit",nit)

    fetch("MaterialPriController/showMaterial", {
      method: "POST",
      body: object,
    })
      .then((respuesta) => respuesta.text())
      .then(function (response) {
        $("#my_modal").modal("show");

        document.querySelector("#modal_title").innerHTML =
          "Tus Tejidos - Informacion MATERIA PRIMA";

        document.querySelector("#modal_content").innerHTML = response;
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  showUpdateMaterial(tipo,marca,color,peso,nit) {
    var object = new FormData();
    object.append("tipo", tipo);
    object.append("marca", marca);
    object.append("color", color);
    object.append("peso", peso);
    object.append("nit",nit)

    fetch("MaterialPriController/showUpdateMaterial", {
      method: "POST",
      body: object,
    })
      .then((repuesta) => repuesta.text())
      .then(function (reponse) {
        $("#my_modal1").modal("show");

        document.querySelector("#modal_title1").innerHTML =
          "Tus Tejidos - ACTUALIZAR MATERIA PRIMA";

        document.querySelector("#modal_content1").innerHTML = reponse;
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  updateMaterial() {
    var object = new FormData(document.querySelector("#formUpateMaterial"));
    fetch("MaterialPriController/updateMaterial", {
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
            text: "MATERIA PRIMA ACTUALIZADA CON EXITO",
          });
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }

}
var Material = new MaterialJs();
