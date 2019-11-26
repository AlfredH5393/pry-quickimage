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
    <title>Imagenes</title>
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
                                @click="limpiarAlertas()">Nuevo</button>
                                <input type="" id="id-user" value="<?php  echo $_SESSION['ID'] ?>" class="d-none">
                        </div>


                        <div class="container mt-3 text-center">
                            <div v-bind:class="alertgeneral" role="alert">
                                {{messagealert}}
                            </div>
                            <!-- Inicio de estructura generañ de Card de imagen -->
                            <div class="row m-auto" id="card-gallery" class=""
                                style="height:355px; overflow: scroll; margin-top: 10px ">

                                <div class="col-auto" v-for="Fotos in fotos">
                                    <!-- Inicio del contenedor  Card de imagen y botones -->
                                    <div class="card border-primary mb-4 " style="width: 18rem;">
                                        <img class="card-img-top" :src="'../src/img/JPG/'+Fotos.JPG" width="50"
                                            alt="Card image cap">

                                        <div class="card-body text-center">
                                            <h5 class="card-title ">{{Fotos.nombre}}</h5>
                                            <label> {{Fotos.descripcion}}</label>
                                            <div class="" style="margin-top: 1em">
                                                <button type="button" class="btn btn-success d-block m-auto"
                                                    data-toggle="modal" data-target="#editar-imagen" @click="limpiarAlertas();pasarDatosEditar(Fotos)">Editar</button>
                                            </div>

                                            <div class="" style="margin-top: 1em">
                                                <button type="button" class="btn btn-danger d-block m-auto "
                                                    data-toggle="modal" data-target="#eliminar-imagen" @click="limpiarAlertas();pasarDatosEliminar(Fotos)">Eliminar</button>
                                            </div>
                                        </div>

                                        <div class="form-row m-auto text-center">
                                            <div class="form-group col ">
                                                <h6>
                                                    <label> Clave: {{Fotos.Id}}</label>
                                                </h6>
                                            </div>
                                            <div class="form-group col">
                                                <h6>
                                                    <label>Categoria: {{Fotos.categoria}}</label>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="form-row m-auto ">
                                            <div class="form-group col">
                                                <h6>
                                                    <label>Autor: {{Fotos.usuario}}</label>
                                                </h6>
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
                                            <div class="form-group col-md-10  m-auto">
                                                <label for="inlineFormInput">Nombre:</label>
                                                <input type="text" class="form-control" id="nombre-insert"
                                                    name="nombre-insert"  maxlength="40">

                                                <label for="inlineFormInputGroup">Descripcion:</label>
                                                <input type="text" class="form-control " id="descripcion-insert"
                                                    name="descripcion-insert" maxlength="50">
                                                <label for="inlineFormInputGroup">Categoria:</label>
                                                <select name="combo-categoria" id="combo-categoria-insert"
                                                    class="form-control">
                                                    <option value="0">--Seleccione Categoria--</option>
                                                    <option v-for="Category in categorias" v-bind:value="Category.Id">
                                                        {{ Category.Categoria }}
                                                    </option>
                                                </select>
                                                <input type="text" class="form-control" id="id-user-insert"
                                                    style="display: none;" value="<?php  echo $_SESSION['ID'] ?> ">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group col-md-10  m-auto">
                                            <label for="inlineFormInputGroup">Seleccione formato de imagen:</label>
                                                <img v-if="urlPNG" :src="urlPNG" alt="" width="150" 
                                                    class="mx-auto d-block m-1">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="fotoPNG"
                                                        @change="verImagenPNG">
                                                    <label class="custom-file-label name-img8"
                                                        for="inputGroupFile03">PNG</label>
                                                </div>
                                                <br><br>
                                                <label for="inlineFormInputGroup">Seleccione formato de imagen:</label>
                                                <img v-if="urlJPG" :src="urlJPG" alt="" width="150" 
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
                                        @click="nuevaImagen()">Guardar</button>
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
                                    <div class="form-row  align-items-start">
                                        <div class="col">
                                            <div class="form-group col-md-10  m-auto">
                                                <label for="inlineFormInput">Nombre:</label>
                                                <input type="text" class="form-control" id="nombre-update"
                                                    name="nombre-update" placeholder="Nombre" maxlength="40">

                                                <label for="inlineFormInputGroup">Descripcion:</label>
                                                <input type="text" class="form-control " id="descripcion-update"
                                                    name="descripcion-update" placeholder="Descripcion" maxlength="50">
                                                <label for="inlineFormInputGroup">Categoria:</label>
                                                <select name="combo-categoria" id="combo-categoria-update"
                                                    class="form-control">
                                                    <option value="0">--Seleccione Categoria--</option>
                                                    <option v-for="Category in categorias" v-bind:value="Category.Id">
                                                            {{ Category.Categoria }}
                                                    </option>
                                                </select>
                                                <input type="text" class="form-control" id="id-user-update"
                                                    style="display: none;" value="<?php  echo $_SESSION['ID'] ?> ">
                                                <input type="text" class="form-control" id="idImagen-update"
                                                    style="display: none;">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group col-md-80  m-auto">
                                            <label for="inlineFormInputGroup">Seleccione formato de imagen:</label>
                                                <img v-if="urlPNG_update" :src="urlPNG_update" alt="" width="150" 
                                                    class="mx-auto d-block m-1">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="fotoPNG-update"
                                                        @change="verImagenPNG_update">
                                                    <label class="custom-file-label name-img8"
                                                        for="inputGroupFile03">PNG</label>
                                                </div>
                                                <br><br>
                                                <label for="inlineFormInputGroup">Seleccione formato de imagen:</label>
                                                <img v-if="urlJPG_update" :src="urlJPG_update" alt="" width="150" 
                                                    class="mx-auto d-block m-1">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="fotoJPG-update"
                                                        @change="verImagenJPG_update">
                                                    <label class="custom-file-label name-img8"
                                                        for="inputGroupFile03">JPG</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                                        @click="editarImagen()">Guardar</button>
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
                                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Imagen</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body  text-center">
                                    <img v-if="urlJPG_delete" :src="urlJPG_delete" alt="" width="150"
                                                    class="mx-auto d-block m-1">
                                    <input type="text" class="form-control " id="descripcion-delete"  placeholder="Descripcion" maxlength="50" disabled >
                                    <input type="text" class="form-control " id="id-image-delete" maxlength="50" style="display: none;">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"
                                        @click="elimarImagen()">SI</button>
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