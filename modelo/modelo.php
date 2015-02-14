<?php
	require "../conexion/conexion.php";
	class Formulario {
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
		function registrar($nombre,$estado_id, $apellidos, $telefono, $email){	
			$queryRegistrar = "insert into clientes (nombre, estado_id, apellidos, telefono, email) 
			values ( '".$nombre."', '".$estado_id."', '".$apellidos."', '".$telefono."', '".$email."')";
			$registrar = mysqli_query($this->conn, $queryRegistrar) or die(mysqli_error());	
				
			
			if($registrar){
				echo "<script>location.href='../vista/index.php?mensaje=". $this->mensajeExito."';</script>";				
			}else{
				echo "<script>location.href='../vista/index.php?mensaje=".$this->mensajeError."';</script>";
			}
		}


		//---------------------------------------------------------------------------------------------------------------------------
		function lista_estado($id_ciudad=-1) {
            $sql="select * from estados";
			$rs=mysqli_query($this->conn, $sql);
            echo "<option value='-1'>Seleccione un Estado</option>";
            while($row = mysqli_fetch_array($rs)) {

            	echo '<option value="'.$row["id"].'" ';
            	if($id_ciudad==$row['id']){
            		echo " selected=selected ";
            	}
            	echo '>'.$row["nombre"].'</option>';
            }
		}//---------------------------------------------------------------------------------------------------------------------------
		function buscar_estado($id_ciudad=-1) {
            $sql="select * from estados where id='$id_ciudad'";
			$rs=mysqli_query($this->conn, $sql);
			$row = mysqli_fetch_array($rs);
			if(count($row)>0){
				return $row['nombre'];
			} else {
				return "<i>lugar inexistente (<b>".($row['id']*1)."</b>)</i>";
			}
		}

		function listar(){
			$sql="select * from clientes";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "No hay Personas registrados ";	
			}else{
			 echo "<table border='0' align='center' class='table_' ><tr>";
			 echo "<thead>
					<th>Nombre</th>
					<th>Estado</th>
					<th>Apellidos</th>
					<th>Telefono</th>
					<th>email</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</thead><tr>";
			 while ($row = mysqli_fetch_array($rs)){	 								
				echo "<tr><td align='center'>".$row["nombre"]."</td>";
				echo "<td align='center'>".$this->buscar_estado($row["estado_id"])."</td>";	
				echo "<td align='center'>".$row["apellidos"]."</td>";
				echo "<td align='center'>".$row["telefono"]."</td>";			
				echo "<td align='center'>".$row["email"]."</td>";			
				
							
				echo '<td align="center">
				<a class="fancybox fancybox.iframe" href="../vista/fancyBoxModificar.php?id='.$row["id"].'&nombre='.$row["nombre"].'&estado_id='.$row["estado_id"].'&apellidos='.$row["apellidos"].'&telefono='.$row["telefono"].'&email='.$row["email"].'" >Editar</a></td>';
				echo "<td><a href='../control/controlador.php?eliminar=si&codigo=".$row["id"]."'>Eliminar</a></td></tr>";
				$i++; 
				}			
			}
			echo "</table>";
		}

		//----------------------------------------EDITAR-----------------------------------------------------------------------------------
		function modificarUsuario($nombre, $estado_id, $apellidos, $telefono, $email, $id){
			$queryUpdate = "update clientes set nombre = '".$nombre."', estado_id = '".$estado_id."', apellidos = '".$apellidos."', telefono = '".$telefono."', email = '".$email."' where id = ".$id;
			$update =mysqli_query($this->conn, $queryUpdate);
			if($update){
				echo "Actualizacion Exitosa";
			}else{
				echo "Error Al Actualizar";
				}

				


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



		function buscar($dato){
			$sql="select * 
			from clientes
			where nombre like '%".$dato."%' OR estado_id like '%".$dato."%' OR apellidos like '%".$dato."%' OR telefono like '%".$dato."%' OR email like '%".$dato."%'";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "La busqueda no obtuvo resultados.";	
			}else{
			echo "<table border='0' align='center' class='table_' ><thead>
					<th>Nombre</th>
					<th>Estado</th>
					<th>Apellidos</th>
					<th>Telefono</th>
					<th>Email</th>
					
					<th>Modificar</th>
					<th>Eliminar</th>
				</thead><tbody>";
			 while ($row = mysqli_fetch_array($rs)){	 								
			echo "<tr><td align='center'>".$row["nombre"]."</td>";
			echo "<td align='center'>".$row["estado_id"]."</td>";
			echo "<td align='center'>".$row["apellidos"]."</td>";
			echo "<td align='center'>".$row["telefono"]."</td>";
			echo "<td align='center'>".$row["email"]."</td>";
			
			echo '<td align="center">
			<a class="fancybox fancybox.iframe" href="../vista/fancyBoxModificar.php?id='.$row["id"].'&nombre='.$row["nombre"].'&estado_id='.$row["estado_id"].'&apellidos='.$row["apellidos"].'&telefono='.$row["telefono"].'&email='.$row["email"].'" >Editar</a></td>';
			echo "<td><a href='../control/controlador.php?eliminar=si&codigo=".$row["id"]."'>Eliminar</a></td></tr>";
			$i++; 
			}			
			}
			echo "</tbody></table>";
		}
	}
?>