<?php
class UsersView
{
    function listUsers($array_users)
    {
?>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center" id="fon">
                    <div class="card-title titu">TUS TEJIDOS - USUARIOS</div>
                </div>
                <div class="mt-3">

                    <div class="container">

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mt-2 mf">
                                    <i class="fas fa-filter"></i>&nbsp;FILTROS DE BUSQUEDA:
                                    <input type="hidden" value="lista" id="vista" name="vista">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <select class="form-control form-control-lg" id="filtro" name="filtro">
                                    <option> </option>
                                    <option value="nombre1_usuario">NOMBRE</option>
                                    <option value="apellido1_usuario ">APELLIDO</option>
                                    <option value="documento">DOCUMENTO</option>
                                    <option value="telefono ">TELEFONO</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <div class="offset-md-1 ">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg " id="busqueda" name="busqueda" placeholder="Buscar por Tu Eleccion">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-lg btn-warning" onclick="User.busquedaFiltro();">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <hr class="featurette-divider">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="#" role="button">
                            <i class="fas fa-arrow-circle-left fa-2x" style="cursor:pointer;" title="ATRAS" onclick="Menu.menu('UsersController/listUser')"></i>
                        </a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover table-head-bg-danger">
                            <thead>
                                <tr id="cen">
                                    <th scope="col">#&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">DOCUMENTO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">NOMBRE 1&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">NOMBRE 2&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">APELLIDO 1&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">APELLIDO 2&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">TELEFONO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">CORREO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody id="cen">

                                <?php
                                $i = 0;
                                foreach ($array_users as $user) {
                                    $i++;

                                    $user_doc = $user->documento;
                                    $user_nom1 = $user->nombre1_usuario;
                                    $user_nom2 = $user->nombre2_usuario;
                                    $user_apelli1 = $user->apellido1_usuario;
                                    $user_apelli2 = $user->apellido2_usuario;
                                    $user_tele = $user->telefono;
                                    $user_correo = $user->correo_usuario;
                                ?>
                                    <?php
                                    if (($i % 2) === 0) {
                                    ?>
                                        <tr>
                                            <td class="table-info"><?php echo $i ?></td>
                                            <td class="table-info"><?php echo $user_doc ?></td>
                                            <td class="table-info"><?php echo $user_nom1 ?></td>
                                            <td class="table-info"><?php echo $user_nom2 ?></td>
                                            <td class="table-info"><?php echo $user_apelli1 ?></td>
                                            <td class="table-info"><?php echo $user_apelli2 ?></td>
                                            <td class="table-info"><?php echo $user_tele ?></td>
                                            <td class="table-info"><?php echo $user_correo ?></td>
                                        </tr>
                                    <?php
                                    } else {
                                    ?>
                                        <tr>
                                            <td class="color"><?php echo $i ?></td>
                                            <td class="color"><?php echo $user_doc ?></td>
                                            <td class="color"><?php echo $user_nom1 ?></td>
                                            <td class="color"><?php echo $user_nom2 ?></td>
                                            <td class="color"><?php echo $user_apelli1 ?></td>
                                            <td class="color"><?php echo $user_apelli2 ?></td>
                                            <td class="color"><?php echo $user_tele ?></td>
                                            <td class="color"><?php echo $user_correo ?></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/Paginate.js"></script>
    <?php
    }

    function addUser($array_typeDoc)
    {
    ?>
        <div class="card">
            <div class="card-header d-flex justify-content-center" id="fon">
                <div class="card-title titu">TUS TEJIDOS - CREAR USUARIO</div>
            </div>
            <div class="card-body">

                <form action="" class="row row-demo-grid" id="formUser">

                    <div class="col-6">
                        <div>
                            <label for="exampleInputEmail1">PRIMER NOMBRE</label>
                            <input type="text" class="form-control" id="nombre1" name="nombre1" placeholder="PRIMER NOMBRE">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="">
                            <label for="nombre2">SEGUNDO NOMBRE</label>
                            <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="SEGUNDO NOMBRE">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="apellido1">PRIMER APELLIDO</label>
                            <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="PRIMER APELLDO">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="apellido2">SEGUNDO APELLIDO</label>
                            <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="SEGUNDO APELLIDO">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECIONE SEXO</code></label>
                            <select class="custom-select rounded-3" id="sexo" name="sexo">
                                <option>SELECIONE...</option>
                                <option value="M">MASCULINO</option>
                                <option value="F">FEMENINO</option>
                                <option value="I">INDEFINIDO</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECIONE TIPO DOCUMENTO</code></label>
                            <select class="custom-select rounded-3" id="tipo_documento" name="tipo_documento">
                                <option>SELECCIONE...</option>
                                <?php
                                if ($array_typeDoc) {
                                    foreach ($array_typeDoc as $docu) {
                                        $docu_cod = $docu->cod_documento;
                                        $docu_nom = $docu->nombre_documento;
                                ?>
                                        <option value="<?php echo $docu_cod; ?>"><?php echo $docu_nom; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="documento">DOCUMENTO</label>
                            <input type="text" class="form-control" id="documento" name="documento" placeholder="DOCUMENTO">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="telefono">TELEFONO</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="TELEFONO">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="correo">CORREO</label>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Enter Email">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="usuario">NOMBRE DE USUARIO</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="USUARIO">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="password">CONTRASEÑA</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="CONTRASEÑA">
                        </div>
                    </div>

                    <div class="col-6 mt-4 mb-4">
                        <div class="">
                            <label for="password">CONFIRMAR CONTRASEÑA</label>
                            <input type="password" class="form-control" id="password1" name="password1" placeholder="CONTRASEÑA">
                        </div>
                    </div>

                    <button type="button" class="btn btn-info float-right" onclick="User.addUser()">
                        <i class="nav-icon fas fa-save"></i> Agregar
                    </button>
                </form>
            </div>
        </div>

    <?php
    }

    function adminUsers($arreglo_users)
    {
    ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center " id="fon">
                    <div class="card-title titu">TUS TEJIDOS - ADMIN USUARIOS</div>
                </div>
                <div class="mt-3">
                    <div class="container">

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mt-2 mf">
                                    <i class="fas fa-filter"></i>&nbsp;FILTROS DE BUSQUEDA:
                                    <input type="hidden" value="admin" id="vista" name="vista">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <select class="form-control form-control-lg" id="filtro" name="filtro">
                                    <option> </option>
                                    <option value="nombre1_usuario">NOMBRE</option>
                                    <option value="apellido1_usuario ">APELLIDO</option>
                                    <option value="documento">DOCUMENTO</option>
                                    <option value="telefono ">TELEFONO</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <div class="offset-md-1 ">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg " id="busqueda" name="busqueda" placeholder="Buscar por Tu Eleccion">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-lg btn-warning" onclick="User.busquedaFiltro();">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="featurette-divider">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="#" role="button">
                            <i class="fas fa-arrow-circle-left fa-2x" style="cursor:pointer;" title="ATRAS" onclick="Menu.menu('UsersController/adminUsers')"></i>
                        </a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover table-head-bg-danger">
                            <thead>
                                <tr id="cen">
                                    <th scope="col">#&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">DOCUMENTO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">NOMBRE_COMPLETO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">TELEFONO</th>
                                    <th scope="col">CORREO</th>
                                    <th scope="col">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody id="cen">
                                <?php
                                if ($arreglo_users) {
                                    $i = 0;
                                    foreach ($arreglo_users as $user) {
                                        $i++;
                                        $user_doc = $user->documento;
                                        $user_nom1 = $user->nombre_completo;
                                        $user_tele = $user->telefono;
                                        $user_correo = $user->correo;
                                        if (($i % 2) === 0) {
                                ?>
                                            <tr>
                                                <td class="table-info"><?php echo $i; ?></td>
                                                <td class="table-info"><?php echo $user_doc; ?></td>
                                                <td class="table-info"><?php echo $user_nom1; ?></td>
                                                <td class="table-info"><?php echo $user_tele  ?></td>
                                                <td class="table-info"><?php echo $user_correo ?></td>
                                                <td class="colr">
                                                    <i class="fas fa-search-plus fa-2x az" style="cursor:pointer;" title="CONSULTAR USUARIO" onclick="User.showUserAdmin(<?php echo $user_doc; ?>)"></i> &nbsp;
                                                    <i class="nav-icon fas fa-edit fa-2x ve" style="cursor:pointer;" title="ACTUALIZAR USUARIO" onclick="User.showUpdateUser(<?php echo $user_doc; ?>)"></i>&nbsp;
                                                    <i class="fas fa-trash fa-2x ro" style="cursor:pointer;" title="ELIMINAR USUARIO" onclick="User.showDelateUser(<?php echo $user_doc; ?>)"></i>
                                                </td>
                                            </tr>
                                        <?php
                                        } else {
                                        ?>
                                            <tr>
                                                <td class="color"><?php echo $i; ?></td>
                                                <td class="color"><?php echo $user_doc; ?></td>
                                                <td class="color"><?php echo $user_nom1; ?></td>
                                                <td class="color"><?php echo $user_tele  ?></td>
                                                <td class="color"><?php echo $user_correo ?></td>
                                                <td class="colr">
                                                    <i class="fas fa-search-plus fa-2x az" style="cursor:pointer;" title="CONSULTAR USUARIO" onclick="User.showUserAdmin(<?php echo $user_doc; ?>)"></i> &nbsp;
                                                    <i class="nav-icon fas fa-edit fa-2x ve" style="cursor:pointer;" title="ACTUALIZAR USUARIO" onclick="User.showUpdateUser(<?php echo $user_doc; ?>)"></i>&nbsp;
                                                    <i class="fas fa-trash fa-2x ro" style="cursor:pointer;" title="ELIMINAR USUARIO" onclick="User.showDelateUser(<?php echo $user_doc; ?>)"></i>
                                                </td>
                                            </tr>
                                <?php
                                        }
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/Paginate.js"></script>

    <?php
    }

    function showUser($array, $user, $contra)
    {
    ?>
        <div class="card">
            <div class="card-body">

                <form action="" class="row row-demo-grid" id="formUser">

                    <div class="col-6">
                        <div>
                            <label for="exampleInputEmail1">PRIMER NOMBRE</label>
                            <input class="form-control jh" value="<?php echo $array[0]->nombre1_usuario; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="">
                            <label for="nombre2">SEGUNDO NOMBRE</label>
                            <input class="form-control jh" value="<?php echo $array[0]->nombre2_usuario; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="apellido1">PRIMER APELLIDO</label>
                            <input class="form-control jh" value="<?php echo $array[0]->apellido1_usuario; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="apellido2">SEGUNDO APELLIDO</label>
                            <input class="form-control jh" value="<?php echo $array[0]->apellido2_usuario; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="documento">SEXO</label>
                            <input class="form-control jh" value="<?php echo $array[0]->tipo_sexo; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="documento">TIPO DOCUMENTO</label>
                            <input class="form-control jh" value="<?php echo $array[0]->nombre_documento; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="documento">DOCUMENTO</label>
                            <input class="form-control jh" id="documento" value="<?php echo $array[0]->documento; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="telefono">TELEFONO</label>
                            <input class="form-control jh" value="<?php echo $array[0]->telefono; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="correo">CORREO</label>
                            <input class="form-control jh" value="<?php echo $array[0]->correo_usuario; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="usuario">NOMBRE DE USUARIO</label>
                            <input class="form-control jh" value="<?php echo $user ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="usuario">CONSTRASEÑA</label>
                            <input class="form-control jh" value="<?php echo $contra ?>" readOnly>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    function showUpdateUser($arreglo, $user, $lisDoc, $contra, $id)
    {
    ?>
        <div class="card">
            <div class="card-body">

                <form action="" class="row row-demo-grid" id="formUserr">

                    <div class="col-6">
                        <div>
                            <label for="exampleInputEmail1">PRIMER NOMBRE</label>
                            <input type="text" class="form-control jh" id="nombre1" value="<?php echo $arreglo[0]->nombre1_usuario; ?>" name="nombre1">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="">
                            <label for="nombre2">SEGUNDO NOMBRE</label>
                            <input type="text" class="form-control jh" id="nombre2" value="<?php echo $arreglo[0]->nombre2_usuario; ?>" name="nombre2">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="apellido1">PRIMER APELLIDO</label>
                            <input type="text" class="form-control jh" id="apellido1" value="<?php echo $arreglo[0]->apellido1_usuario; ?>" name="apellido1">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="apellido2">SEGUNDO APELLIDO</label>
                            <input type="text" class="form-control jh" id="apellido2" value="<?php echo $arreglo[0]->apellido2_usuario; ?>" name="apellido2">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECIONE SEXO</code></label>
                            <select class="custom-select rounded-3" id="sexo" name="sexo">
                                <option><?php echo $arreglo[0]->tipo_sexo ?></option>
                                <option value="M">MASCULINO</option>
                                <option value="F">FEMENINO</option>
                                <option value="I">INDEFINIDO</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECIONE TIPO DOCUMENTO</code></label>
                            <select class="custom-select rounded-3" id="tipo_documento" name="tipo_documento">
                                <option value="<?php echo $arreglo[0]->cod_documento ?>"><?php echo $arreglo[0]->nombre_documento ?></option>
                                <?php
                                if ($lisDoc) {
                                    foreach ($lisDoc as $docu) {
                                        if ($docu->cod_documento != $arreglo[0]->cod_documento) {
                                            $docu_cod = $docu->cod_documento;
                                            $docu_nom = $docu->nombre_documento;
                                ?>
                                            <option value="<?php echo $docu_cod; ?>"><?php echo $docu_nom; ?></option>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="documento">DOCUMENTO</label>
                            <input type="text" class="form-control jh" id="documento" value="<?php echo $arreglo[0]->documento; ?>" name="documento" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="telefono">TELEFONO</label>
                            <input type="text" class="form-control jh" id="telefono" value="<?php echo $arreglo[0]->telefono; ?>" name="telefono">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="correo">CORREO</label>
                            <input type="email" class="form-control jh" id="correo" value="<?php echo $arreglo[0]->correo_usuario; ?>" name="correo">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="usuario">NOMBRE DE USUARIO</label>
                            <input type="text" class="form-control jh" id="usuario" value="<?php echo $user ?>" name="usuario" readOnly>
                            <input type="hidden" id="cod_user" name="cod_user" value="<?php echo $id ?>" readOnly>
                        </div>
                    </div>
                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="usuario">CONTRASEÑA</label>
                            <input type="text" class="form-control jh" id="contrasena" value="<?php echo $contra ?>" name="contrasena">
                        </div>
                    </div>
                </form>
                <div class="modal-footer justify-content-center su">
                    <button type="button" class="btn btn-default bg-primary" data-dismiss="modal" onclick="User.updateUser();"><i class="fas fa-save fa-lg"></i>&nbsp; ACTUALIZAR</button>
                </div>
            </div>
        </div>
<?php
    }
}
?>