const imagen = new Vue({
    el: '#Imagen',
    data: {
        urlJPG:'',
        urlPNG:'',
        categorias: [],
    },
    mounted: function () {
        this.cargarComboCategorias()
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
        }
    }
});