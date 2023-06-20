<?php
class ProductEndView
{
    function showAddProductoEnd()
    {
?>
        <div class="card">
            <div class="card-header d-flex justify-content-center" id="fon">
                <div class="card-title titu">TUS TEJIDOS - REGISTRAR PRODUCTO TERMINADO</div>
            </div>
            <div class="card-body">

                <form action="" class="row row-demo-grid" id="formProductoEnd">

                    <div class="col-6">
                        <div>
                            <label for="nombre">NOMBRE PRODUCTO</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="NOMBRE PRODUCTO">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="">
                            <label for="descripcion">SELECCIONE TIPO PRODUCTO</label>
                            <select class="custom-select rounded-3" id="tipope" name="tipope">
                                <option>SELECCIONE...</option>
                                <option value="ROPA">ROPA</option>
                                <option value="ACCESORIO">ACCESORIO</option>
                                <option value="BOLSO">BOLSO</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="peso">PESO PRODUCTO (g)</label>
                            <input type="text" class="form-control" id="peso" name="peso" placeholder="PESO PRODUCTO">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="precio">PRECIO PRODUCTO</label>
                            <input type="text" class="form-control" id="precio" name="precio" placeholder="PRECIO PRODUCTO">
                        </div>
                    </div>


                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="descripcion">DESCRIPCION PRODUCTO</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="DESCRIPCION PRODUCTO">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="estado">SELECCIONE ESTADO PRODUCTO</label>
                            <select class="custom-select rounded-3" id="estado" name="estado">
                                <option>SELECCIONE...</option>
                                <option value="DISPONIBLE">DISPONIBLE</option>
                                <option value="APARTADO">APARTADO</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-4">
                        <button type="button" class="btn btn-info float-right" onclick="productEnd.addProductoEnd()">
                            <i class="nav-icon fas fa-save"></i> Registrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    function showListProductEnd($arreglo_product)
    {
    ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center " id="fon">
                    <div class="card-title titu">TUS TEJIDOS - PRODUCTOS TERMINADOS</div>
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
                                    <option value="cod_producto">CODIGO PRODUCTO</option>
                                    <option value="nombre_producto">NOMBRE PRODUCTO</option>
                                    <option value="tipo_producto">TIPO PRODUCTO</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <div class="offset-md-1 ">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg " id="busqueda" name="busqueda" placeholder="Buscar por Tu Eleccion">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-lg btn-warning" onclick="productEnd.busquedaFiltro();">
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
                            <i class="fas fa-arrow-circle-left fa-2x" style="cursor:pointer;" title="ATRAS" onclick="Menu.menu('productEndController/showListProductEnd')"></i>
                        </a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover table-head-bg-danger">
                            <thead>
                                <tr id="cen">
                                    <th scope="col">#&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">CODIGO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">NOMBRE&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">TIPO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">PRECIO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">ESTADO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">ACCION&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody id="cen">
                                <?php
                                if ($arreglo_product) {
                                    $i = 0;
                                    foreach ($arreglo_product as $product) {
                                        $i++;
                                        $product_codigo = $product->cod_producto;
                                        $product_nombre = $product->nombre_producto;
                                        $product_tipo =  $product->tipo_producto;
                                        $product_precio = $product->precio;
                                        $product_estado = $product->estado;
                                        if (($i % 2) === 0) {
                                ?>
                                            <tr>
                                                <td class="table-info"><?php echo $i; ?></td>
                                                <td class="table-info"><?php echo $product_codigo; ?></td>
                                                <td class="table-info"><?php echo $product_nombre; ?></td>
                                                <td class="table-info"><?php echo $product_tipo; ?></td>
                                                <td class="table-info"><?php echo $product_precio; ?></td>
                                                <td class="table-info"><?php echo $product_estado; ?></td>
                                                <td class="colr">
                                                    <i class="fas fa-search-plus fa-2x az" style="cursor:pointer;" title="CONSULTAR CLIENTE" onclick=productEnd.showProductoEnd(<?php print("'" . $product_codigo . "'") ?>)></i> &nbsp;
                                                    <i class="nav-icon fas fa-edit fa-2x ve" style="cursor:pointer;" title="ACTUALIZAR CLIENTE" onclick=productEnd.showUpdateProduct(<?php print("'" . $product_codigo . "'") ?>)></i>&nbsp;
                                                </td>
                                            </tr>
                                        <?php
                                        } else {
                                        ?>
                                            <tr>
                                                <td class="color"><?php echo $i; ?></td>
                                                <td class="color"><?php echo $product_codigo; ?></td>
                                                <td class="color"><?php echo $product_nombre; ?></td>
                                                <td class="color"><?php echo $product_tipo; ?></td>
                                                <td class="color"><?php echo $product_precio; ?></td>
                                                <td class="color"><?php echo $product_estado; ?></td>
                                                <td class="colr">
                                                    <i class="fas fa-search-plus fa-2x az" style="cursor:pointer;" title="CONSULTAR CLIENTE" onclick=productEnd.showProductoEnd(<?php print("'" . $product_codigo . "'"); ?>)></i> &nbsp;
                                                    <i class="nav-icon fas fa-edit fa-2x ve" style="cursor:pointer;" title="ACTUALIZAR CLIENTE" onclick=productEnd.showUpdateProduct(<?php print("'" . $product_codigo . "'"); ?>)></i>&nbsp;
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

    function showProductoEnd($product)
    {
    ?>
        <div class="card">
            <div class="card-body">

                <form action="" class="row row-demo-grid" id="">

                    <div class="col-6">
                        <div class="">
                            <label for="codigo">CODIGO</label>
                            <input class="form-control jh" value="<?php echo $product[0]->cod_producto; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="">
                            <label for="nombre">NOMBRE PRODUCTO</label>
                            <input class="form-control jh" value="<?php echo $product[0]->nombre_producto; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="tipo">TIPO PRODUCTO</label>
                            <input class="form-control jh" value="<?php echo $product[0]->tipo_producto; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="peso">PESO (g)</label>
                            <input class="form-control jh" value="<?php echo $product[0]->peso_producto; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="precio">PRECIO</label>
                            <input class="form-control jh" value="<?php echo $product[0]->precio; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="descripcion">DESCRIPCION</label>
                            <input class="form-control jh" value="<?php echo $product[0]->descripcion_producto; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="estado">ESTADO</label>
                            <input class="form-control jh" value="<?php echo $product[0]->estado; ?>" readOnly>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    function showUpdateProduct($product)
    {
    ?>
        <div class="card">
            <div class="card-body">

                <form action="" class="row row-demo-grid" id="updateProduct">

                    <div class="col-6">
                        <div class="">
                            <label for="codigo">CODIGO</label>
                            <input class="form-control jh" value="<?php echo $product[0]->cod_producto; ?>" id="codigo" name="codigo" readOnly>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="">
                            <label for="nombre">NOMBRE PRODUCTO</label>
                            <input class="form-control jh" value="<?php echo $product[0]->nombre_producto; ?>" id="nombre" name="nombre">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="tipo">TIPO PRODUCTO</label>
                            <select class="custom-select rounded-3" id="tipope" name="tipope">
                                <option value="<?php echo $product[0]->tipo_producto; ?>"><?php echo $product[0]->tipo_producto; ?></option>
                                <option value="ROPA">ROPA</option>
                                <option value="ACCESORIO">ACCESORIO</option>
                                <option value="BOLSO">BOLSO</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="peso">PESO (g)</label>
                            <input class="form-control jh" value="<?php echo $product[0]->peso_producto; ?>" id="peso" name="peso">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="precio">PRECIO</label>
                            <input class="form-control jh" value="<?php echo $product[0]->precio; ?>" id="precio" name="precio">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="descripcion">DESCRIPCION</label>
                            <input class="form-control jh" value="<?php echo $product[0]->descripcion_producto; ?>" id="descripcion" name="descripcion">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="estado">ESTADO</label>
                            <select class="custom-select rounded-3" id="estado" name="estado">
                                <option value="<?php echo $product[0]->estado; ?>"><?php echo $product[0]->estado; ?></option>
                                <option value="DISPONIBLE">DISPONIBLE</option>
                                <option value="APARTADO">APARTADO</option>
                            </select>
                        </div>
                    </div>
                </form>
                <div class="modal-footer justify-content-center su">
                    <button type="button" class="btn btn-default bg-primary" data-dismiss="modal" onclick="productEnd.updateProduct();"><i class="fas fa-save fa-lg"></i>&nbsp; ACTUALIZAR</button>
                </div>
            </div>
        </div>
<?php
    }
}
?>