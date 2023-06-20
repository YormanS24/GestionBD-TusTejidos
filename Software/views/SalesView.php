<?php

class SalesView
{
    function showPrdoductSale($arreglo_product)
    {
?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center " id="fon">
                    <div class="card-title titu">TUS TEJIDOS - VENTAS</div>
                </div>
                <div class="mt-3">
                    <div class="container" id="val">
                        <div class="row">

                            <div class="col-lg-4">
                                <div class="mt-2 mf">
                                    &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-address-card"></i>&nbsp;DOCUMENTO CLIENTE:
                                </div>

                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control form-control-lg " id="doc" name="doc" placeholder="FACTURA CLIENTE">

                            </div>
                            <div class="col-lg-4">
                                <button class="btn btn-warning" onclick="sale.validarDocFact();">
                                    <span class="btn-label">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </span>
                                    GENERAR FACTURA
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                <hr class="featurette-divider">
                <div class="card-body">
                    <br>
                    <div class="table-responsive" id="lista">
                        <table id="multi-filter-select" class="display table table-striped table-hover table-head-bg-danger">
                            <thead>
                                <tr id="cen">
                                    <th scope="col">#&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">CODIGO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">NOMBRE&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">TIPO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">PESO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">PRECIO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">DESCRIPCION&nbsp;&nbsp;&nbsp;&nbsp;</th>
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
                                        $product_codigo = $product->_id;
                                        $product_nombre = $product->nombre_producto;
                                        $product_tipo =  $product->tipo_producto;
                                        $product_peso =  $product->peso_producto;
                                        $product_precio = $product->precio;
                                        $product_des = $product->descripcion;
                                        $product_estado = $product->estado;
                                        if (($i % 2) === 0) {
                                ?>
                                            <tr>
                                                <td class="table-info"><?php echo $i; ?></td>
                                                <td class="table-info"><?php echo $product_codigo; ?></td>
                                                <td class="table-info"><?php echo $product_nombre; ?></td>
                                                <td class="table-info"><?php echo $product_tipo; ?></td>
                                                <td class="table-info"><?php echo $product_peso; ?></td>
                                                <td class="table-info"><?php echo $product_precio; ?></td>
                                                <td class="table-info"><?php echo $product_des; ?></td>
                                                <td class="table-info"><?php echo $product_estado; ?></td>
                                                <td class="colr">
                                                    <input type="hidden" value="1" id="ordinal">
                                                    <i class="flaticon-cart fa-2x az" id="accion" style="cursor:pointer;" title="VENDER PRODUCTO" onclick=sale.addDetalle(<?php print("'" . $product_codigo . "'")?>,<?php print("'".$product_precio."'")?>,<?php print("'".$product_nombre."'")?>,<?php print("'".$product_tipo."'")?>)></i> &nbsp;
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
                                                <td class="color"><?php echo $product_peso; ?></td>
                                                <td class="color"><?php echo $product_precio; ?></td>
                                                <td class="color"><?php echo $product_des; ?></td>
                                                <td class="color"><?php echo $product_estado; ?></td>
                                                <td class="colr">
                                                    <i class="flaticon-cart fa-2x az" style="cursor:pointer;" title="VENDER PRODUCTO" onclick=sale.addDetalle(<?php print("'" . $product_codigo . "'")?>,<?php print("'".$product_precio."'")?>,<?php print("'".$product_nombre."'")?>,<?php print("'".$product_tipo."'")?>)></i> &nbsp;
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

    function showDetail($arreglo_detail, $suma)
    {
    ?>
        <div class="container">
            <label for="">TOTAL A PAGAR:</label>
            <input class="form-control jh" value="<?php echo $suma[0]->sum ?>" readOnly>
        </div>

        <div class="table-responsive mt-3">
            <table class="display table table-striped table-hover table-head-bg-warning">
                <thead>
                    <tr>
                        <th scope="col">ORDINAL&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th scope="col">FACTURA&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th scope="col">PRODUCTO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th scope="col">CANTIDAD&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th scope="col">SUBTOTAL&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th scope="col">ACCION&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    </tr>
                </thead>
                <tbody id="cen">
                    <?php
                    if ($arreglo_detail) {
                        $i = 0;
                        foreach ($arreglo_detail as $product) {
                            $i++;
                            $factura = $product->cod_factura;
                            $ordinal = $product->ordinal;
                            $cantidad =  $product->cant_detalle;
                            $subtotal =  $product->subtotal;
                            $producto = $product->cod_producto;
                    ?>
                            <tr>
                                <td><?php echo "00$ordinal"; ?></td>
                                <td><?php echo $factura; ?></td>
                                <td><?php echo $producto; ?></td>
                                <td><?php echo $cantidad; ?></td>
                                <td><?php echo $subtotal; ?></td>
                                <td class="colr">
                                    <input type="hidden" value="1" id="ordinal">
                                    <i class="fas fa-trash fa-2x ro" id="accion" style="cursor:pointer;" title="ELIMINAR DETALLE" onclick=sale.deleteDetail((<?php print("'" . "$ordinal" . "'") ?>),(<?php print($factura) ?>),(<?php print("'" . "$producto" . "'") ?>))></i> &nbsp;
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

    <?php
    }

    function generateFactura($detalle)
    {
    ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center " id="fon">
                    <div class="card-title titu">TUS TEJIDOS - FACTURA</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 jh">
                            <label for="">N° FACTURA</label>
                            <input class="form-control jh" value="<?php echo $detalle[0]->cod_factura; ?>" readOnly>
                        </div>
                        <div class="col-4 jh">
                            <label for="">FECHA FACTURA</label>
                            <input class="form-control jh" value="<?php echo $detalle[0]->fecha_factura; ?>" readOnly>
                        </div>
                        <div class="col-4 jh">
                            <label for="">VALOR TOTAL</label>
                            <input class="form-control jh" value="<?php echo $detalle[0]->total_factura; ?>" readOnly>
                        </div>
                        <div class="col-4 mt-4 jh">
                            <label for="">DOCUMENTO</label>
                            <input class="form-control jh" value="<?php echo $detalle[0]->documento_cliente; ?>" readOnly>
                        </div>
                        <div class="col-4 mt-4 jh">
                            <label for="">NOMBRE CLIENTE</label>
                            <input class="form-control jh" value="<?php echo $detalle[0]->nombre_cliente; ?>" readOnly>
                        </div>
                        <div class="col-4 mt-4 jh">
                            <label for="">ESTADO FACTURA</label>
                            <input class="form-control jh" value="<?php echo $detalle[0]->estado_factura; ?>" readOnly>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="text-primary">DETALLE FACTURA:</h3>
                    </div>
                    <table class="table table-bordered table-bordered-bd-warning mt-4">
                        <thead>
                            <tr>
                                <th scope="col">ORDINAL</th>
                                <th scope="col">FACTURA</th>
                                <th scope="col">COD PRODUCTO</th>
                                <th scope="col">PRODUCTO</th>
                                <th scope="col">CANTIDAD</th>
                                <th scope="col">SUBTOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($detalle as $detail) {
                                $ordinal = $detail->ordinal;
                                $factura = $detail->cod_factura;
                                $codPdouct = $detail->cod_producto;
                                $nomProduct = $detail->nombre_producto;
                                $cantidad = $detail->cant_detalle;
                                $subtotal = $detail->subtotal;
                            ?>
                                <tr>
                                    <td><?php print("00$ordinal") ?></td>
                                    <td><?php print($factura) ?></td>
                                    <td><?php print($codPdouct) ?></td>
                                    <td><?php print($nomProduct) ?></td>
                                    <td><?php print($cantidad) ?></td>
                                    <td><?php print($subtotal) ?></td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <?php
    }

    function listFactura($arrayFactura)
    {
    ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center " id="fon">
                    <div class="card-title titu">TUS TEJIDOS - CONSULTAR FACTURA</div>
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
                                    <option value="cod_factura">COD FACTURA</option>
                                    <option value="documento_cliente">DOCUMENTO CLIENTE</option>
                                    <option value="estado">ESTADO</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <div class="offset-md-1 ">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg " id="busqueda" name="busqueda" placeholder="Buscar por tu eleccion">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-lg btn-warning" onclick="sale.filtroBusqueda();">
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
                            <i class="fas fa-arrow-circle-left fa-2x" style="cursor:pointer;" title="ATRAS" onclick="Menu.menu('SalesController/listaFactura')"></i>
                        </a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover table-head-bg-danger">
                            <thead>
                                <tr id="cen">
                                    <th scope="col">#&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">COD FACTURA&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">FECHA FACTURA&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">TOTAL PAGO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">DOCUMENT. CLIENTE&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">ESTADO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">ACCION&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody id="cen">
                                <?php
                                if ($arrayFactura) {
                                    $i = 0;
                                    foreach ($arrayFactura as $factura) {
                                        $i++;
                                        $cod_factura = $factura->cod_factura;
                                        $fecha_factura = $factura->documento_cliente;
                                        $tota_factura =  $factura->total_factura;
                                        $document_factura = $factura->documento_cliente;
                                        $estado_factura = $factura->estado;
                                        if (($i % 2) === 0) {
                                ?>
                                            <tr>
                                                <td class="table-info"><?php echo $i; ?></td>
                                                <td class="table-info"><?php echo $cod_factura; ?></td>
                                                <td class="table-info"><?php echo $fecha_factura; ?></td>
                                                <td class="table-info"><?php echo $tota_factura; ?></td>
                                                <td class="table-info"><?php echo $document_factura; ?></td>
                                                <td class="table-info"><?php echo $estado_factura; ?></td>
                                                <td class="colr">
                                                    <i class="fas fa-search-plus fa-2x az" style="cursor:pointer;" title="CONSULTAR FACTURA" onclick='sale.showFactura(<?php print($cod_factura) ?>)'></i> &nbsp;
                                                </td>
                                            </tr>
                                        <?php
                                        } else {
                                        ?>
                                            <tr>
                                                <td class="color"><?php echo $i; ?></td>
                                                <td class="color"><?php echo $cod_factura; ?></td>
                                                <td class="color"><?php echo $fecha_factura; ?></td>
                                                <td class="color"><?php echo $tota_factura; ?></td>
                                                <td class="color"><?php echo $document_factura; ?></td>
                                                <td class="color"><?php echo $estado_factura; ?></td>
                                                <td class="colr">
                                                    <i class="fas fa-search-plus fa-2x az" style="cursor:pointer;" title="CONSULTAR FACTURA" onclick='sale.showFactura(<?php print($cod_factura); ?>)'></i> &nbsp;
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

    function showFactura($detalle)
    {
    ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 jh">
                            <label for="">N° FACTURA</label>
                            <input class="form-control jh" value="<?php echo $detalle[0]->cod_factura; ?>" readOnly>
                        </div>
                        <div class="col-4 jh">
                            <label for="">FECHA FACTURA</label>
                            <input class="form-control jh" value="<?php echo $detalle[0]->fecha_factura; ?>" readOnly>
                        </div>
                        <div class="col-4 jh">
                            <label for="">VALOR TOTAL</label>
                            <input class="form-control jh" value="<?php echo $detalle[0]->total_factura; ?>" readOnly>
                        </div>
                        <div class="col-4 mt-4 jh">
                            <label for="">DOCUMENTO</label>
                            <input class="form-control jh" value="<?php echo $detalle[0]->documento_cliente; ?>" readOnly>
                        </div>
                        <div class="col-4 mt-4 jh">
                            <label for="">NOMBRE CLIENTE</label>
                            <input class="form-control jh" value="<?php echo $detalle[0]->nombre_cliente; ?>" readOnly>
                        </div>
                        <div class="col-4 mt-4 jh">
                            <label for="">ESTADO FACTURA</label>
                            <input class="form-control jh" value="<?php echo $detalle[0]->estado_factura; ?>" readOnly>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="text-primary">DETALLE FACTURA:</h3>
                    </div>
                    <table class="table table-bordered table-bordered-bd-warning mt-4">
                        <thead>
                            <tr>
                                <th scope="col">ORDINAL</th>
                                <th scope="col">FACTURA</th>
                                <th scope="col">COD PRODUCTO</th>
                                <th scope="col">PRODUCTO</th>
                                <th scope="col">CANTIDAD</th>
                                <th scope="col">SUBTOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($detalle as $detail) {
                                $ordinal = $detail->ordinal;
                                $factura = $detail->cod_factura;
                                $codPdouct = $detail->cod_producto;
                                $nomProduct = $detail->nombre_producto;
                                $cantidad = $detail->cant_detalle;
                                $subtotal = $detail->subtotal;
                            ?>
                                <tr>
                                    <td><?php print("00$ordinal") ?></td>
                                    <td><?php print($factura) ?></td>
                                    <td><?php print($codPdouct) ?></td>
                                    <td><?php print($nomProduct) ?></td>
                                    <td><?php print($cantidad) ?></td>
                                    <td><?php print($subtotal) ?></td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php
    }
}
?>