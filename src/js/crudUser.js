const User = new Vue({
  el: "#log-user",
  data: {
    titlelog: "Login",
    messagealert: null,
    alertaofaccess: null,
    btniniciartext:'Iniciar'
  },
  methods: {
    accesouser: function() {
      if (
        document.getElementById("user").value == 0 ||
        document.getElementById("password").value == 0
      ) {
        (User.alertaofaccess = "alert alert-danger"),
          (User.messagealert = "Campos vacios");
      } else {
        User.btniniciartext = "Iniciando..";
        let formdata = new FormData();
        formdata.append("option", "access");
        formdata.append("user", document.getElementById("user").value);
        formdata.append("password", document.getElementById("password").value);
        axios
          .post("controller/user_controller.php", formdata)
          .then(function(response) {
            if (response.data == "0") {
              (User.alertaofaccess = "alert alert-danger"),
                (User.messagealert = "Error al iniciar sesion");
            } else {
              window.location.href = "view/index.php";
            }
          });
      }
    },
    nuevoUser: function() {}
  }
});
