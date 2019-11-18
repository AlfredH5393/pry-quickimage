const imagen = new Vue({
    el: '#Imagen',
    data: {
        urlJPG: '',
        urlPNG: '',
        categorias: [],
        alertgeneral: null,
        messagealert: null,
        nombre: null,
        descripcion: null,
        categoria: null,
        idUser: null,
        imagenPNG: null,
        imagenJPG: null
    },
    mounted: function () {
        this.cargarComboCategorias();
    },
    methods: {
        cargarComboCategorias: function () {
            let formdata = new FormData();
            formdata.append("option", "showdata")
            axios.post("../controller/category_controller.php", formdata)
                .then(function (response) {
                    console.log(response);
                    imagen.categorias = response.data.categories;
                })
        },
        verImagenPNG: (e) => {
            var filereader = new FileReader();
            filereader.readAsDataURL(e.target.files[0])
            filereader.onload = (e) => {
                imagen.urlPNG = e.target.result;
            }
        },
        verImagenJPG: (e) => {
            var filereader = new FileReader();
            filereader.readAsDataURL(e.target.files[0])
            filereader.onload = (e) => {
                imagen.urlJPG = e.target.result;
            }
        },

        nuevaImagen: function () {
            imagen.recogeValoresDeCajasdeTexto();
            if (imagen.cajasEstanVacias()) {
                imagen.alertgeneral = "alert alert-danger";
                imagen.messagealert = "Existen campos vacios";
                return false;
            } else {
                imagen.cargarDatosNuevos();
            }
        },


        recogeValoresDeCajasdeTexto: function () {
            imagen.nombre = (document.getElementById("nombre-insert").value);
            imagen.descripcion = (document.getElementById("descripcion-insert").value);
            imagen.categoria = (document.getElementById("combo-categoria-insert").value);
            imagen.idUser = (document.getElementById("id-user-insert").value);
            imagen.imagenPNG = (document.getElementById("fotoPNG").files[0]);
            imagen.imagenJPG = (document.getElementById("fotoJPG").files[0]);
        },
        cajasEstanVacias: function () {
            if (imagen.nombre == 0 || imagen.descripcion == 0 || imagen.categoria == 0 || imagen.idUser == 0 || imagen.imagenPNG == 0 ||
                imagen.imagenJPGS == 0) {
                return true;
            }
            return false;
        },
        cargarDatosNuevos: function () {
            let datos = {
                nombre: document.getElementById("nombre-insert").value,
                descripcion:  document.getElementById("descripcion-insert").value,
                categoria:  document.getElementById("combo-categoria-insert").value,
                idUser:  document.getElementById("id-user-insert").value,
                imagenPNG:  document.getElementById("fotoPNG").files[0],
                imagenJPG:  document.getElementById("fotoJPG").files[0],
            };
            let formData = imagen.toFormData(datos, 'insert', datos.imagenPNG, datos.imagenJPG);
            console.log(formData.datos);
            axios.post("../controller/image_controller.php", formData)
                .then(function (response) {
                    if (response.data == 1) {
                        imagen.alertgeneral = "alert alert-success";
                        imagen.messagealert = "Imagenes guardadas con exito!";
                    } else if (response.data == "") {
                        imagen.alertgeneral = 'alert alert-danger';
                        imagen.messagealert = 'Ocurrio un error al subir las imagenes';
                    }else{
                        imagen.alertgeneral = 'alert alert-danger';
                        imagen.messagealert = response.data;
                    }
                }).catch(function (error) {
                    console.log(error);
                });
        },


        toFormData: (obj, option, fileimgPNG, fileimgJPG) => {
            let fd = new FormData();
            fd.append('option', option);
            if (fileimgPNG == "0" && fileimgJPG == "0") {
              for (var i in obj) {
                fd.append(i, obj[i]);
              }
            } else {
              fd.append("imagenPNG", fileimgPNG)
              fd.append("imagenJPG", fileimgJPG)
              for (var i in obj) {
                fd.append(i, obj[i]);
              }
            }
            return fd;
          }
    }
});