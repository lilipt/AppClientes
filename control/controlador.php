<?php 
/**
 * @package AppClientes
 * @author Lidia Judith Poot Chi
 * @author Lidia Judith Poot Chi <lid_judii@hotmail.com>
 * 
 * Incluye el archivo modelo.php
 * */
	require("../modelo/modelo.php");
	$objFormulario = new Formulario();
	$mensajeExito="Registro Exitoso";
	$mensajeError="Error al Registrar: Datos Incompletos";

	//---------------------------EDITAR------------------------------------------------------------------------------------------------	

	/**
	 * Estructura de control if para editar
	 * comprueba si los valores nombre_editar, estado_id_editar,apellidos_editar,
	 * telefono_editar,email_editar, id_editar están definidos.
	 * Permite obtener los valores para ser modificado.
	 * */
	if(isset($_GET["nombre_editar"]) && isset($_GET["estado_id_editar"]) && isset($_GET["apellidos_editar"]) && isset($_GET["telefono_editar"]) && isset($_GET["email_editar"]) && isset($_GET["id_editar"])){

			$objFormulario->modificarUsuario($_GET["nombre_editar"],$_GET["estado_id_editar"],$_GET["apellidos_editar"],
				$_GET["telefono_editar"],$_GET["email_editar"],$_GET["id_editar"]);			
	}

	//------------------------------------------ REGISTRAR--------------------------------------------------------------------------------	

	/**
	 * Estructura de control if para registrar
	 * comprueba si los valores están definidos.
	 * Permite acceder con la variable $objFormulario a la función registrar() para poder hacer
	 * un registro en la BD
	 * 
	 */
	if(isset($_POST["nombre"]) && isset($_POST["estado_id"]) && isset($_POST["apellidos"]) && isset($_POST["telefono"]) && isset($_POST["email"])){
			$objFormulario->registrar($_POST["nombre"],$_POST["estado_id"],$_POST["apellidos"],$_POST["telefono"],$_POST["email"]);
			
		}	
	//-------------------------ELIMINAR USUARIO-------------------------	

		/**
		 * Estructura de control if para eliminar.
		 * Permite visualizar si se quiere eliminar el registro con mensaje de confirmación.
		 * */
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

	/**
	 * Si es verdadera la eliminación accede a la funcion eliminar, para quitar el registro.
	 * */
	if(isset($_GET["confirmacion"])){
		$objFormulario->eliminar($_GET["codigo_user"]);
	}	
?>