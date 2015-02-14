<?php 
	require("../modelo/modelo.php");
	$objFormulario = new Formulario();
	$mensajeExito="Registro Exitoso";
	$mensajeError="Error al Registrar: Datos Incompletos";

	//---------------------------EDITAR------------------------------------------------------------------------------------------------	
	if(isset($_GET["nombre_editar"]) && isset($_GET["estado_id_editar"]) && isset($_GET["apellidos_editar"]) && isset($_GET["telefono_editar"]) && isset($_GET["email_editar"]) && isset($_GET["id_editar"])){

			$objFormulario->modificarUsuario($_GET["nombre_editar"],$_GET["estado_id_editar"],$_GET["apellidos_editar"],
				$_GET["telefono_editar"],$_GET["email_editar"],$_GET["id_editar"]);			
	}

	//------------------------------------------ REGISTRAR--------------------------------------------------------------------------------	
	if(isset($_POST["nombre"]) && isset($_POST["estado_id"]) && isset($_POST["apellidos"]) && isset($_POST["telefono"]) && isset($_POST["email"])){
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