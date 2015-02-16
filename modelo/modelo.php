
<?php

	/**
	 * Este archivo incluye la conexion a la base de datos.
	 *
	 * */
	require "../conexion/conexion.php";


	/**
	 * Clase que contiene las funciones modificarUsuario,eliminar,registrar,lista_estado
	 *  busca_estado, listar.
	 * permite conectarse a la base de datos
	 * Permite hacer consultas a la base de datos.
	 * 
	 * @package AppClientes
	 * @author Lidia Judith Poot Chi
	 * @author Lidia Judith Poot Chi <lid_judii@hotmail.com>
	 * 
	 * @var  string $conn
	 * @var string $conexion
	 * @var string $mensajeExito
	 * @var string $mensajeError;
	 * */

	class Formulario {
		/*variables de conexion */
		var $conn;
		var $conexion;
		var $mensajeExito;
		var $mensajeError;
		
		/**
		 * Función Formulario donde instancia la conexion.
		 * Se puede determinar si el registro fu exitoso o no.
		 */
		function Formulario(){
			$this->conexion= new  Conexion();				
			$this->conn=$this->conexion->conectarse();
			$this->mensajeExito="Registro Exitoso";
			$this->mensajeError="Error al Registrar";
		}

		//---------------------------------------------------------------------------------------------------------------------------		

		/**
		*Función registrar datos de la persona.
		*inserta los datos a la base de datos.
		* 
		* @param string $nombre contenido del nombre
		* @param  int $estado_id contenido del id del estado
		* @param String $apellidos contenido de los apellidos
		* @param int $telefono contenido del telefono
		* @param string $email contenido del email
		* 
		* */
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


		/**
		 * Funcion donde enlista los estados
		 * permite mostrar todos los estados desde la base de datos
		 * 
		 * @param $id_ciudad=-1 contenido del id de la columna estado que permite visualizar si existe.
		 * 
		 * 
		 * */
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
		}
		


		/**
		 * Funcion buscar_estado que muestra los nombres de los estados en la tabla.
		 * permite llamarlos desde la base de datos.
		 * 
		 * @param $id_ciudad contiene la id del estado que permite visualizar si existe.
		 * 
		 * */
		function buscar_estado($id_ciudad=-1) {
            $sql="select * from estados where id='$id_ciudad'";
			$rs=mysqli_query($this->conn, $sql);
			$row = mysqli_fetch_array($rs);
			if(count($row)>0){
				return $row['nombre'];
			} else {
				return "<i>lugar inexistente </i>";
			}
		}


		/**
		 * Funcion listar() que lista todos los datos de la tabla clientes de la base de datos
		 * a la tabla de la aplicación
		 * */

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

		/**
		 * Funcion modificarUsuario que  actualiza los datos en la base de datos.
		 * 
		 * @param string $nombre contenido del nombre para actualizar
		 * @param  int $estado_id contenido del id del  para actualizar
		 * @param String $apellidos contenido de los apellidos para actualizar
		 * @param int $telefono contenido del telefono para actualizar
		 * @param string $email contenido del email para actualizar
		 * 
		 * */
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


		/**
		 * Funcion eliminar, elmina los datos de la base de datos y mostrados en tabla.
		 * permite eliminarlos por el id del cada campo de la tabla estados.
		 * 
		 * @param $pk contiene la llave primaria de cada campo.
		 * 
		 * */
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


		/**
		 * Funcion buscar , busca el registro en la base de datos y muestra en tabla.
		 * 
		 * @param $dato contiene la información para que pueda ser buscado.
		 * 
		 * 
		 * */

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