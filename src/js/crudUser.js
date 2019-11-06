const User = new Vue({
  el: "#log-user",
  data: {
    titlelog: "Login",
    messagealert: null,
    alertaofaccess: null,
    alertavalidregister: null,
    messagealertregister: null,
    btniniciartext: "Iniciar"
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
          .then(response => {
            if (response.data == "0") {
              (User.alertaofaccess = "alert alert-danger"),
                (User.messagealert = "Error al iniciar sesion");
                User.btniniciartext = "Iniciando";
            } else {
              window.location.href = "view/index.php";
            }
          });
      }
    },
    RegisterUser: function() {

      //variables iniciales para  registro y validacion
      let password = document.getElementById("pass").value;
      let password2 = document.getElementById("pass2").value;
      var valspace = /\s/;
      let datos = {
        option: 'register',
        nombre: document.getElementById("nombre").value,
        appaterno: document.getElementById("ap-paterno").value,
        apmaterno: document.getElementById("ap-materno").value,
        correo: document.getElementById("correo").value,
        usuario: document.getElementById("usuario").value,
        password: password,
      };
     
      if (
        datos.nombre == 0 ||
        datos.appaterno == 0 ||
        datos.apmaterno == 0 ||
        datos.correo == 0 ||
        datos.usuario == 0 ||
        password == 0 ||
        password2 == 0
      ) {
        (User.alertavalidregister = "alert alert-danger"),
          (User.messagealertregister = "Existen campos vacios");
        return false;
      } else {
        if (valspace.test(password)) {
          (User.alertavalidregister = "alert alert-danger"),
            (User.messagealertregister =
              "La contraseña no debe tener espacios");
        } else {
          if (password == password2) {
            axios
              .post("controller/user_controller.php",
                  {option:datos.option,
                  nombre:datos.nombre,
                  appaterno:datos.appaterno,
                  apmaterno:datos.apmaterno,
                  correo:datos.correo,
                  usuario:datos.usuario,
                  password:datos.password})
              .then( response => {
                if (response.data == "1") {
                  this.limpiarcajasregistro();
                  User.alertavalidregister = "alert alert-success",
                    User.messagealertregister ="Se ha registrado su cuenta exitosamente";
                } else {
                  (User.alertavalidregister = "alert alert-danger"),
                    (User.messagealertregister =
                      "Su cuenta no pudo registrarse");
                }
              });
         
          } else {
            User.alertavalidregister = "alert alert-danger",
              User.messagealertregister = "Las contraseñas no coinciden";
          }
        }
      }
    },
    limpiaralertas: function() {
      User.alertaofaccess = null;
      User.alertaofaccess = null;
      User.alertavalidregister = null;
      User.messagealertregister = null;
    },
    limpiarcajasregistro: function() {
      document.getElementById("nombre").value = "";
      document.getElementById("ap-paterno").value = "";
      document.getElementById("ap-materno").value = "";
      document.getElementById("correo").value = "";
      document.getElementById("usuario").value = "";
      document.getElementById("pass").value = "";
      document.getElementById("pass2").value = "";
    }
  }
});
