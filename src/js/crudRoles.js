const rol= new Vue({
	el:'#tablaRoles',
	data:{
		columna:'Codigo',
		columna2: 'Nombre',
        columna3:'Acciones',
        mensajesA:null,
        tipoalertaA: null,
        mensajesE:null,
        tipoalertaE: null,
        roles:[],
        elegido:{}
    },
    mounted:function(){
        this.cargaTabla()
    },
    methods:{
        cargaTabla:function(){
            let formdata =  new FormData();
            formdata.append("option","showdata")
            axios.post("http://localhost/7moProyecto/pry-quickimage/controller/rol_controller.php",formdata)
            .then(function(response){
                console.log(response);
                rol.roles=response.data.roles;
            })
        },
        nuevoRol:function(){
            if((document.getElementById("nombreRol").value) == ""){
                rol.tipoalertaA='alert alert-danger',
                rol.mensajesA = 'Campos vacios'
                return false;
            }else{
                let formdata =  new FormData();
                formdata.append("option","insert")
                formdata.append("nombre",document.getElementById("nombreRol").value)
                axios.post("http://localhost/7moProyecto/pry-quickimage/controller/rol_controller.php",formdata)
                .then(function(response){
                    if(response.data == 1){
                        rol.cargaTabla()
                        document.getElementById("nombreRol").value='',
                        rol.tipoalertaA='alert alert-success',
                        rol.mensajesA = 'Rol agregado correctamente'
                    }else if(response.data == ""){
                        rol.tipoalertaA='alert alert-danger',
                        rol.mensajesA = 'Rol ya existe'
                    }
                    
                })
            }
        },
        editarRol:function(){
            if((document.getElementById("nombreEditar_rol").value) == ""){
                rol.tipoalertaE='alert alert-danger',
                rol.mensajesE = 'Campo vacios'
                return false;
            }else{
                let formdata =  new FormData();
                formdata.append("option","update")
                formdata.append("id",document.getElementById("codigoEditar_rol").value)
                formdata.append("nombre",document.getElementById("nombreEditar_rol").value)
                axios.post("http://localhost/7moProyecto/pry-quickimage/controller/rol_controller.php",formdata)
                .then(function(response){
                    if(response.data == 1){
                        rol.cargaTabla()
                        rol.tipoalertaE='alert alert-success',
                        rol.mensajesE = 'El rol se ah editado corrrectamente'
                    }
                })
            }
        },
        eliminarRol:function(){
            let formdata =  new FormData();
            formdata.append("option","delete")
            formdata.append("id",document.getElementById("codigoEliminar_rol").value)
            axios.post("http://localhost/7moProyecto/pry-quickimage/controller/rol_controller.php",formdata)
            .then(function(response){
                if(response.data == 1){
                    rol.cargaTabla()
                }
            })
        },
        pasarDatosEditar(Rol){
            rol.elegido=Rol;
        },
        pasarDatosEliminar(Rol){
            rol.elegido=Rol;
        }
    }
});


