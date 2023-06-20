class ProviderJs {
  busquedaFiltro() {
    var filtro = document.getElementById("filtro").value;
    var busqueda = document.getElementById("busqueda").value;
    var vista = document.getElementById("vista").value;
    var object = new FormData();
        object.append("filtro", filtro );
        object.append("busqueda", busqueda);
        object.append("vista", vista);
    fetch("ProvidersController/busquedaFiltro", {
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


  addProviders() {
    var object = new FormData(document.querySelector("#formProvider"));
    fetch("ProvidersController/addProvider", {
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
          Swal.fire({
            icon: "success",
            title: "EXITO",
            text: "PROVEEDOR REGISTRADO CON EXITO",
          });
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  showProvider(id) {
    var object = new FormData();
    object.append("id", id);

    fetch("ProvidersController/showProvider", {
      method: "POST",
      body: object,
    })
      .then((respuesta) => respuesta.text())
      .then(function (response) {
        $("#my_modal").modal("show");

        document.querySelector("#modal_title").innerHTML =
          "Tus Tejidos - Informacion PROVEEDOR";

        document.querySelector("#modal_content").innerHTML = response;
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  showUpdateProvider(id) {
    var object = new FormData();
    object.append("id", id);

    fetch("ProvidersController/showUpdateProvider", {
      method: "POST",
      body: object,
    })
      .then((repuesta) => repuesta.text())
      .then(function (reponse) {
        $("#my_modal1").modal("show");

        document.querySelector("#modal_title1").innerHTML =
          "Tus Tejidos - ACTUALIZAR PROVEEDOR";

        document.querySelector("#modal_content1").innerHTML = reponse;
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  updateProvider() {
    var object = new FormData(document.querySelector("#formUpateProvider"));
    fetch("ProvidersController/updateProvider", {
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
            text: "PROVEEDOR ACTUALIZADO CON EXITO",
          });
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  pais(id)
  {
    let depar = document.querySelector('#depar');
    var object = new FormData();
    object.append("pais",id);
    fetch("ProvidersController/showDepartamento", {
      method: "POST",
      body: object,
    })
      .then((respuesta) => respuesta.text())
      .then(function (response) {
        const departamentos = JSON.parse(response);
        let template = '<option class="FORM-CONTROL" selected disable>---Seleccione---</option>'
        departamentos.forEach(departa => {
          template += "<option value="+departa.cod_departamento+">"+departa.nombre_departamento+"</option>"
        });
        depar.innerHTML = template
      })
      .catch(function (error) {
        console.log(error);
      });

      depar.addEventListener('change', function(){
        const valor = depar.value;
        Provider.ciudad(valor);
      })
  }

  ciudad(id)
  {
    let ciudadd = document.querySelector('#ciudad');
    var object = new FormData();
    object.append("ciudad",id);
    fetch("ProvidersController/lisCiudad",{
      method:"POST",
      body: object
    })
    .then((respuesta)=>respuesta.text())
    .then(function(response){
      const ciudad = JSON.parse(response);
      let template = '<option class="FORM-CONTROL" selected disable>---Seleccione---</option>';
      ciudad.forEach(ciuda => {
        template += "<option value="+ciuda.cod_ciudad+">"+ciuda.nombre_ciudad+"</option>"
      });
      ciudadd.innerHTML = template;
    })
    .catch(function(error){
      console.log(error);
    })
  }


}
var Provider = new ProviderJs();
