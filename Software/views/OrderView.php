<?php
class OrderView
{
    function showAddOrder()
    {
?>
        <div class="card">
            <div class="card-header d-flex justify-content-center" id="fon">
                <div class="card-title titu">TUS TEJIDOS - REGISTRAR PEDIDO</div>
            </div>
            <div class="card-body">

                <form action="" class="row row-demo-grid" id="formOrder">

                    <div class="col-6">
                        <div>
                        <label for="descripcion">SELECCIONE TIPO DE PEDIDO</label>
                            <select class="custom-select rounded-3" id="tipope" name="tipope">
                                <option>SELECCIONE...</option>
                                <option value="ROPA">ROPA</option>
                                <option value="ACCESORIO">ACCESORIO</option>
                                <option value="BOLSO">BOLSO</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="">
                            <label for="descripcion">DESCRIPCION DEL PEDIDO</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="DESCRIPCION PEDIDO">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="precio">PRECIO PEDIDO</label>
                            <input type="text" class="form-control" id="precio" name="precio" placeholder="PRECIO DEL PEDIDO">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="abono">ABONO PEDIDO</label>
                            <input type="text" class="form-control" id="abono" name="abono" placeholder="ABONO DEL PEDIDO">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="documento">DOCUMENTO CLIENTE</label>
                            <input type="text" class="form-control" id="documento" name="documento" placeholder="DOCUMENTO CLIENTE">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="estado">ESTADO DEL PEDIDO</label>
                            <input type="text" class="form-control" id="estado" name="estado" value="FABRICACION" readOnly>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-4">
                        <button type="button" class="btn btn-info float-right" onclick="order.addOrder()">
                            <i class="nav-icon fas fa-save"></i> Registrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
<?php
    }

    function showListOrder($arr_order)
    {
        ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center" id="fon">
                    <div class="card-title titu">TUS TEJIDOS - ADMIN PEDIDOS </div>
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
                                    <option value="cod_pedido">CODIGO PEDIDO</option>
                                    <option value="estado">ESTADO PEDIDOS</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <div class="offset-md-1 ">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg " id="busqueda" name="busqueda" placeholder="Buscar por tu eleccion">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-lg btn-warning" onclick="order.filtroBusqueda();">
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
                            <i class="fas fa-arrow-circle-left fa-2x" style="cursor:pointer;" title="ATRAS" onclick="Menu.menu('OrderController/showListOrder')"></i>
                        </a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover table-head-bg-danger">
                            <thead>
                                <tr>
                                    <th scope="col">#&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">COD PEDIDO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">FECHA PEDIDO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">TIPO PEDIDO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">DOCUMENTO CLIENTE&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">ESTADO PEDIDO&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th scope="col">ACCION&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody id="cen">
                                <?php
                                $i = 0;
                                foreach ($arr_order as $order) {
                                    $i++;
                                    $order_cod = $order->cod_pedido;
                                    $order_fecha = $order->fecha_pedido;
                                    $order_tipo = $order->tipo_pedido;
                                    $order_doc = $order->documento_cliente;
                                    $order_estado = $order->estado;

                                    if (($i % 2) === 0) {
                                ?>
                                        <tr>
                                            <td class="table-info"><?php echo $i ?></td>
                                            <td class="table-info"><?php echo $order_cod  ?></td>
                                            <td class="table-info"><?php print($order_fecha); ?></td>
                                            <td class="table-info"><?php echo $order_tipo ?></td>
                                            <td class="table-info"><?php echo $order_doc ?></td>
                                            <td class="table-info"><?php echo $order_estado ?></td>
                                            <td class="colr">
                                                <i class="fas fa-search-plus fa-2x az" style="cursor:pointer;" title="CONSULTAR PEDIDO" onclick='order.showOrder(<?php print($order_cod);?>)'></i> &nbsp;
                                                <i class="nav-icon fas fa-edit fa-2x ve" style="cursor:pointer;" title="ACTUALIZAR PEDIDO" onclick=order.showUpdateOrder(<?php print($order_cod);?>)></i>&nbsp;
                                            </td>
                                        </tr>
                                    <?php
                                    } else {
                                    ?>
                                        <tr>
                                            <td class="color"><?php echo $i ?></td>
                                            <td class="color"><?php echo $order_cod  ?></td>
                                            <td class="color"><?php print($order_fecha)  ?></td>
                                            <td class="color"><?php echo $order_tipo ?></td>
                                            <td class="color"><?php echo $order_doc ?></td>
                                            <td class="color"><?php echo $order_estado ?></td>
                                            <td class="colr">
                                                <i class="fas fa-search-plus fa-2x az" style="cursor:pointer;" title="CONSULTAR PEDIDO" onclick='order.showOrder(<?php print($order_cod);?>)'></i> &nbsp;
                                                <i class="nav-icon fas fa-edit fa-2x ve" style="cursor:pointer;" title="ACTUALIZAR PEDIDO" onclick=order.showUpdateOrder(<?php print($order_cod);?>)></i>&nbsp;
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

    function showOrder($order)
    {
        ?>
        <div class="card">
            <div class="card-body">

                <form action="" class="row row-demo-grid" id="formProvider">

                    <div class="col-6">
                        <div class="">
                            <label for="codigo">CODIGO PEDIDO</label>
                            <input class="form-control jh" value="<?php echo $order[0]->cod_pedido; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="">
                            <label for="fecha">FECHA DE EMISION</label>
                            <input class="form-control jh" value="<?php echo $order[0]->fecha_pedido; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="tipo">TIPO DE PEDIDO</label>
                            <input class="form-control jh" value="<?php echo $order[0]->tipo_pedido; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="descripcion">DESCRIPCION DEL PEDIDO</label>
                            <input class="form-control jh" value="<?php echo $order[0]->descripcion_pedido; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="precio">PRECIO DEL PEDIDO</label>
                            <input class="form-control jh" value="<?php echo $order[0]->precio_pedido; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="abono">ABONO DEL PEDIDO</label>
                            <input class="form-control jh" value="<?php echo $order[0]->abono_pedido; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="documento">DOCUMENTO CLIENTE</label>
                            <input class="form-control jh" value="<?php echo $order[0]->documento_cliente; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="nombre">NOMBRE CLIENTE</label>
                            <input class="form-control jh" value="<?php echo $order[0]->nombre_cliente; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="estado">ESTADO PEDIDO</label>
                            <input class="form-control jh" value="<?php echo $order[0]->estado; ?>" readOnly>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <?php
    }

    function showUpdateOrder($order)
    {
        ?>
        <div class="card">
            <div class="card-body">

                <form action="" class="row row-demo-grid" id="formOrderUpadet">

                    <div class="col-6">
                        <div class="">
                            <label for="codigo">CODIGO PEDIDO</label>
                            <input class="form-control jh" value="<?php echo $order[0]->cod_pedido; ?>" id="codigo" name="codigo" readOnly>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="">
                            <label for="fecha">FECHA DE EMISION</label>
                            <input class="form-control jh" value="<?php echo $order[0]->fecha_pedido; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="tipo">TIPO DE PEDIDO</label>
                            <select class="custom-select rounded-3" id="tipo" name="tipo">
                                <option value="<?php echo $order[0]->tipo_pedido; ?>"><?php print($order[0]->tipo_pedido);?></option>
                                <option value="ROPA">ROPA</option>
                                <option value="ACCESORIO">ACCESORIO</option>
                                <option value="BOLSO">BOLSO</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="descripcion">DESCRIPCION DEL PEDIDO</label>
                            <input class="form-control jh" value="<?php echo $order[0]->descripcion_pedido; ?>" id="descripcion" name="descripcion">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="precio">PRECIO DEL PEDIDO</label>
                            <input class="form-control jh" value="<?php echo $order[0]->precio_pedido; ?>" id="precio" name="precio">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="abono">ABONO DEL PEDIDO</label>
                            <input class="form-control jh" value="<?php echo $order[0]->abono_pedido; ?>" id="abono" name="abono">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="documento">DOCUMENTO CLIENTE</label>
                            <input class="form-control jh" value="<?php echo $order[0]->documento_cliente; ?>" id="documento" name="documento">
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="nombre">NOMBRE CLIENTE</label>
                            <input class="form-control jh" value="<?php echo $order[0]->nombre_cliente; ?>" readOnly>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="">
                            <label for="estado">ESTADO PEDIDO</label>
                            <select class="custom-select rounded-3" id="estado" name="estado">
                                <option value="<?php echo $order[0]->estado; ?>"><?php print($order[0]->estado);?></option>
                                <option value="TERMINADO">TERMINADO</option>
                                <option value="CANCELADO">CANCELADO</option>
                            </select>
                        </div>
                    </div>

                </form>
                <div class="modal-footer justify-content-center su">
                    <button type="button" class="btn btn-default bg-primary" data-dismiss="modal" onclick="order.updateOrder();"><i class="fas fa-save fa-lg"></i>&nbsp; ACTUALIZAR</button>
                </div>
            </div>
        </div>
        <?php
    }
}
?>