<?php 
		class Conexion{
			var $host;
			var $usuario;
			var $contrasena;
			var $baseDatos;
		
			function Conexion(){
				$this->host="localhost"; // apunta al servidor local
				$this->usuario="root"; //usuario que tengas definido
				$this->contrasena=""; //contraseña que tengas definidad
				$this->baseDatos="abase"; //base de datos.
			}
			
			function conectarse(){
				$enlace = mysqli_connect($this->host, $this->usuario, $this->contrasena, $this->baseDatos);
				if($enlace){
					//echo "Conexion exitosa";	//si la conexion fue exitosa nos muestra este mensaje como prueba, despues lo puedes poner comentarios de nuevo: //
				}else{
					die('Error de Conexión (' . mysqli_connect_errno() . ') '.mysqli_connect_error());
				}
				return($enlace);
				mysqli_close($enlace); //cierra la conexion a nuestra base de datos, un ounto de seguridad importante.
			}
		}

?>
