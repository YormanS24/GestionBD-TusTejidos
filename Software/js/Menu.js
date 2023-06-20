class MenuJs {
  menu(route) {
    fetch(route)
      .then((respuesta) => respuesta.text())
      .then(function (response) {
        $("#content").html(response);
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  closeSession() {
    fetch("AccessController/closeSession")
      .then((resp) => resp.json())
      .then(function (data) {
        Swal.fire({
          icon: "success",
          title: data.message,
          showConfirmButton: false,
          timer: 1500,
        });

        setTimeout(function () {
          location.href = "index.php";
        }, 2200);
      })
      .catch(function (error) {
        console.log(error);
      });
  }
}
var Menu = new MenuJs();
