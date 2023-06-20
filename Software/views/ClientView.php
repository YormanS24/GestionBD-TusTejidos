<?php
class ClientView
{
    function addClient()
    {
?>
        <div class="card">
            <div class="card-header d-flex justify-content-center" id="fon">
                <div class="card-title titu">TUS TEJIDOS - REGISTRAR CLIENTE</div>
            </div>
            <div class="card-body">

                <form action="" class="row row-demo-grid" id="formClient">

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

                    <!--<div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECCIONE TIPO DOCUMENTO</code></label>
                            <select class="custom-select rounded-3" id="tipo_documento" name="tipo_documento">
                                <option value="">SELECCIONE...</option>
                                <?php
                                /*if ($array_typeDoc) {
                                    foreach ($array_typeDoc as $docu) {
                                        $docu_cod = $docu->cod_documento;
                                        $docu_nom = $docu->nombre_documento;
                                ?>
                                        <option value="<?php echo $docu_cod; ?>"><?php echo $docu_nom; ?></option>
                                <?php
                                    }
                                }*/
                                ?>
                            </select>
                        </div>
                    </div>-->

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="documento">DOCUMENTO</label>
                            <input type="text" class="form-control" id="documento" name="documento" placeholder="DOCUMENTO">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECCIONE SEXO</code></label>
                            <select class="custom-select rounded-3" id="sexo" name="sexo">
                                <option>SELECCIONE...</option>
                                <option value="M">MASCULINO</option>
                                <option value="F">FEMENINO</option>
                                <option value="I">INDEFINIDO</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="telefono">TELEFONO</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="TELEFONO CLIENTE">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="correo">CORREO PROVEEDOR</label>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="CORREO CLIENTE">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="direccion">DIRECCION</label>
                            <input type="text" class="form-control" id="direccion" name="dirreccion" placeholder="DIRECCION CLIENTE">
                        </div>
                    </div>


                    <!--<div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECCIONE PAIS DEL CLIENTE</code></label>
                            <select class="custom-select rounded-3" id="pais" name="pais">
                                <option>SELECCIONE...</option>
                                <?php
                                /*if ($arreglo_ciudad) {
                                    foreach ($arreglo_ciudad as $cuidad) {
                                        $cuidad_cod = $cuidad->cod_pais;
                                        $cuidad_nombre = $cuidad->nombre_pais;
                                ?>
                                        <option value="<?php echo $cuidad_cod; ?>" onclick="Provider.pais(<?php echo $cuidad_cod ?>);"><?php echo $cuidad_nombre; ?></option>
                                <?php
                                    }
                                }*/
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECCIONE DEPARTAMENTO CLIENTE</code></label>
                            <select class="custom-select rounded-3" id="depar" name="depar">
                                <option>SELECCIONE...</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECCIONE CIUDAD CLIENTE</code></label>
                            <select class="custom-select rounded-3" id="ciudad" name="ciudad">
                                <option>SELECCIONE...</option>
                            </select>
                        </div>
                    </div>-->

                    <div class="col-lg-12 mt-4">
                        <button type="button" class="btn btn-info float-right" onclick="client.addClient()">
                            <i class="nav-icon fas fa-save"></i> Registrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    function showListClient($arreglo_client)
    {
    ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center " id="fon">
                    <div class="card-title titu">TUS TEJIDOS - ADMIN CLIENTES</div>
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
                                    <option value="documento_cliente">DOCUMENTO CLIENTE</option>
                                    <option value="nombre1_cliente">NOMBRE_1 CLIENTE</option>
                                    <option value="nombre_ciudad">CIUDAD CLIENTE</option>
                                    <option value="telefono_cliente">TELEFONO CLIENTE</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <div class="offset-md-1 ">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg " id="busqueda" name="busqueda" placeholder="Buscar por tu eleccion">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-lg btn-warning" onclick="client.filtroBusqueda();">
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
                            <i class="fas fa-arrow-circle-left fa-2x" style="cursor:pointer;" title="ATRAS" onclick="Menu.menu('ClientController/showListClient')"></i>
                        </a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover table-head-bg-danger">
                            <thead>
                                <tr id="cen">
                                    <th scope="col">#&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">DOCUMENTO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">NOMBRE&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">APELLIDO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">TELEFONO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">ACCION&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody id="cen">
                                <?php
                                if ($arreglo_client) {
                                    $i = 0;
                                    foreach ($arreglo_client as $client) {
                                        $i++;
                                        $client_doc = $client->documento;
                                        $client_nombre = $client->nombre1;
                                        $client_apellido =  $client->apellido1;
                                        $client_telefono = $client->telefono;
                                        if (($i % 2) === 0) {
                                ?>
                                            <tr>
                                                <td class="table-info"><?php echo $i; ?></td>
                                                <td class="table-info"><?php echo $client_doc; ?></td>
                                                <td class="table-info"><?php echo $client_nombre; ?></td>
                                                <td class="table-info"><?php echo $client_apellido; ?></td>
                                                <td class="table-info"><?php echo $client_telefono; ?></td>
                                                <td class="colr">
                                                    <i class="fas fa-search-plus fa-2x az" style="cursor:pointer;" title="CONSULTAR CLIENTE" onclick='client.showClient(<?php print($client_doc) ?>)'></i> &nbsp;
                                                    <i class="nav-icon fas fa-edit fa-2x ve" style="cursor:pointer;" title="ACTUALIZAR CLIENTE" onclick="client.showUpdateClient(<?php print($client_doc) ?>)"></i>&nbsp;
                                                </td>
                                            </tr>
                                        <?php
                                        } else {
                                        ?>
                                            <tr>
                                                <td class="color"><?php echo $i; ?></td>
                                                <td class="color"><?php echo $client_doc; ?></td>
                                                <td class="color"><?php echo $client_nombre; ?></td>
                                                <td class="color"><?php echo $client_apellido; ?></td>
                                                <td class="color"><?php echo $client_telefono; ?></td>
                                                <td class="colr">
                                                    <i class="fas fa-search-plus fa-2x az" style="cursor:pointer;" title="CONSULTAR CLIENTE" onclick='client.showClient(<?php print($client_doc); ?>)'></i> &nbsp;
                                                    <i class="nav-icon fas fa-edit fa-2x ve" style="cursor:pointer;" title="ACTUALIZAR CLIENTE" onclick="client.showUpdateClient(<?php print($client_doc); ?>)"></i>&nbsp;
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

    function showCient($client)
    {
    ?>
        <div class="card">
            <div class="card-body">

                <form action="" class="row row-demo-grid" id="formProvider">

                    <div class="col-6">
                        <div class="">
                            <label for="documento">DOCUMENTO CLIENTE</label>
                            <input class="form-control jh" value="<?php echo $client->documento; ?>" readOnly>
                        </div>
                    </div>

                    <!--<div class="col-6">
                        <div class="">
                            <label for="tipoDoc">TIPO DOCUMENTO CLIENTE</label>
                            <input class="form-control jh" value="<?php //echo $client->nombre_documento; ?>" readOnly>
                        </div>
                    </div>-->

                    <div class="col-6">
                        <div class="">
                            <label for="nombre1">NOMBRE 1</label>
                            <input class="form-control jh" value="<?php echo $client->nombre1; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="nombre2">NOMBRE 2</label>
                            <input class="form-control jh" value="<?php echo $client->nombre2; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="apellido1">APELLIDO 1</label>
                            <input class="form-control jh" value="<?php echo $client->apellido1; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="apellido2">APELLIDO 2</label>
                            <input class="form-control jh" value="<?php echo $client->apellido2; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="sexo">SEXO</label>
                            <input class="form-control jh" value="<?php echo $client->sexo; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="telefono">TELEFONO</label>
                            <input class="form-control jh" value="<?php echo $client->telefono; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="correo">CORREO</label>
                            <input class="form-control jh" value="<?php echo $client->correo; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="direccion">DIRECCION</label>
                            <input class="form-control jh" value="<?php echo $client->direccion; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="pais">PAIS</label>
                            <input class="form-control jh" value="<?php echo "COLOMBIA"; ?>" readOnly>
                        </div>
                    </div>

                   <!-- <div class="col-6 mt-4">
                        <div class="">
                            <label for="departamento">DEPARTAMENTO</label>
                            <input class="form-control jh" value="<?php //echo $client->nombre_departamento; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="ciudad">CIUDAD</label>
                            <input class="form-control jh" value="<?php// echo $client->nombre_ciudad; ?>" readOnly>
                        </div>
                    </div>-->
                </form>
            </div>
        </div>
<?php
    }

    function showUpdateClient($client)
    {
        ?>
        <div class="card">
            <div class="card-body">

                <form action="" class="row row-demo-grid" id="formUpdateClient">

                    <div class="col-6">
                        <div class="">
                            <label for="documento">DOCUMENTO CLIENTE</label>
                            <input type="hidden" class="form-control jh" value="<?php echo $client->documento; ?>" id="docactu" name="docactu" readOnly>
                            <input class="form-control jh" value="<?php echo $client->documento; ?>" id="documento" name="documento" readOnly>
                        </div>
                    </div>

                    <!--<div class="col-6">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECCIONE TIPO DOCUMENTO</code></label>
                            <select class="custom-select rounded-3" id="tipo_documento" name="tipo_documento">
                                <option value="<?php// print($client->tipo_documento);?>"><?php// print($client->nombre_documento);?></option>
                                <?php
                                /*if ($array_typeDoc) {
                                    foreach ($array_typeDoc as $docu) {
                                        $docu_cod = $docu->cod_documento;
                                        $docu_nom = $docu->nombre_documento;
                                ?>
                                        <option value="<?php echo $docu_cod; ?>"><?php echo $docu_nom; ?></option>
                                <?php
                                    }
                                }*/
                                ?>
                            </select>
                        </div>
                    </div>-->

                    <div class="col-6">
                        <div class="">
                            <label for="nombre1">NOMBRE 1</label>
                            <input class="form-control jh" value="<?php echo $client->nombre1; ?>" id="nombre1" name="nombre1">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="nombre2">NOMBRE 2</label>
                            <input class="form-control jh" value="<?php echo $client->nombre2; ?>" id="nombre2" name="nombre2">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="apellido1">APELLIDO 1</label>
                            <input class="form-control jh" value="<?php echo $client->apellido1; ?>" id="apellido1" name="apellido1">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="apellido2">APELLIDO 2</label>
                            <input class="form-control jh" value="<?php echo $client->apellido2; ?>" id="apellido2" name="apellido2">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECCIONE SEXO</code></label>
                            <select class="custom-select rounded-3" id="sexo" name="sexo">
                                <option><?php print($client->sexo);?></option>
                                <option value="M">MASCULINO</option>
                                <option value="F">FEMENINO</option>
                                <option value="I">INDEFINIDO</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="telefono">TELEFONO</label>
                            <input class="form-control jh" value="<?php echo $client->telefono; ?>" id="telefono" name="telefono">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="correo">CORREO</label>
                            <input class="form-control jh" value="<?php echo $client->correo; ?>" id="correo" name="correo">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="direccion">DIRECCION</label>
                            <input class="form-control jh" value="<?php echo $client->direccion; ?>" id="direccion" name="direccion">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="direccion">PAIS</label>
                            <input class="form-control jh" value="COLOMBIA" id="pais" name="pais" readOnly>
                        </div>
                    </div>

                    <!--<div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECCIONE PAIS DEL CLIENTE</code></label>
                            <select class="custom-select rounded-3" id="pais" name="pais">
                                <option>COLOMBIA</option>
                                <?php
                               /* if ($arreglo_ciudad) {
                                    foreach ($arreglo_ciudad as $cuidad) {
                                        $cuidad_cod = $cuidad->cod_pais;
                                        $cuidad_nombre = $cuidad->nombre_pais;
                                ?>
                                        <option value="<?php echo $cuidad_cod; ?>" onclick="Provider.pais(<?php echo $cuidad_cod ?>);"><?php echo $cuidad_nombre; ?></option>
                                <?php
                                    }
                                }*/
                                ?>
                            </select>
                        </div>
                    </div>-->

                    <!--<div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECCIONE DEPARTAMENTO CLIENTE</code></label>
                            <select class="custom-select rounded-3" id="depar" name="depar">
                                <option value="<?php// print($client->cod_departamento);?>"><?php //print($client->nombre_departamento);?></option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECCIONE CIUDAD CLIENTE</code></label>
                            <select class="custom-select rounded-3" id="ciudad" name="ciudad">
                                <option value="<?php// print($client->cod_ciudad);?>"><?php// print($client->nombre_ciudad);?></option>
                            </select>
                        </div>
                    </div>-->
                </form>
                <div class="modal-footer justify-content-center su">
                    <button type="button" class="btn btn-default bg-primary" data-dismiss="modal" onclick="client.updateClient();"><i class="fas fa-save fa-lg"></i>&nbsp; ACTUALIZAR</button>
                </div>
            </div>
        </div>
        <?php
    }
}
?>