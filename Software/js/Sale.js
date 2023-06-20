class SalesJs {
  validarDocFact() {
    var cancelado = document.getElementById("cancelado");
    var pago = document.getElementById("pago");
    suma = 0;
    arrayDetail = [];
    let data = new Date();
    var time =
      data.getHours() + ":" + data.getMinutes() + ":" + data.getSeconds();
    var documento = document.getElementById("doc").value;
    var object = new FormData();
    object.append("documento", documento);
    object.append("time", time);
    fetch("SalesController/addFactura", {
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
          pago.disabled = false;
          cancelado.disabled = false;
          Swal.fire({
            icon: "success",
            title: "Factura Generada",
            showConfirmButton: false,
            timer: 1500,
          });
          var childNodes = document
            .getElementById("val")
            .getElementsByTagName("*");
          for (var node of childNodes) {
            node.disabled = true;
          }
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  addDetalle(id, precio,nombreProduct,tipoProduct) {
    suma = suma + 1;
    let data = new Date();
    //var time = data.getHours() + ":" + data.getMinutes() + ":" + data.getSeconds();
    var doc = document.getElementById("doc").value;
    var object = new FormData();
    object.append("documento", doc);
    object.append("id", id);
    object.append("ordinal", suma);
    object.append("precio", precio);
    object.append("nombreProduct", nombreProduct);
    object.append("tipoProduct", tipoProduct);
    // object.append("time", time);
    arrayDetail.push(id);
    Swal.fire({
      icon: "info",
      title: "!! PAGAR FACTURA  ¡¡",
      cancelButtonColor: "#7a82ff",
      showCancelButton: true,
      confirmButtonColor: "#FF5733",
      confirmButtonText: "PAGAR",
    }).then((result) => {
      if (result.isConfirmed) {
        object.append("estado", "APROBADA");
        fetch("SalesController/addDetalle", {
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
             // $("#pagos").dropdown("show");
              //document.querySelector("#compra").innerHTML = response;
            }
          })
          .catch(function (error) {
            console.log(error);
          });
      }else{
        object.append("estado", "CANCELADA");
        fetch("SalesController/addDetalle", {
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
              //$("#pagos").dropdown("show");
              //document.querySelector("#compra").innerHTML = response;
            }
          })
          .catch(function (error) {
            console.log(error);
          });
      }
    });
  }

  showFacturaa() {
    var cancelado = document.getElementById("cancelado");
    var pago = document.getElementById("pago");
    var estado = document.getElementById("aprobada").value;
    var object = new FormData();
    object.append("estado", estado);
    object.append("array", arrayDetail);
    fetch("SalesController/generateFactura", {
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
          $("#pagos").dropdown("hide");
          document.querySelector("#compra").innerHTML = "";
          pago.disabled = true;
          cancelado.disabled = true;
          document.querySelector("#content").innerHTML = response;
          Swal.fire({
            icon: "success",
            title: "EXITO",
            text: "FACTURA REGISTRADA",
          });
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  showFacturaCan() {
    var cancelado = document.getElementById("cancelado");
    var pago = document.getElementById("pago");
    var estado = document.getElementById("cancelada").value;
    var object = new FormData();
    object.append("estado", estado);
    object.append("array", arrayDetail);
    fetch("SalesController/generateFactura", {
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
          $("#pagos").dropdown("hide");
          document.querySelector("#compra").innerHTML = "";
          pago.disabled = true;
          cancelado.disabled = true;
          document.querySelector("#content").innerHTML = response;
          Swal.fire({
            icon: "success",
            title: "EXITO",
            text: "FACTURA REGISTRADA",
          });
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  deleteDetail(id, fac, codProduct) {
    Swal.fire({
      icon: "info",
      title: "!! REALMENTE DESEA ELIMINAR EL PRODUCTO  ¡¡",
      cancelButtonColor: "#7a82ff",
      showCancelButton: true,
      confirmButtonColor: "#FF5733",
      confirmButtonText: "ELIMINAR",
    }).then((result) => {
      if (result.isConfirmed) {
        const arry = arrayDetail.filter((item) => item !== codProduct)
        arrayDetail = arry;
        var object = new FormData();
        object.append("id", id);
        object.append("factura", fac);
        object.append("confir", result.isConfirmed);
        fetch("SalesController/deleteDetail", {
          method: "POST",
          body: object,
        })
          .then((repuesta) => repuesta.text())
          .then(function (reponse) {
            $("#pagos").dropdown("show");
            document.querySelector("#compra").innerHTML = reponse;
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

  filtroBusqueda() {
    var filtro = document.getElementById("filtro").value;
    var busqueda = document.getElementById("busqueda").value;
    var object = new FormData();
    object.append("filtro", filtro);
    object.append("busqueda", busqueda);
    fetch("SalesController/filtroBusqueda", {
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

  showFactura(id) {
    var object = new FormData();
    object.append("id", id);

    fetch("SalesController/showFactura", {
      method: "POST",
      body: object,
    })
      .then((respuesta) => respuesta.text())
      .then(function (response) {
        $("#my_modal").modal("show");

        document.querySelector("#modal_title").innerHTML =
          "Tus Tejidos - INFORMACION FACTURA DETALLE";

        document.querySelector("#modal_content").innerHTML = response;
      })
      .catch(function (error) {
        console.log(error);
      });
  }
}
var sale = new SalesJs();
var suma = 0;
var arrayDetail = [];
