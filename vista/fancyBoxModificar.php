<?php 
	require ("../modelo/modelo.php");
	$objModelo = new Formulario();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar</title>
<script type="text/javascript" src="../ajax/ajax.js"></script>
<script type="text/javascript">
	var nombre = "", apellido="", ciudad="", telefono="", descripcion="", imagen="", pais="", pk="", email="";	
	
	function modificarInformacion(){
		nombre =    document.getElementById("nombre_editar").value;
    estado_id = document.getElementById("estado_id_editar").value;
		apellidos = document.getElementById("apellidos_editar").value;
		telefono =  document.getElementById("telefono_editar").value;
		email =     document.getElementById("email_editar").value;
		id =        document.getElementById("id_editar").value;
		if(nombre!="" && estado_id!="" && apellidos!="" && telefono!="" && email!=""){
			ajax_("../control/controlador.php?nombre_editar="+nombre+"&estado_id_editar="+estado_id+"&apellidos_editar="+apellidos+"&telefono_editar="+telefono+"&email_editar="+email+"&id_editar="+id);
		}else{
			alert("Ingrese toda la informacion.");
		}		
	}
</script>
</head>

<body>
<form>
  <?php	
		if(isset($_GET["nombre"]) && isset($_GET["estado_id"]) && isset($_GET["apellidos"]) && isset($_GET["telefono"]) && isset($_GET["email"])){
			$id=$_GET["id"];
			$nombre=$_GET["nombre"];
			$estado_id=$_GET["estado_id"];
			$apellidos=$_GET["apellidos"];
			$telefono=$_GET["telefono"];
			$email=$_GET["email"];
					
			}
	?>
  <br />
  <br />
  <table width="200" border="0" align="center">
    <input type="hidden" name="id_editar" id="id_editar" value="<?php echo $id; ?>" />
    <tr>
      <td>Nombre</td>
      <td><input type="text" name="nombre_editar" id="nombre_editar" value="<?php echo $nombre; ?>" /></td>
    </tr>
    <tr>
      <td>Estado</td>
      <td><select name="estado_id_editar" id="estado_id_editar">
        <?php $objModelo->lista_estado($estado_id); ?>
      </td>
    </tr>
    <tr>
      <td>Apellidos</td>
      <td><input type="text" name="apellidos_editar" id="apellidos_editar"  value="<?php echo $apellidos; ?>" /></td>
    </tr>
    <tr>
      <td>Tel&eacute;fono</td>
      <td><input type="text" name="telefono_editar" id="telefono_editar" value="<?php echo $telefono; ?>" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="email" name="email_editar" id="email_editar" value="<?php echo $email; ?>" /></td>
    </tr>

    
    <tr>
      <td colspan="3" align="center"><input type="button" value="Modificar" onclick="modificarInformacion();" /></td>
    </tr>
  </table>
  <div id="resultado" align="center"></div>
</form>
<br />
<br />
<br />
</body>
</html>