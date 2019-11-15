<?php
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES') 
{?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/css/bootstrap.css">
    <link rel="stylesheet" href="../src/css/all.css">
    <link rel="stylesheet" href="../src/css/jquery.mCustomScrollbar.min.css">

    <script  src="../src/js/jquery-3.4.1.js"></script>
    <script  src="../src/js/bootstrap.js"></script>
  
    <script  src="../src/js/extras.js"></script>
</head>
<body>
<div class="wrapper">
        <?php
            require("sidebar.php");
           ?>

        <div id="content" class="bg-ccc">
            <?php
                  require("header.html");
                ?>


            <div class="mx-width-1075 container-fluid" id="app-user">
                    <div  class="mycards"> <!--Mycard-->
                        <div class="content-mycards ">
                            <div class="container">
                                <h4 class="text-center font-weight-bold mt-2">Usuarios</h4>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#nuevo-usuario" @click="limpiarAlertas()">Nuevo</button>
                               
                            </div> 
                           
                            <div class="container text-center">
                                <br>
                                    <div v-bind:class="alertgeneral" role="alert">
                                        {{messagealert}}
                                    </div>
                                   
                                
                                    <!-- Tabla de roles -->
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12">
                                            <div class="table-responsive scrollbar " style="height:355px; overflow:scroll;">
                                            <table class="table table-hover ">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>
                                                            <h6>Codigo</h6>
                                                        </th>
                                                        <th>
                                                            <h6>Nombre</h6>
                                                        </th>
                                                        <th>
                                                            <h6>A. Materno</h6>
                                                        </th>
                                                        <th>
                                                            <h6>A. Paterno</h6>
                                                        </th>
                                                        <th>
                                                            <h6>Correo</h6>
                                                        </th>
                                                        <th>
                                                            <h6>Usuario</h6>
                                                        </th>
                                                        <th>
                                                            <h6>contraseña</h6>
                                                        </th>
                                                        <th>
                                                            <h6>Perfil</h6>
                                                        </th>
                                                        <th>
                                                            <h6>Tipo de usuario</h6>
                                                        </th>
                                                        <th>
                                                            <h6>Acciones</h6>
                                                            
                                                        </th>
                                                        <th></th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="Usuarios in usuarios">
                                                        <th scope="row">{{Usuarios.Id}}</th>
                                                        <td>{{Usuarios.nombre}}</td>
                                                        <td>{{Usuarios.Apepaterno}}</td>
                                                        <td>{{Usuarios.Apematerno}}</td>
                                                        <td>{{Usuarios.correo}}</td>
                                                        <td>{{Usuarios.usuario}}</td>
                                                        <td>{{Usuarios.pass}}</td>
                                                        <td><img :src="'../src/img/'+Usuarios.img" width="50" alt=""></td>
                                                        <td>{{Usuarios.rol}}</td>
                                                        <td>
                                                            <button class="btn btn-success" data-toggle="modal"
                                                                data-target="#editar-usuario" @click="pasarDatosEditar(Usuarios);limpiarAlertas()" >Editar</button>
                                                            
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-danger" data-toggle="modal"
                                                                data-target="#eliminar-user" @click="pasarDatosEliminar(Usuarios);limpiarAlertas()"
                                                            >Eliminar</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
               

                
               

                    <!--- MODALES -->

                    <!--- MODAL NUEVO -->
                    <div id="nuevoUsuario">
                        <div class="modal fade" id="nuevo-usuario" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Nuevo usuario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body  text-center">
                   
                                        <form action="" id="form-insert-foto" enctype="multipart/form-data">
                                        <label  for="inlineFormInput">Imagen  de perfil seleccionada:</label>
                                            <img v-if="url" :src="url" alt="" width="150" height="150" class="mx-auto d-block m-1 img-user" >
                                            
                                                <div class="form-row  align-items-start">
                                                    <div class="col" >
                                                        <div class="form-group col-md-8  m-auto">
                                                            <label  for="inlineFormInput">Nombre:</label>
                                                            <input type="text" class="form-control"  id="nombre-insert" name="nombre-insert" placeholder="Nombre" maxlength="40">
                                                            
                                                            
                                                            <label  for="inlineFormInputGroup">Apellido paterno:</label>
                                                            <input type="text" class="form-control " id="apepaterno-insert" name="apepaterno-insert" placeholder="Apellido paterno" maxlength="50">

                                                            <label  for="inlineFormInputGroup">Apellido materno:</label>
                                                            <input type="text" class="form-control  " id="apematerno-insert" name="apematerno-insert"  placeholder="Apellido materno" maxlength="100">

                                                            <label  for="inlineFormInputGroup">Rol:</label>
                                                            <select name="combo-rol" id="combo-rol-insert" class="form-control">
                                                                <option value="0">--Seleccione Rol--</option>
                                                                <option v-for="Rol in roles" v-bind:value="Rol.Id">
                                                                    {{ Rol.rol }}
                                                                </option>
                                                                
                                                            </select>
                                                        </div> 
                                    
                                                    </div>
                                               
                                                    <div class="col" >
                                                        <div class="form-group col-md-8  m-auto">
                                                        <label  for="inlineFormInput">Imagen de perfil:</label>
                                                            <div class="custom-file">
                                                            
                                                            <input type="file" class="custom-file-input"  id="foto" @change="verImagen"> 
                                                                <label class="custom-file-label name-img8" for="inputGroupFile03">Agrege  Imagen</label>
                                                            </div> 
                                                       
                                                           
                                                             
                                                            <label  for="inlineFormInput">Correo:</label>
                                                            <input type="email" class="form-control" id="correo-insert" name="correo-inser" placeholder="Nombre" maxlength="40">
                                                            
                                                            
                                                            <label  for="inlineFormInputGroup">Usuario:</label>
                                                            <input type="text" class="form-control " id="usuario-insert" name="usuario-insert" placeholder="Apellido paterno" maxlength="90">

                                                            <label  for="inlineFormInputGroup">contraseña:</label>
                                                            <input type="password" class="form-control  " id="password-insert" name="password-insert"  placeholder="Apellido materno"maxlength="100">
                                                         
                                                        </div>
                                                    </div>
                                              </div>
                                              <br>
                                              
                                        </form>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"
                                            @click="nuevoUsuario()">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!--- END MODAL NUEVO -->

                    <!--- MODAL EDITAR -->
                    <div class="modal fade" id="editar-usuario" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Usuario</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body  text-center">
                                    <!-- <label for="nombre" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" v-model="elegido.rol" id="nombreEditar_rol"> -->
                                    
                                        <form action=""  enctype="multipart/form-data">
                                        <input type="text" v-model="elegido.Id" style="display: none;"
                                        id="id-user-update"> 
                                        <label  for="inlineFormInput">Imagen de perfil actual:</label>
                                        <img v-if="url2" :src="url2"  alt="" width="150" height="150" class="mx-auto d-block m-1 img-user" >
                                        
                                                <div class="form-row  align-items-start">

                                                    <div class="col" >
                                                        <div class="form-group col-md-8 m-auto">
                                                            <label  for="inlineFormInput">Nombre:</label>
                                                            <input type="text" class="form-control"  v-model="elegido.nombre"  id="nombre-update" name="nombre-insert" placeholder="Nombre" maxlength="40">
                                                            
                                                            
                                                            <label  for="inlineFormInputGroup">Apellido paterno:</label>
                                                            <input type="text" class="form-control " v-model="elegido.Apepaterno" id="apepaterno-update" name="apepaterno-insert" placeholder="Apellido paterno" maxlength="50">

                                                            <label  for="inlineFormInputGroup">Apellido materno:</label>
                                                            <input type="text" class="form-control  " v-model="elegido.Apematerno" id="apematerno-update" name="apematerno-insert"  placeholder="Apellido materno" maxlength="100">

                                                            <label  for="inlineFormInputGroup">Rol:</label>
                                                            <select name="combo-rol" id="combo-rol-update" class="form-control" >
                                                                <option value="0">--Seleccione Rol--</option >
                                                                <option v-for="Rol in roles"  v-bind:value="Rol.Id" >
                                                                    {{ Rol.rol }}
                                                                </option>
                                                                
                                                            </select>
                                                        </div> 
                                    
                                                    </div>
                                               
                                                    <div class="col" >
                                                        <div class="form-group col-md-8 m-auto">
                                                            <label  for="inlineFormInput">Imagen de perfil:</label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"  id="foto-update" @change="verImagenUpdate"> 
                                                                <label class="custom-file-label name-img8" for="inputGroupFile03">Actuaizar Imagen</label>
                                                            </div> 
                                                       
                                                            <label  for="inlineFormInput">Correo:</label>
                                                            <input type="email" class="form-control" v-model="elegido.correo" id="correo-update" name="correo-inser" placeholder="Nombre" maxlength="40">
                                                            
                                                            
                                                            <label  for="inlineFormInputGroup">Usuario:</label>
                                                            <input type="text" class="form-control " id="usuario-update" v-model="elegido.usuario" name="usuario-insert" placeholder="Apellido paterno" maxlength="90">

                                                            <label  for="inlineFormInputGroup">contraseña:</label>
                                                            <input type="password" class="form-control  " id="password-update"  v-model="elegido.pass"  name="password-insert"  placeholder="Apellido materno"maxlength="100">
                                                         
                                                        </div>
                                                    </div>
                                              </div>
                                              <br>
                                              
                                        </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" @click="editarUsuario()">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div><!--- END MODAL EDITAR -->

                    <!-- MODAL ELIMINAR-->
                    <div class="modal fade bd-example-modal-sm" id="eliminar-user" tabindex="-1" role="dialog"
                        aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Eliminar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="text-center">¿Eliminar usuario?</h5>
                                    <div class="form-group">
                                    <input class="form-control" type="text" v-model="elegido.nombre"
                                            id="nombreEliminar_user" disabled>
                                        <input class="form-control" type="text" v-model="elegido.Id"
                                            id="codigoEliminar_user" style="display: none;">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"
                                        @click="elimarUsuario()">SI</button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- END MODAL ELIMINAR-->

                </div><!--End Mycard-->
            </div>

            <?php
            require('footer.html');
            ?>
        </div>
    </div>

</body>
    <script src="../src/js/axios.js"></script>
     <script src="../src/js/vue.js"></script>
     <script src="../src/js/crudUser.js"></script>
</html>
<?php
  }
  else
  {
    header("location: ../index.html");
  }
 ?>