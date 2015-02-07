<?php 
	require("../modelo/modelo.php");
	$objFormulario = new Formulario();
	$mensajeExito="Registro Exitoso";
	$mensajeError="Error al Registrar: Datos Incompletos";

	//------------------------------------------ REGISTRAR--------------------------------------------------------------------------------	
	if(isset($_POST["nombre"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["telefono"]) && isset($_POST["email"])){
			$objFormulario->registrar($_POST["nombre"],$_POST["estado_id"],$_POST["apellidos"],$_POST["telefono"],$_POST["email"]);
			
		}	
	//-------------------------ELIMINAR USUARIO-------------------------	
	if(isset($_GET["eliminar"])){
		?>
			<script>
            	confirmar=confirm("¿Esta seguro de elimiar el registro?");
				if(confirmar){
					location.href="controlador.php?confirmacion=si&codigo_user=<?php echo $_GET["codigo"]; ?>";
				}else{
					location.href="../vista/modificarInformacion.php";
				}
           </script>
		<?php
	}
	if(isset($_GET["confirmacion"])){
		$objFormulario->eliminar($_GET["codigo_user"]);
	}	
?>