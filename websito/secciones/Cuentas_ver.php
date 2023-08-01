<?php 
include_once "../configuraciones/bd.php";
$conexionBD=BD::crearInstancia();

$rut_cuenta=isset($_POST["rut_cuenta"])?$_POST["rut_cuenta"]:"";
$cuenta=isset($_POST["cuenta"])?$_POST["cuenta"]:"";
$nombre_cliente=isset($_POST["nombre_cliente"])?$_POST["nombre_cliente"]:"";
$monto_cuenta=isset($_POST["monto_cuenta"])?$_POST["monto_cuenta"]:"";
$accion=isset($_POST["accion"])?$_POST["accion"]:"";


$consulta=$conexionBD->prepare("SELECT * FROM cuenta,cliente WHERE cuenta.rut_cuenta=cliente.rut_cliente");
$consulta->execute();
$listaCuentas=$consulta->fetchAll();






if($accion){
    switch($accion){
        case "agregar":
        $sql= "INSERT INTO cuenta(rut_cuenta,monto_cuenta) VALUES(:rut_cuenta,:monto_cuenta)";
        $consulta=$conexionBD->prepare($sql);
        $consulta->bindParam(':rut_cuenta',$rut_cuenta);
        $consulta->bindParam(':monto_cuenta',$monto_cuenta);
        $consulta->execute();
        break;

        case "editar":
        $sql= "UPDATE cuenta SET  monto_cuenta=:monto_cuenta WHERE cuenta=:cuenta";  
        $editando=$conexionBD->prepare($sql);
        $editando->bindParam(':cuenta',$cuenta);
        $editando->bindParam(':monto_cuenta',$monto_cuenta);
        $editando->execute();
        break;

        case "borrar":
        $sql= "DELETE FROM cuenta WHERE cuenta=:cuenta";
        $consulta=$conexionBD->prepare($sql);
        $consulta->bindParam(':cuenta',$cuenta);
        $consulta->execute();
        
        //si no hay cuentas asociadas a un rut, eliminar cliente
        $sqlCliente = "SELECT * FROM cuenta WHERE rut_cuenta=:rut_cuenta";
        $consultaCliente = $conexionBD->prepare($sqlCliente);
        $consultaCliente->bindParam(':rut_cuenta', $rut_cuenta);
        $consultaCliente->execute();
        $cliente=$consultaCliente->fetch(PDO::FETCH_ASSOC);
        if(!$cliente){
            $sqlBorrarCliente = "DELETE FROM cliente WHERE rut_cliente=:rut_cuenta";
            $consultaBorrarCliente = $conexionBD->prepare($sqlBorrarCliente);
            $consultaBorrarCliente->bindParam(':rut_cuenta', $rut_cuenta);
            $consultaBorrarCliente->execute();
        }
        break;
        
        case "Seleccionar":
        $sql= "SELECT * FROM cuenta WHERE cuenta=:cuenta";
        $consulta=$conexionBD->prepare($sql);
        $consulta->bindParam(':cuenta',$cuenta);
        $consulta->execute();
        $cuentas=$consulta->fetch(PDO::FETCH_ASSOC);
        break;
    }
  }
?>
