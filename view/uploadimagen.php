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
    <title>Inicio</title>
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/css/bootstrap.css">
    <link rel="stylesheet" href="../src/css/all.css">

    <script src="../src/js/jquery-3.4.1.js"></script>
    <script src="../src/js/bootstrap.js"></script>
    <script src="../src/js/extras.js"></script>
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
            <div class="mx-width-1075 container-fluid mt-3 " id="Imagen">

                <div class="mycards">
                    <!-- Inicio de estructura general de Card contenedora color blanco -->
                    <div class="content-mycards">

                        <div class="container">
                            <h4 class="text-center font-weight-bold mt-2">Subir una imagen</h4>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#nueva-imagen"
                                @click="">Nuevo</button>
                        </div>


                        <div class="container">
                            <!-- Inicio de estructura generañ de Card de imagen -->
                            <div class="row" id="card-gallery" class=""
                                style="height:355px; overflow: scroll; margin-top: 10px ">

                                <div class="col-4">
                                    <!-- Inicio del contenedor  Card de imagen y botones -->
                                    <div class="card border-primary mb-4 " style="width: 18rem;">
                                        <img class="card-img-top" src="../src/img/harleyDivison.jpg"
                                            alt="Card image cap">
                                        <div class="card-body text-center">
                                            <h5 class="card-title ">Huejutla de Reyes</h5>

                                            <div class="" style="margin-top: 1em">
                                                <button type="button" class="btn btn-success d-block m-auto"
                                                    data-toggle="modal" data-target="#editar-imagen">Editar</button>
                                            </div>

                                            <div class="" style="margin-top: 1em">
                                                <button type="button" class="btn btn-danger d-block m-auto "
                                                    data-toggle="modal" data-target="#eliminar-imagen">Eliminar</button>
                                            </div>
                                        </div>

                                        <div class="form-row m-auto ">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control d-block "
                                                    placeholder="Para poner Id"></input>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control d-block "></input>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control  d-block "></input>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Inicio del contenedor  Card de imagen y botones -->

                                <div class="col-4">
                                    <!-- Inicio del contenedor  Card de imagen y botones -->
                                    <div class="card border-primary mb-4 " style="width: 18rem;">
                                        <img class="card-img-top" src="../src/img/harleyDivison.jpg"
                                            alt="Card image cap">
                                        <div class="card-body text-center">
                                            <h5 class="card-title ">Huejutla de Reyes</h5>

                                            <div class="" style="margin-top: 1em">
                                                <button type="button" class="btn btn-success d-block m-auto"
                                                    data-toggle="modal" data-target="#editar-imagen">Editar</button>
                                            </div>

                                            <div class="" style="margin-top: 1em">
                                                <button type="button" class="btn btn-danger d-block m-auto "
                                                    data-toggle="modal" data-target="#eliminar-imagen">Eliminar</button>
                                            </div>
                                        </div>

                                        <div class="form-row m-auto ">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control d-block "
                                                    placeholder="Para poner Id"></input>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control d-block "></input>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control  d-block "></input>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Inicio del contenedor  Card de imagen y botones -->

                                <div class="col-4">
                                    <!-- Inicio del contenedor  Card de imagen y botones -->
                                    <div class="card border-primary mb-4 " style="width: 18rem;">
                                        <img class="card-img-top" src="../src/img/harleyDivison.jpg"
                                            alt="Card image cap">
                                        <div class="card-body text-center">
                                            <h5 class="card-title ">Huejutla de Reyes</h5>

                                            <div class="" style="margin-top: 1em">
                                                <button type="button" class="btn btn-success d-block m-auto"
                                                    data-toggle="modal" data-target="#editar-imagen">Editar</button>
                                            </div>

                                            <div class="" style="margin-top: 1em">
                                                <button type="button" class="btn btn-danger d-block m-auto "
                                                    data-toggle="modal" data-target="#eliminar-imagen">Eliminar</button>
                                            </div>
                                        </div>

                                        <div class="form-row m-auto ">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control d-block "
                                                    placeholder="Para poner Id"></input>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control d-block "></input>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control  d-block "></input>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Inicio del contenedor  Card de imagen y botones -->

                            </div> <!-- Fin de estructura generañ de Card de imagen -->

                        </div>

                    </div>
                </div> <!-- Fin de estructura general de Card contenedora color blanco -->

                <!--- MODALES -->

                <!---Inicio MODAL NUEVO -->
                <div id="nuevoImagen">
                    <div class="modal fade" id="nueva-imagen" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Nueva Imagen</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body  text-center">
                                    <div class="form-row  align-items-start">
                                        <div class="col">
                                            <div class="form-group col-md-8  m-auto">
                                                <label for="inlineFormInput">Nombre:</label>
                                                <input type="text" class="form-control" id="nombre-insert"
                                                    name="nombre-insert" placeholder="Nombre" maxlength="40">

                                                <label for="inlineFormInputGroup">Descripcion:</label>
                                                <input type="text" class="form-control " id="descripcion-insert"
                                                    name="descripcion-insert" placeholder="Descripcion"
                                                    maxlength="50">
                                                <label for="inlineFormInputGroup">Categoria:</label>
                                                <select name="combo-categoria" id="combo-categoria-insert"
                                                    class="form-control">
                                                    <option value="0">--Seleccione Categoria--</option>
                                                    <option v-for="Category in categorias" v-bind:value="Category.Id">
                                                        {{ Category.Categoria }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group col-md-8  m-auto">
                                                <img v-if="urlPNG" :src="urlPNG" alt="" width="100" height="100"
                                                    class="mx-auto d-block m-1">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="fotoPNG"
                                                        @change="verImagenPNG">
                                                    <label class="custom-file-label name-img8"
                                                        for="inputGroupFile03">PNG</label>
                                                </div>
                                                <br>
                                                <img v-if="urlJPG" :src="urlJPG" alt="" width="100" height="100"
                                                    class="mx-auto d-block m-1">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="fotoJPG"
                                                        @change="verImagenJPG">
                                                    <label class="custom-file-label name-img8"
                                                        for="inputGroupFile03">JPG</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                                        @click="nuevoRol()">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---Fin MODAL NUEVO -->
                <!-- Aqui puedes poner los demas modales -->

                <!---Inicio MODAL Editar -->
                <div id="EditarImagen">
                    <div class="modal fade" id="editar-imagen" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Imagen</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body  text-center">
                                    <label for="nombre" class="col-form-label">Aqui pon todos los elementos de los
                                        modales</label>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                                        @click="nuevoRol()">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---Fin MODAL Editar -->

                <!---Inicio MODAL Eliminar -->
                <div id="elimiarImagen">
                    <div class="modal fade" id="eliminar-imagen" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Elimninar Imagen</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body  text-center">
                                    <label for="nombre" class="col-form-label">Aqui pon todos los elementos de los
                                        modales</label>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                                        @click="nuevoRol()">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---Fin MODAL Eliminar -->

            </div>

            <?php
            require('footer.html');
          ?>

        </div>

    </div>


</body>
<script src="../src/js/axios.js"></script>
<script src="../src/js/vue.js"></script>
<script src="../src/js/crudImage.js"></script>

</html>
<?php

  }
  else
  {
    header("location: ../index.html");
  }
 ?>