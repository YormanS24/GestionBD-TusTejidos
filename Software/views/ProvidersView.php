<?php

class ProvidersView
{
    function listProver($listProver)
    {
?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center" id="fon">
                    <div class="card-title titu">TUS TEJIDOS - PROVEEDORES</div>
                </div>


                <div class="mt-3">

                    <div class="container">

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mt-2 mf">
                                    <i class="fas fa-filter"></i>&nbsp;FILTRO DE BUSQUEDA:
                                    <input type="hidden" value="lista" id="vista" name="vista">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <select class="form-control form-control-lg" id="filtro" name="filtro">
                                    <option> </option>
                                    <option value="nit_proveedor">NIT PROVEEDOR</option>
                                    <option value="nombre_proveedor">NOMBRE PROVEEDOR</option>
                                    <option value="tipo_proveedor">TIPO PROVEEDOR</option>
                                    <option value="nombre_ciudad">CIUDAD</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <div class="offset-md-1 ">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg " id="busqueda" name="busqueda" placeholder="Buscar por Tu Eleccion">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-lg btn-warning" onclick="Provider.busquedaFiltro();">
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
                            <i class="fas fa-arrow-circle-left fa-2x" style="cursor:pointer;" title="ATRAS" onclick="Menu.menu('ProvidersController/listProver')"></i>
                        </a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover table-head-bg-danger">
                            <thead>
                                <tr id="cen">
                                    <th scope="col">#&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">NIT PROVEEDOR &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">NOMBRE PROVEEDOR &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">TIPO PROVEEDOR &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">DIREECION</th>
                                    <th scope="col">TELEFONO</th>
                                    <th scope="col">CORREO</th>
                                    <th scope="col">CIUDAD</th>
                                </tr>
                            </thead>
                            <tbody id="cen">
                                <?php
                                $i = 0;
                                foreach ($listProver as $prover) {
                                    $i++;
                                    $prover_nit = $prover->nit_proveedor;
                                    $prover_nombre = $prover->nombre_proveedor;
                                    $prover_tipo =  $prover->tipo_proveedor;
                                    $prover_direccion = $prover->direccion_proveedor;
                                    $prover_telefono = $prover->telefono_proveedor;
                                    $prover_correo = $prover->correo_proveedor;
                                    $prover_ciudad = $prover->nombre_ciudad;
                                    if (($i % 2) === 0) {
                                ?>
                                        <tr>
                                            <td class="table-info"><?php echo $i ?></td>
                                            <td class="table-info"><?php echo $prover_nit ?></td>
                                            <td class="table-info"><?php echo $prover_nombre ?></td>
                                            <td class="table-info"><?php echo $prover_tipo ?></td>
                                            <td class="table-info"><?php echo $prover_direccion ?></td>
                                            <td class="table-info"><?php echo $prover_telefono ?></td>
                                            <td class="table-info"><?php echo $prover_correo ?></td>
                                            <td class="table-info"><?php echo $prover_ciudad ?></td>
                                        </tr>
                                    <?php
                                    } else {
                                    ?>
                                        <tr>
                                            <td class="color"><?php echo $i ?></td>
                                            <td class="color"><?php echo $prover_nit ?></td>
                                            <td class="color"><?php echo $prover_nombre ?></td>
                                            <td class="color"><?php echo $prover_tipo ?></td>
                                            <td class="color"><?php echo $prover_direccion ?></td>
                                            <td class="color"><?php echo $prover_telefono ?></td>
                                            <td class="color"><?php echo $prover_correo ?></td>
                                            <td class="color"><?php echo $prover_ciudad ?></td>
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

    function showAddProver($arreglo_ciudad)
    {
    ?>
        <div class="card">
            <div class="card-header d-flex justify-content-center" id="fon">
                <div class="card-title titu">TUS TEJIDOS - CREAR PROVEEDOR</div>
            </div>
            <div class="card-body">

                <form action="" class="row row-demo-grid" id="formProvider">

                    <div class="col-6">
                        <div class="">
                            <label for="nit">NIT PROVEEDOR</label>
                            <input type="text" class="form-control" id="nit" name="nit" placeholder="NIT PROVEEDOR">
                        </div>
                    </div>

                    <div class="col-6">
                        <div>
                            <label for="nombre">NOMBRE COMPLETO</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="NOMBRE COMPLETO">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECCIONE TIPO PROVEEDOR</code></label>
                            <select class="custom-select rounded-3" id="tipo_prover" name="tipo_prover">
                                <option>SELECCIONE...</option>
                                <option value="DISTRIBUIDOR">DISTRIBUIDOR</option>
                                <option value="FABRICA">FABRICA</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="direccion">DIRECCION PROVEEDOR</label>
                            <input type="text" class="form-control" id="direccion" name="dirreccion" placeholder="DIRECCION PROVEEDOR">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="telefono">TELEFONO PROVEEDOR</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="TELEFONO PROVEEDOR">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="correo">CORREO PROVEEDOR</label>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="CORREO PROVEEDOR">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECCIONE PAIS PROVEEDOR</code></label>
                            <select class="custom-select rounded-3" id="pais" name="pais">
                                <option>SELECCIONE...</option>
                                <?php
                                if ($arreglo_ciudad) {
                                    foreach ($arreglo_ciudad as $cuidad) {
                                        $cuidad_cod = $cuidad->cod_pais;
                                        $cuidad_nombre = $cuidad->nombre_pais;
                                ?>
                                        <option value="<?php echo $cuidad_cod; ?>" onclick="Provider.pais(<?php echo $cuidad_cod ?>);"><?php echo $cuidad_nombre; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECCIONE DEPARTAMENTOS PROVEEDOR</code></label>
                            <select class="custom-select rounded-3" id="depar" name="depar">
                            <option>SELECCIONE...</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECCIONE CIUDAD PROVEEDOR</code></label>
                            <select class="custom-select rounded-3" id="ciudad" name="ciudad">
                            <option>SELECCIONE...</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-4">
                        <button type="button" class="btn btn-info float-right" onclick="Provider.addProviders()">
                            <i class="nav-icon fas fa-save"></i> Agregar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    function showListProver($arreglo_prover)
    {
    ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center " id="fon">
                    <div class="card-title titu">TUS TEJIDOS - ADMIN PROVEEDORES</div>
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
                                    <option value="nit_proveedor">NIT PROVEEDOR</option>
                                    <option value="nombre_proveedor">NOMBRE PROVEEDOR</option>
                                    <option value="tipo_proveedor">TIPO PROVEEDOR</option>
                                    <option value="nombre_ciudad">CIUDAD</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <div class="offset-md-1 ">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg " id="busqueda" name="busqueda" placeholder="Buscar por Tu Eleccion">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-lg btn-warning" onclick="Provider.busquedaFiltro();">
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
                            <i class="fas fa-arrow-circle-left fa-2x" style="cursor:pointer;" title="ATRAS" onclick="Menu.menu('ProvidersController/showListProver')"></i>
                        </a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover table-head-bg-danger">
                            <thead>
                                <tr id="cen">
                                    <th scope="col">#&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">NIT&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">NOMBRE COMPLETO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">TIPO PROVEEDOR&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">DIRECCION&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">TELEFONO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">CIUDAD&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">ACCIONES&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody id="cen">
                                <?php
                                if ($arreglo_prover) {
                                    $i = 0;
                                    $col = "";
                                    foreach ($arreglo_prover as $prover) {
                                        $i++;
                                        $prover_nitt = $prover->nit_proveedor;
                                        $prover_nombre = $prover->nombre_proveedor;
                                        $prover_tipo =  $prover->tipo_proveedor;
                                        $prover_direccion = $prover->direccion_proveedor;
                                        $prover_telefono = $prover->telefono_proveedor;
                                        $prover_ciudad = $prover->nombre_ciudad;
                                        if (($i % 2) === 0) {
                                ?>
                                            <tr>
                                                <td class="table-info"><?php echo $i; ?></td>
                                                <td class="table-info"><?php echo $prover_nitt; ?></td>
                                                <td class="table-info"><?php echo $prover_nombre; ?></td>
                                                <td class="table-info"><?php echo $prover_tipo; ?></td>
                                                <td class="table-info"><?php echo $prover_direccion; ?></td>
                                                <td class="table-info"><?php echo $prover_telefono; ?></td>
                                                <td class="table-info"><?php echo $prover_ciudad; ?></td>
                                                <td class="colr">
                                                    <i class="fas fa-search-plus fa-2x az" style="cursor:pointer;" title="CONSULTAR PROVEEDOR" onclick='Provider.showProvider(<?php print($prover_nitt) ?>)'></i> &nbsp;
                                                    <i class="nav-icon fas fa-edit fa-2x ve" style="cursor:pointer;" title="ACTUALIZAR PROVEEDOR" onclick="Provider.showUpdateProvider(<?php print($prover_nitt) ?>)"></i>&nbsp;
                                                </td>
                                            </tr>
                                        <?php
                                        } else {
                                        ?>
                                            <tr>
                                                <td class="color"><?php echo $i; ?></td>
                                                <td class="color"><?php echo $prover_nitt; ?></td>
                                                <td class="color"><?php echo $prover_nombre; ?></td>
                                                <td class="color"><?php echo $prover_tipo; ?></td>
                                                <td class="color"><?php echo $prover_direccion; ?></td>
                                                <td class="color"><?php echo $prover_telefono; ?></td>
                                                <td class="color"><?php echo $prover_ciudad; ?></td>
                                                <td class="colr">
                                                    <i class="fas fa-search-plus fa-2x az" style="cursor:pointer;" title="CONSULTAR PROVEEDOR" onclick='Provider.showProvider(<?php echo $prover_nitt; ?>)'></i> &nbsp;
                                                    <i class="nav-icon fas fa-edit fa-2x ve" style="cursor:pointer;" title="ACTUALIZAR PROVEEDOR" onclick="Provider.showUpdateProvider(<?php echo $prover_nitt; ?>)"></i>&nbsp;
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

    function showProvider($provider)
    {
    ?>
        <div class="card">
            <div class="card-body">

                <form action="" class="row row-demo-grid" id="formProvider">

                    <div class="col-6">
                        <div>
                            <label for="exampleInputEmail1">NIT PROVEEDOR</label>
                            <input class="form-control jh" value="<?php echo $provider[0]->nit_proveedor; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="">
                            <label for="nombre2">NOMBRE PROVEEDOR</label>
                            <input class="form-control jh" value="<?php echo $provider[0]->nombre_proveedor; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="apellido1">TIPO PROVEEDOR</label>
                            <input class="form-control jh" value="<?php echo $provider[0]->tipo_proveedor; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="apellido2">DIRECCION</label>
                            <input class="form-control jh" value="<?php echo $provider[0]->direccion_proveedor; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="documento">TELEFONO</label>
                            <input class="form-control jh" value="<?php echo $provider[0]->telefono_proveedor; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="documento">CORREO</label>
                            <input class="form-control jh" value="<?php echo $provider[0]->correo_proveedor; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="telefono">FECHA REGISTRO</label>
                            <input class="form-control jh" value="<?php echo $provider[0]->fecha_registro_proveedor; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="correo">CIUDAD</label>
                            <input class="form-control jh" value="<?php echo $provider[0]->nombre_ciudad; ?>" readOnly>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    function showUpdateProvider($provider, $arreglo_depar)
    {
    ?>
        <div class="card">
            <div class="card-body">

                <form action="" class="row row-demo-grid" id="formUpateProvider">

                    <div class="col-6">
                        <div>
                            <label for="exampleInputEmail1">NIT PROVEEDOR</label>
                            <input class="form-control jh" value="<?php echo $provider[0]->nit_proveedor; ?>" id="nit" name="nit" readOnly>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="">
                            <label for="nombre2">NOMBRE PROVEEDOR</label>
                            <input class="form-control jh" value="<?php echo $provider[0]->nombre_proveedor; ?>" id="nombre" name="nombre" placeholder="NOMBRE COMPLETO">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="apellido1">TIPO PROVEEDOR</label>
                            <select class="custom-select rounded-3" id="tipo_prover" name="tipo_prover">
                                <option><?php echo $provider[0]->tipo_proveedor; ?></option>
                                <option value="DISTRIBUIDOR">DISTRIBUIDOR</option>
                                <option value="FABRICA">FABRICA</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="apellido2">DIRECCION</label>
                            <input class="form-control jh" value="<?php echo $provider[0]->direccion_proveedor; ?>" id="direccion" name="dirreccion" placeholder="DIRECCION PROVEEDOR">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="documento">TELEFONO</label>
                            <input class="form-control jh" value="<?php echo $provider[0]->telefono_proveedor; ?>" id="telefono" name="telefono" placeholder="TELEFONO PROVEEDOR">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="documento">CORREO</label>
                            <input class="form-control jh" value="<?php echo $provider[0]->correo_proveedor; ?>" id="correo" name="correo" placeholder="CORREO PROVEEDOR">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="telefono">FECHA REGISTRO</label>
                            <input class="form-control jh" value="<?php echo $provider[0]->fecha_registro_proveedor; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="correo">DEPARTAMENTO</label>
                            <select class="custom-select rounded-3" id="depar" name="depar">
                                <option value="<?php echo $provider[0]->cod_departamento; ?>"><?php echo $provider[0]->nombre_departamento; ?></option>
                                <?php
                                if ($arreglo_depar) {
                                    foreach ($arreglo_depar as $depar) {
                                        $dep_cod = $depar->cod_departamento;
                                        $dep_nombre = $depar->nombre_departamento;
                                ?>
                                        <option value="<?php echo $dep_cod; ?>" onclick="Provider.ciudad(<?php print($dep_cod); ?>)"><?php echo $dep_nombre; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECIONE CIUDAD PROVEEDOR</code></label>
                            <select class="custom-select rounded-3" id="ciudad" name="ciudad">
                                <option value="<?php echo $provider[0]->cod_ciudad; ?>"><?php echo $provider[0]->nombre_ciudad; ?></option>
                            </select>
                        </div>
                    </div>

                </form>
                <div class="modal-footer justify-content-center su">
                    <button type="button" class="btn btn-default bg-primary" data-dismiss="modal" onclick="Provider.updateProvider();"><i class="fas fa-save fa-lg"></i>&nbsp; ACTUALIZAR</button>
                </div>
            </div>
        </div>
<?php
    }
}
?>