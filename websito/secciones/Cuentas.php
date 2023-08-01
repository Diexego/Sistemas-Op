<?php include("../templates/cabecera.php"); ?>
<?php include("../secciones/Cuentas_ver.php"); ?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-5">
                    <form action="" method="post">
                        <h1>Ingreso de cuentas</h1>
                        <div class="card" style="background-color: #EEEDDE; color: #141E27;">
                            <div class="card-header" style="background-color: #DFD7BF; color: #141E27;">
                                Cuentas
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Rut</label>
                                    <input type="text" 
                                            class="form-control" 
                                            name="rut_cuenta" 
                                            id="rut_cuenta" 
                                            value="<?php echo $rut_cuenta; ?>" 
                                            aria-describedby="helpId" placeholder="Rut sin guión" style="background-color: #F2EAD3; color: #141E27;">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Cuenta</label>
                                    <input type="text" 
                                            class="form-control" 
                                            name="cuenta" 
                                            id="cuenta" 
                                            value="<?php echo $cuenta; ?>" 
                                            aria-describedby="helpId" placeholder="No Ingresar nada aquí" style="background-color: #F2EAD3; color: #141E27;">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Monto</label>
                                    <input type="text" 
                                            class="form-control" 
                                            name="monto_cuenta" 
                                            id="monto_cuenta" 
                                            value="<?php echo $monto_cuenta; ?>" 
                                            aria-describedby="helpId" placeholder="Monto" style="background-color: #F2EAD3; color: #141E27;">
                                </div>

                                <div class="btn-group" role="group" aria-label="Button group name">
                                    <button type="submit" name="accion" value="agregar" class="btn btn-primary" style="background-color: #DFD7BF; color: #141E27; border: 1px solid #203239">Agregar</button>
                                    <button type="submit" name="accion" value="editar" class="btn btn-primary" style="background-color: #DFD7BF; color: #141E27; border: 1px solid #203239">Editar</button>
                                    <button type="submit" name="accion" value="borrar" class="btn btn-danger" style="background-color: #3F2305; color: #F5F5F5; border: 1px solid #203239">Borrar</button>
                                </div>
                            </div>
                    </form>

                </div>


        


    </div>
    <div class="col-md-7">
        <table class="table responsive">
            <h1>Lista de cuentas</h1>
                <thead style="background-color: #DFD7BF; color: #141E27;">
                    <tr>
                        <th>Rut</th>
                        <th>Cuenta</th>
                        <th>Nombre</th>
                        <th>Dinero</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach($listaCuentas as $cuentap){?>
                    <tr style="background-color: #F2EAD3; color: #141E27;">
                        <td> <?php echo $cuentap["rut_cuenta"];?> </td>
                        <td> <?php echo $cuentap["cuenta"];?> </td>
                        <td> <?php echo $cuentap["nombre_cliente"];?> </td>
                        <td> <?php echo $cuentap["monto_cuenta"];?> </td>
                        <td> 
                            <form action="" method="post">
                                <input type="hidden" name="cuenta" id="cuenta" value="<?php echo $cuentap["cuenta"];?>"/>
                                <input type="hidden" name="rut_cuenta" id="rut_cuenta" value="<?php echo $cuentap["rut_cuenta"];?>"/>
                                <input type="hidden" name="monto_cuenta" id="monto_cuenta" value="<?php echo $cuentap["monto_cuenta"];?>"/>
                                <input type="submit" value="Seleccionar" name="accion" class="btn btn-info" style="background-color: #3F2305; color: #F5F5F5; border: 1px solid #203239">
                            </form>
                        </td>
                    </tr>
                <?php }?>


                </tbody>
            </table>
        </div>

    </div>
</div>




<?php include("../templates/pie.php"); ?>