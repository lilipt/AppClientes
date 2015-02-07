<link href="../css/estilos_tabla.css" rel="stylesheet" type="text/css" />
<?php
	require "../conexion/conexion.php";
	class Formulario{
		var $conn;
		var $conexion;
		var $mensajeExito;
		var $mensajeError;
		function Formulario(){
			$this->conexion= new  Conexion();				
			$this->conn=$this->conexion->conectarse();
			$this->mensajeExito="Registro Exitoso";
			$this->mensajeError="Error al Registrar";
		}
		//---------------------------------------------------------------------------------------------------------------------------		
		function registrar($estado_id, $nombre, $apellidos, $telefono, $email){
			
			$queryRegistrar = "insert into clientes (nombre, estado_id, apellidos, telefono, email) 
			values ('".$nombre."', '".$estado_id."', '".$apellidos."', '".$telefono."', '".$email."')";
			$registrar = mysqli_query($this->conn, $queryRegistrar) or die(mysqli_error());			
			
			if($registrar){
				echo "<script>location.href='../vista/index.php?mensaje=". $this->mensajeExito."';</script>";				
			}else{
				echo "<script>location.href='../vista/index.php?mensaje=".$this->mensajeError."';</script>";
			}
		}		
		//---------------------------------------------------------------------------------------------------------------------------
		function listar(){
			$sql="select * from clientes";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "No hay Personas registrados";	
			}else{
			 echo "<table border='0' align='center' class='table_' >";
			 echo "<thead>
					<th>Nombre</th>
					<th>Estado</th>
					<th>Apellidos</th>
					<th>Telefono</th>
					<th>email</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</thead>";
			 while ($row = mysqli_fetch_array($rs)){	 								
			echo "<td align='center'>".$row["nombre"]."</td>";
			echo "<td align='center'>".$row["estado_id"]."</td>";	
			echo "<td align='center'>".$row["apellidos"]."</td>";
			echo "<td align='center'>".$row["telefono"]."</td>";			
			echo "<td align='center'>".$row["email"]."</td>";			
			
						
			echo '<td align="center">
			Editar</a></td>';
			echo "<td><a href='../control/controlador.php?eliminar=si&codigo=".$row["id"]."'>Eliminar</a></td></tr>";
			$i++; 
			}			
			}
			echo "</table>";
		}
		//---------------------------------------------------------------------------------------------------------------------------
		function eliminar($pk){
			$queryDelete = "delete from clientes where id = ".$pk;
			$delete =mysqli_query($this->conn, $queryDelete);
			if($delete){						
				echo "<script>
						alert('Eliminacion exitosa');
						location.href='../vista/modificarInformacion.php';
				</script>";				
			}else{
				echo "<script>
						alert('Error Al Eliminar');
						location.href='../vista/modificarInformacion.php';
				</script>";	
				}
		}
		
	}
?>