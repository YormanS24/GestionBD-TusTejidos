<?php
class MaterialPriView
{
    function listMaterialPri($listProver)
    {
?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center" id="fon">
                    <div class="card-title titu">TUS TEJIDOS - MATERIA PRIMA</div>
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
                                    <option value="tipo_material">TIPO MATERIAL</option>
                                    <option value="peso_material">PESO MATERIAL</option>
                                    <option value="precio_material">PRECIO</option>
                                    <option value="nombre_proveedor">PROVEEDOR</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <div class="offset-md-1 ">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg " id="busqueda" name="busqueda" placeholder="Buscar por Tu Eleccion">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-lg btn-warning" onclick="Material.busquedaFiltro();">
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
                            <i class="fas fa-arrow-circle-left fa-2x" style="cursor:pointer;" title="ATRAS" onclick="Menu.menu('MaterialPriController/listMaterialPri')"></i>
                        </a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover table-head-bg-danger">
                            <thead>
                                <tr>
                                    <th scope="col">#&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">TIPO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">PROVEEDOR&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">MARCA&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">COLOR&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">PESO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">CANTIDAD&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">PRECIO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">DESCRIPCION&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($listProver as $material) {
                                    $i++;
                                    $material_tipo = $material->tipo_material;
                                    $material_pro = $material->nombre_proveedor;
                                    $material_marca = $material->nombre_marca;
                                    $material_color = $material->nombre_color;
                                    $material_peso = $material->peso_material;
                                    $material_can = $material->cantidad_material;
                                    $material_pre = $material->precio_material;
                                    $material_des = $material->descripcion_material;

                                    if (($i % 2) === 0) {
                                ?>
                                        <tr>
                                            <td class="table-info"><?php echo $i ?></td>
                                            <td class="table-info"><?php echo $material_tipo  ?></td>
                                            <td class="table-info"><?php echo $material_pro  ?></td>
                                            <td class="table-info"><?php echo $material_marca ?></td>
                                            <td class="table-info"><?php echo $material_color ?></td>
                                            <td class="table-info"><?php echo $material_peso ?></td>
                                            <td class="table-info"><?php echo $material_can ?></td>
                                            <td class="table-info"><?php echo $material_pre  ?></td>
                                            <td class="table-info"><?php echo $material_des ?></td>
                                        </tr>
                                    <?php
                                    } else {
                                    ?>
                                        <tr>
                                            <td class="color"><?php echo $i ?></td>
                                            <td class="color"><?php echo $material_tipo  ?></td>
                                            <td class="color"><?php echo $material_pro  ?></td>
                                            <td class="color"><?php echo $material_marca ?></td>
                                            <td class="color"><?php echo $material_color ?></td>
                                            <td class="color"><?php echo $material_peso ?></td>
                                            <td class="color"><?php echo $material_can ?></td>
                                            <td class="color"><?php echo $material_pre  ?></td>
                                            <td class="color"><?php echo $material_des ?></td>
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

    function showAddMaterial($arreglo_marca, $arreglo_color, $arreglo_proveedor)
    {
    ?>
        <div class="card">
            <div class="card-header d-flex justify-content-center" id="fon">
                <div class="card-title titu">TUS TEJIDOS - REGISTRAR MATRIA PRIMA</div>
            </div>
            <div class="card-body">

                <form action="" class="row row-demo-grid" id="formAddMaterial">

                    <div class="col-6">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECCIONE TIPO MATERIAL</code></label>
                            <select class="custom-select rounded-3" id="tipo_material" name="tipo_material">
                                <option>SELECCIONE...</option>
                                <option value="LANA">LANA</option>
                                <option value="HILO">HILO</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 ">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECCIONE MARCA MATERIAL</code></label>
                            <select class="custom-select rounded-3" id="marca" name="marca">
                                <option>SELECCIONE...</option>
                                <?php
                                if ($arreglo_marca) {
                                    foreach ($arreglo_marca as $marca) {
                                        $marca_cod = $marca->cod_marca;
                                        $marca_nombre = $marca->nombre_marca;
                                ?>
                                        <option value="<?php echo $marca_cod; ?>"><?php echo $marca_nombre; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECCIONE COLOR MATERIAL</code></label>
                            <select class="custom-select rounded-3" id="color" name="color">
                                <option>SELECCIONE...</option>
                                <?php
                                if ($arreglo_color) {
                                    foreach ($arreglo_color as $color) {
                                        $color_cod = $color->cod_color;
                                        $color_nombre = $color->nombre_color;
                                ?>
                                        <option value="<?php echo $color_cod; ?>"><?php echo $color_nombre; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="exampleSelectRounded0">SELECCIONE PROVEEDOR </code></label>
                            <select class="custom-select rounded-3" id="proveedor" name="proveedor">
                                <option>SELECCIONE...</option>
                                <?php
                                if ($arreglo_proveedor) {
                                    foreach ($arreglo_proveedor as $proveedor) {
                                        $proveedor_cod = $proveedor->nit_proveedor;
                                        $proveedor_nombre = $proveedor->nombre_proveedor;
                                ?>
                                        <option value="<?php echo $proveedor_cod; ?>"><?php echo $proveedor_nombre; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div>
                            <label for="lote">LOTE MATERIAL</label>
                            <input type="text" class="form-control" id="lote" name="lote" placeholder="LOTE MATERIAL">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="cantidad">CANTIDAD MATERIA PRIMA</label>
                            <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="CANTIDAD MATERIA PRIMA">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="peso">PESO MATERIA PRIMA</label>
                            <input type="text" class="form-control" id="peso" name="peso" placeholder="PESO MATERIA PRIMA">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="precio">PRECIO MATERIA PRIMA</label>
                            <input type="text" class="form-control" id="precio" name="precio" placeholder="PRECIO MATERIA PRIMA">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="descripsion">DESCRIPCION MATERIA PRIMA</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="DESCRIPCION MATERIA PRIMA">
                        </div>
                    </div>

                    <div class="col-lg-12 mt-4">
                        <button type="button" class="btn btn-info float-right" onclick="Material.addMaterial()">
                            <i class="nav-icon fas fa-save"></i> Agregar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    function showListMaterial($arreglo_materiPro)
    {
    ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center" id="fon">
                    <div class="card-title titu">TUS TEJIDOS - ADMIN MATERIA PRIMA </div>
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
                                    <option value="tipo_material">TIPO MATERIAL</option>
                                    <option value="peso_material">PESO MATERIAL</option>
                                    <option value="peso_material">PESO MATERIAL</option>
                                    <option value="nombre_proveedor">PROVEEDOR</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <div class="offset-md-1 ">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg " id="busqueda" name="busqueda" placeholder="Buscar por Tu Eleccion">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-lg btn-warning" onclick="Material.busquedaFiltro();">
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
                            <i class="fas fa-arrow-circle-left fa-2x" style="cursor:pointer;" title="ATRAS" onclick="Menu.menu('MaterialPriController/showListMaterial')"></i>
                        </a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover table-head-bg-danger">
                            <thead>
                                <tr>
                                    <th scope="col">#&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">PROVEEDOR&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">TIPO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">MARCA&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">COLOR&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">PESO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">CANTIDAD&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">PRECIO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">DESCRIPCION&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">ACCION&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody id="cen">
                                <?php
                                $i = 0;
                                foreach ($arreglo_materiPro as $material) {
                                    $i++;
                                    $material_codP = $material->nit_proveedor;
                                    $material_pro = $material->nombre_proveedor;
                                    $material_tipo = $material->tipo_material;
                                    $material_marcacod = $material->cod_marca;
                                    $material_marca = $material->nombre_marca;
                                    $material_marcacolor = $material->cod_color;
                                    $material_color = $material->nombre_color;
                                    $material_peso = $material->peso_material;
                                    $material_can = $material->cantidad_material;
                                    $material_pre = $material->precio_material;
                                    $material_des = $material->descripcion_material;

                                    if (($i % 2) === 0) {
                                ?>
                                        <tr>
                                            <td class="table-info"><?php echo $i ?></td>
                                            <td class="table-info"><?php echo $material_pro  ?></td>
                                            <td class="table-info"><?php print($material_tipo); ?></td>
                                            <td class="table-info"><?php echo $material_marca ?></td>
                                            <td class="table-info"><?php echo $material_color ?></td>
                                            <td class="table-info"><?php echo $material_peso ?></td>
                                            <td class="table-info"><?php echo $material_can ?></td>
                                            <td class="table-info"><?php echo $material_pre  ?></td>
                                            <td class="table-info"><?php echo $material_des ?></td>
                                            <td class="colr">
                                                <i class="fas fa-search-plus fa-2x az" style="cursor:pointer;" title="CONSULTAR MATERIA PRIMA" onclick=Material.showMaterial((<?php echo "'" . "$material_tipo" . "'" ?>),(<?php print($material_marcacod) ?>),(<?php print($material_marcacolor) ?>),(<?php print($material_peso) ?>),(<?php print($material_codP) ?>))></i> &nbsp;
                                                <i class="nav-icon fas fa-edit fa-2x ve" style="cursor:pointer;" title="ACTUALIZAR MATERIA PRIMA" onclick=Material.showUpdateMaterial((<?php echo "'" . "$material_tipo" . "'" ?>),(<?php print($material_marcacod) ?>),(<?php print($material_marcacolor) ?>),(<?php print($material_peso) ?>),(<?php print($material_codP) ?>))></i>&nbsp;
                                            </td>
                                        </tr>
                                    <?php
                                    } else {
                                    ?>
                                        <tr>
                                            <td class="color"><?php echo $i ?></td>
                                            <td class="color"><?php echo $material_pro  ?></td>
                                            <td class="color"><?php print($material_tipo)  ?></td>
                                            <td class="color"><?php echo $material_marca ?></td>
                                            <td class="color"><?php echo $material_color ?></td>
                                            <td class="color"><?php echo $material_peso ?></td>
                                            <td class="color"><?php echo $material_can ?></td>
                                            <td class="color"><?php echo $material_pre  ?></td>
                                            <td class="color"><?php echo $material_des ?></td>
                                            <td class="colr">
                                                <i class="fas fa-search-plus fa-2x az" style="cursor:pointer;" title="CONSULTAR MATERIA PRIMA" onclick=Material.showMaterial((<?php echo "'" . "$material_tipo" . "'" ?>),(<?php print($material_marcacod) ?>),(<?php print($material_marcacolor) ?>),(<?php print($material_peso) ?>),(<?php print($material_codP) ?>))></i> &nbsp;
                                                <i class="nav-icon fas fa-edit fa-2x ve" style="cursor:pointer;" title="ACTUALIZAR MATERIA PRIMA" onclick=Material.showUpdateMaterial((<?php echo "'" . "$material_tipo" . "'" ?>),(<?php print($material_marcacod) ?>),(<?php print($material_marcacolor) ?>),(<?php print($material_peso) ?>),(<?php print($material_codP) ?>))></i>&nbsp;
                                            </td>
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

    function showMaterial($material)
    {
    ?>
        <div class="card">
            <div class="card-body">

                <form action="" class="row row-demo-grid" id="formProvider">

                    <div class="col-6">
                        <div class="">
                            <label for="nombre">NOMBRE PROVEEDOR</label>
                            <input class="form-control jh" value="<?php echo $material[0]->nombre_proveedor; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 ">
                        <div class="">
                            <label for="telefono">TELEFONO PROVEEDOR</label>
                            <input class="form-control jh" value="<?php echo $material[0]->telefono_proveedor; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="tipo_proveedor">TIPO PROVEEDOR</label>
                            <input class="form-control jh" value="<?php echo $material[0]->tipo_proveedor; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="tipo_proveedor">CIUDAD PROVEEDOR</label>
                            <input class="form-control jh" value="<?php echo $material[0]->nombre_ciudad; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="correo">CORREO PROVEEDOR</label>
                            <input class="form-control jh" value="<?php echo $material[0]->correo_proveedor; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="tipo_mterial">TIPO MATERIAL</label>
                            <input class="form-control jh" value="<?php echo $material[0]->tipo_material; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="lote">LOTE</label>
                            <input class="form-control jh" value="<?php echo $material[0]->lote_material; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="ciudad">CATIDAD MATERIAL</label>
                            <input class="form-control jh" value="<?php echo $material[0]->cantidad_material; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="peso">PESO MATERIAL</label>
                            <input class="form-control jh" value="<?php echo $material[0]->peso_material; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="precio">PRECIO MATERIAL</label>
                            <input class="form-control jh" value="<?php echo $material[0]->precio_material; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="descripcion">DESCRIPCION MATERIAL</label>
                            <input class="form-control jh" value="<?php echo $material[0]->descripcion_material; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="fecha">FECHA REGISTRO</label>
                            <input class="form-control jh" value="<?php echo $material[0]->fecha_regristo; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="marca">MARCA MATERIAL</label>
                            <input class="form-control jh" value="<?php echo $material[0]->nombre_marca; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="color">COLOR MATERIAL</label>
                            <input class="form-control jh" value="<?php echo $material[0]->nombre_color; ?>" readOnly>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    function showUpdateMaterial($material, $arreglo_marca, $arreglo_color, $arreg_proveedor)
    {
    ?>
        <div class="card">
            <div class="card-body">

                <form action="" class="row row-demo-grid" id="formUpateMaterial">

                    <div class="col-6">
                        <div class="">
                            <label for="proveedor">PROVEEDOR</label>
                            <input type="hidden" value="<?php echo $material[0]->nit_proveedor; ?>" name="proveedor1" id="proveedor1">
                            <select class="custom-select rounded-3" id="proveedor" name="proveedor">
                                <option value="<?php echo $material[0]->nit_proveedor; ?>"><?php echo $material[0]->nombre_proveedor; ?></option>
                                <?php
                                if ($arreglo_marca) {
                                    foreach ($arreg_proveedor as $proveedor) {
                                        $proveedor_cod = $proveedor->nit_proveedor;
                                        $proveedor_nombre = $proveedor->nombre_proveedor;
                                ?>
                                        <option value="<?php echo $proveedor_cod; ?>"><?php echo $proveedor_nombre; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 ">
                        <div class="">
                            <label for="telefono">TELEFONO PROVEEDOR</label>
                            <input class="form-control jh" value="<?php echo $material[0]->telefono_proveedor; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="tipo_proveedor">TIPO PROVEEDOR</label>
                            <input class="form-control jh" value="<?php echo $material[0]->tipo_proveedor; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="tipo_proveedor">CIUDAD PROVEEDOR</label>
                            <input class="form-control jh" value="<?php echo $material[0]->nombre_ciudad; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="correo">CORREO PROVEEDOR</label>
                            <input class="form-control jh" value="<?php echo $material[0]->correo_proveedor; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="tipo_mterial">TIPO MATERIAL</label>
                            <input type="hidden" value="<?php echo $material[0]->tipo_material; ?>" name="tipo_material1" id="tipo_material1">
                            <select class="custom-select rounded-3" id="tipo_material" name="tipo_material">
                                <option><?php echo $material[0]->tipo_material; ?></option>
                                <option value="LANA">LANA</option>
                                <option value="HILO">HILO</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="lote">LOTE</label>
                            <input class="form-control jh" value="<?php echo $material[0]->lote_material; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="cantidad">CANTIDAD MATERIAL</label>
                            <input type="hidden" value="<?php echo $material[0]->cantidad_material; ?>" name="cantidad1" id="cantidad1">
                            <input class="form-control jh" id="cantidad" name="cantidad" value="<?php echo $material[0]->cantidad_material; ?>">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="marca">MARCA MATERIAL</label>
                            <input type="hidden" value="<?php echo $material[0]->cod_marca; ?>" name="marca1" id="marca1">
                            <select class="custom-select rounded-3" id="marca" name="marca">
                                <option value="<?php echo $material[0]->cod_marca; ?>"><?php echo $material[0]->nombre_marca; ?></option>
                                <?php
                                if ($arreglo_marca) {
                                    foreach ($arreglo_marca as $marca) {
                                        $marca_cod = $marca->cod_marca;
                                        $marca_nombre = $marca->nombre_marca;
                                ?>
                                        <option value="<?php echo $marca_cod; ?>"><?php echo $marca_nombre; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="color">COLOR MATERIAL</label>
                            <input type="hidden" value="<?php echo $material[0]->cod_color; ?>" name="color1" id="color1">
                            <select class="custom-select rounded-3" id="color" name="color">
                                <option value="<?php echo $material[0]->cod_color; ?>"><?php echo $material[0]->nombre_color; ?></option>
                                <?php
                                if ($arreglo_color) {
                                    foreach ($arreglo_color as $color) {
                                        $color_cod = $color->cod_color;
                                        $color_nombre = $color->nombre_color;
                                ?>
                                        <option value="<?php echo $color_cod; ?>"><?php echo $color_nombre; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="peso">PESO MATERIAL</label>
                            <input type="hidden" value="<?php echo $material[0]->peso_material; ?>" name="peso1" id="peso1">
                            <input class="form-control jh" id="peso" name="peso" value="<?php echo $material[0]->peso_material; ?>">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="precio">PRECIO MATERIAL</label>
                            <input class="form-control jh" id="precio" name="precio" value="<?php echo $material[0]->precio_material; ?>">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="descripcion">DESCRIPCION MATERIAL</label>
                            <input class="form-control jh" id="des" name="des" value="<?php echo $material[0]->descripcion_material; ?>">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="fecha">FECHA REGISTRO</label>
                            <input class="form-control jh" value="<?php echo $material[0]->fecha_regristo; ?>" readOnly>
                        </div>
                    </div>

                </form>
                <div class="modal-footer justify-content-center su">
                    <button type="button" class="btn btn-default bg-primary" data-dismiss="modal" onclick="Material.updateMaterial();"><i class="fas fa-save fa-lg"></i>&nbsp; ACTUALIZAR</button>
                </div>
            </div>
        </div>
    <?php
    }

    function reporteMateriaPrima($reporte)
    {
        //ob_start();
    ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center" id="fon">
                    <div class="card-title titu">TUS TEJIDOS - REPORTE MATERIA PRIMA </div>
                </div>
                <hr class="featurette-divider">
                <div class="card-body">
                    <br>
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover table-head-bg-danger">
                            <thead>
                                <tr>
                                    <th scope="col">#&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">PROVEEDOR&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">TIPO PROVEEDOR&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">TELEFONO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">DIRECCION&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">CIUDAD&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">TIPO MATERIA&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">MARCA&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">COLOR&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">CANTIDAD&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">PRECIO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">DESCRIPCION&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody id="cen">
                                <?php
                                $i = 0;
                                foreach ($reporte as $material) {
                                    $i++;
                                    $material_pro = $material->nombre_proveedor;
                                    $material_tipo_pro = $material->tipo_proveedor;
                                    $material_tel = $material->telefono_proveedor;
                                    $material_direc = $material->direccion_proveedor;
                                    $material_ciu = $material->nombre_ciudad;
                                    $material_tipo = $material->tipo_material;
                                    $material_marca = $material->nombre_marca;
                                    $material_color = $material->nombre_color;
                                    $material_can = $material->cantidad_material;
                                    $material_pre = $material->precio_material;
                                    $material_des = $material->descripcion_material;
                                    if (($i % 2) === 0) {
                                ?>
                                        <tr>
                                            <td class="table-info"><?php echo $i ?></td>
                                            <td class="table-info"><?php echo $material_pro  ?></td>
                                            <td class="table-info"><?php print($material_tipo_pro); ?></td>
                                            <td class="table-info"><?php echo $material_tel ?></td>
                                            <td class="table-info"><?php echo $material_direc ?></td>
                                            <td class="table-info"><?php echo $material_ciu ?></td>
                                            <td class="table-info"><?php echo $material_tipo ?></td>
                                            <td class="table-info"><?php echo $material_marca ?></td>
                                            <td class="table-info"><?php echo $material_color ?></td>
                                            <td class="table-info"><?php echo $material_can ?></td>
                                            <td class="table-info"><?php echo $material_pre  ?></td>
                                            <td class="table-info"><?php echo $material_des ?></td>
                                        </tr>
                                    <?php
                                    } else {
                                    ?>
                                        <tr>
                                            <td class="color"><?php echo $i ?></td>
                                            <td class="color"><?php echo $material_pro  ?></td>
                                            <td class="color"><?php print($material_tipo_pro); ?></td>
                                            <td class="color"><?php echo $material_tel ?></td>
                                            <td class="color"><?php echo $material_direc ?></td>
                                            <td class="color"><?php echo $material_ciu ?></td>
                                            <td class="color"><?php echo $material_tipo ?></td>
                                            <td class="color"><?php echo $material_marca ?></td>
                                            <td class="color"><?php echo $material_color ?></td>
                                            <td class="color"><?php echo $material_can ?></td>
                                            <td class="color"><?php echo $material_pre  ?></td>
                                            <td class="color"><?php echo $material_des ?></td>
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
        <script src="js/datatable.js"></script>
        <script type="text/javascript" src="datatables1/datatables/datatables.min.js"></script>
        <script type="text/javascript" src="datatables/main.js"></script>

        <script src="datatables1/datatables1/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
        <script src="datatables1/datatables1/JSZip-2.5.0/jszip.min.js"></script>
        <script src="datatables1/datatables1/pdfmake-0.1.36/pdfmake.min.js"></script>
        <script src="datatables1/datatables1/pdfmake-0.1.36/vfs_fonts.js"></script>
        <script src="datatables1/datatables1/Buttons-1.5.6/js/buttons.html5.min.js"></script>
<?php
        //$html = ob_get_clean();

    }
}
?>