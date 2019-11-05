<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador-Roles</title>
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/css/bootstrap.css">
    <link rel="stylesheet" href="../src/css/all.css">

    <script type="text/javascript" src="../src/js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="../src/js/bootstrap.js"></script>
    <script src="../src/js/config.js"></script>
</head>

<body>
    <div class="wrapper">
        <?php
            require("sidebar.html");
           ?>

        <div id="content">
            <?php
                  require("header.html");
                ?>


            <div class="container-fluid" id="tablaRoles">
                <div class="container">
                    <h4 class="text-center font-weight-bold mt-2">Roles</h4>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#nuevo-rol" @click="limpiar()">Nuevo</button>

                </div>

                <br>
                <div class="container text-center">
                    <div v-bind:class="tipoalertaA" role="alert">
                        {{mensajesA}}
                    </div>
                    <div v-bind:class="tipoalertaE" id="alerta">
                        {{mensajesE}}
                    </div>
                    <div v-bind:class="tipoalertaEli" id="alerta">
                        {{mensajesEli}}
                    </div>
                    <!-- Tabla de roles -->
                    <div class="row d-flex justify-content-center">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12">
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>
                                            <h6>Codigo</h6>
                                        </th>
                                        <th>
                                            <h6>Nombre</h6>
                                        </th>
                                        <th>
                                            <h6>Acciones</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="Rol in roles">
                                        <th scope="row">{{Rol.Id}}</th>
                                        <td>{{Rol.rol}}</td>
                                        <td>
                                            <button class="btn btn-success" data-toggle="modal"
                                                data-target="#editar-rol" @click="pasarDatosEditar(Rol);limpiar()">Editar</button>
                                            <button class="btn btn-danger" data-toggle="modal"
                                                data-target="#eliminar-rol"
                                                @click="pasarDatosEliminar(Rol);limpiar()">Eliminar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    

                    <!--- MODALES -->
                    <!--- MODAL NUEVO -->

                    <div id="nuevoRol">
                        <div class="modal fade" id="nuevo-rol" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Nuevo rol</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="nombre" class="col-form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="nombreRol">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"
                                            @click="nuevoRol()">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- MODAL EDITAR -->
                    <div class="modal fade" id="editar-rol" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Editar rol</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label for="nombre" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" v-model="elegido.rol" id="nombreEditar_rol">
                                    <input type="text" v-model="elegido.Id" style="display: none;"
                                        id="codigoEditar_rol">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" @click="editarRol()">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- MODAL ELIMINAR-->
                    <div class="modal fade bd-example-modal-sm" id="eliminar-rol" tabindex="-1" role="dialog"
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
                                    <h5 class="text-center">¿Eliminar rol?</h5>
                                    <div class="form-group">
                                        <label for="">Nombre:</label>
                                        <input class="form-control" type="text" v-model="elegido.rol"
                                            id="nombreEliminar_rol" disabled>
                                        <input class="form-control" type="text" v-model="elegido.Id"
                                            id="codigoEliminar_rol" style="display: none;">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"
                                        @click="eliminarRol()">SI</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            require('footer.html');
            ?>
        </div>
    </div>


    <script>
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    </script>
</body>



<script type="text/javascript" src="../src/js/axios.js"></script>
<script type="text/javascript" src="../src/js/vue.js"></script>
<script type="text/javascript" src="../src/js/crudRoles.js"></script>

</html>