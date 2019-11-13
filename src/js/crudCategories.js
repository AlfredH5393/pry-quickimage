const Category = new Vue({
  el: "#tablaCategories",
  data: {
    messagealert: null,
    alertaofaccess: null,
    alertgeneral: null,
    alertavalidregister: null,
    messagealertregister: null,
    btniniciartext: "Iniciar",
    usuarios: [],
    category: [],
    elegido: {},
    url: '',
    url2: ''
  },
  mounted: function () {
    this.getDatos();
  },
  methods: {
    getDatos: function () {
      let formdata = new FormData();
      formdata.append("option", "showdata")
      axios.post("../controller/category_controller.php", formdata)
        .then(function (response) {
          console.log(response);
          Category.category = response.data.categories;
        })
    },
    nuevaCategoria: function () {
      if ((document.getElementById("nombreCategoria").value) == 0) {
        Category.alertgeneral = 'alert alert-danger',
          Category.alertaofaccess = 'Campos vacios'
        return false;
      } else {
        let formdata = new FormData();
        formdata.append("option", "insert")
        formdata.append("nombre", document.getElementById("nombreCategoria").value)
        axios.post("../controller/category_controller.php", formdata)
          .then(function (response) {
            if (response.data == 1) {
              Category.getDatos()
              document.getElementById("nombreCategoria").value = '',
                Category.alertgeneral = 'alert alert-success',
                Category.alertaofaccess = 'Categoria agregado correctamente'
            } else if (response.data == "") {
              Category.alertgeneral = 'alert alert-danger',
                Category.alertaofaccess = 'Error, el categoria ya existe'
            }

          })
      }
    },
    editarCategoria: () => {
      if ((document.getElementById("nombre-update").value) == 0) {
        Category.alertgeneral = 'alert alert-danger',
          Category.alertaofaccess = 'Campo vacios'
        return false;
      } else {
        let formdata = new FormData();
        formdata.append("option", "update")
        formdata.append("id", document.getElementById("codigo-update").value)
        formdata.append("nombre", document.getElementById("nombre-update").value)
        axios.post("../controller/category_controller.php", formdata)
          .then(function (response) {
            if (response.data == 1) {
              Category.getDatos()
              Category.alertgeneral = 'alert alert-success',
                Category.alertaofaccess = 'El rol se ah editado corrrectamente'
            }
          })
      }
    },
    eliminarCategoria: function () {
      if ((document.getElementById("nombre-delete").value) == 0) {
        Category.alertgeneral = 'alert alert-danger',
        Category.alertaofaccess = 'Campo vacio'
      } else {
        let formdata = new FormData();
        formdata.append("option", "delete")
        formdata.append("id", document.getElementById("codigo-delete").value)
        axios.post("../controller/category_controller.php", formdata)
          .then(function (response) {
            if (response.data == 1) {
              Category.getDatos()
              Category.alertgeneral = 'alert alert-success',
              Category.alertaofaccess = 'El rol se ah eliminado corrrectamente'
            } else if (response.data == "") {
              Category.alertgeneral = 'alert alert-danger',
              Category.alertaofaccess = 'Error al eliminar, el rol esta asignado a por lo menos 1 usuario'
            }
          })
      }
    },

    limpiarAlertas: () => {
      Category.alertaofaccess = null;
      Category.alertgeneral = null;
    },
    pasarDatosEditar: (categoria) => {
      Category.elegido = categoria;
    },
    pasarDatosEliminar: (categoria) => {
      Category.elegido = categoria;
    }
  }
});