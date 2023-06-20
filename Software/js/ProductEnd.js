class ProductEndJs {
  addProductoEnd() {
    var object = new FormData(document.querySelector("#formProductoEnd"));
    fetch("ProductEndController/addProductoEnd", {
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
            text: "PRODUCTO REGISTRADO CON EXITO",
          });
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  busquedaFiltro() {
    var filtro = document.getElementById("filtro").value;
    var busqueda = document.getElementById("busqueda").value;
    var object = new FormData();
        object.append("filtro", filtro );
        object.append("busqueda", busqueda);
    fetch("ProductEndController/busquedaFiltro", {
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

  showProductoEnd(id)
  {
    var object = new FormData();
    object.append("id", id);

    fetch("ProductEndController/showProductoEnd", {
      method: "POST",
      body: object,
    })
      .then((respuesta) => respuesta.text())
      .then(function (response) {
        $("#my_modal").modal("show");

        document.querySelector("#modal_title").innerHTML =
          "Tus Tejidos - INFORMACION PRODUCTO TERMINADO";

        document.querySelector("#modal_content").innerHTML = response;
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  showUpdateProduct(id)
  {
    var object = new FormData();
    object.append("id", id);

    fetch("ProductEndController/showUpdateProduct", {
      method: "POST",
      body: object,
    })
      .then((respuesta) => respuesta.text())
      .then(function (response) {
        $("#my_modal1").modal("show");

        document.querySelector("#modal_title1").innerHTML =
          "Tus Tejidos - ACTUALIZAR PRODUCTO TERMINADO";

        document.querySelector("#modal_content1").innerHTML = response;
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  updateProduct()
  {
    var object = new FormData(document.querySelector("#updateProduct"));
    fetch("ProductEndController/updateProduct", {
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
var productEnd = new ProductEndJs();
