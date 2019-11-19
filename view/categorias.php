<?php
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES'  && $_SESSION['rol']=="Administrador") 
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

    <script type="text/javascript" src="../src/js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="../src/js/bootstrap.js"></script>
    <script type="text/javascript" src="../src/js/extras.js"></script>
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


            <div class="mx-width-1075 container-fluid" id="tablaCategories">
                <div class="mycards">
                    <!--Mycard-->
                    <div class="content-mycards">
                        <div class="container">
                            <h4 class="text-center font-weight-bold mt-2">Categorias</h4>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#nuevo-categoria"
                                @click="limpiarAlertas()">Nuevo</button>

                        </div>
                        <div class="container text-center">
                            <br>
                            <div v-bind:class="alertgeneral" role="alert">
                                {{alertaofaccess}}
                            </div>
                            <!-- Tabla de roles -->
                            <div class="row d-flex justify-content-center">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12">
                                    <div class="table-responsive scrollbar" style="height:355px; overflow: scroll;">
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
                                                <tr v-for="Categories in category">
                                                    <th scope="row">{{Categories.Id}}</th>
                                                    <td>{{Categories.Categoria}}</td>
                                                    <td>
                                                        <button class="btn btn-success" data-toggle="modal"
                                                            data-target="#editar-categoria"
                                                            @click="pasarDatosEditar(Categories)">Editar</button>
                                                        <button class="btn btn-danger" data-toggle="modal"
                                                            data-target="#eliminar-categoria" @click="pasarDatosEliminar(Categories)">Eliminar</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
                <!--End Mycard-->
                <!--- MODALES -->

                <!--- MODAL NUEVO -->

                <div class="modal fade" id="nuevo-categoria" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Nuevo rol</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body  text-center">
                                <label for="nombre" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombreCategoria">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal"
                                    @click="nuevaCategoria()">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--- MODAL EDITAR -->
                <div class="modal fade" id="editar-categoria" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Editar Categoria</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body  text-center">
                                <label for="nombre" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre-update">
                                <input type="text" style="display: none;" id="codigo-update">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal"
                                    @click="editarCategoria()">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MODAL ELIMINAR-->
                <div class="modal fade bd-example-modal-sm" id="eliminar-categoria" tabindex="-1" role="dialog"
                    aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Eliminar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body  text-center">
                                <h5 class="text-center">¿Eliminar rol?</h5>
                                <div class="form-group">
                                    <label for="">Nombre:</label>
                                    <input class="form-control" type="text" 
                                        id="nombre-delete" disabled>
                                    <input class="form-control" type="text" id="codigo-delete"
                                        style="display: none;">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"
                                    @click="eliminarCategoria()">SI</button>
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

</body>
<script src="../src/js/axios.js"></script>
<script src="../src/js/vue.js"></script>
<script type="text/javascript" src="../src/js/crudCategories.js"></script>

</html>
<?php
  }
  else
  {
    header("location: ../index.html");
  }
 ?>