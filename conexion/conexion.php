﻿<?php 

/**
 * Clase conexión, declaración de variables.
 * @var String $host
 * @var String $usuario
 * @var String $contrasena
 * @var String $baseDatos
 * 
 * */
		class Conexion{
			var $host;
			var $usuario;
			var $contrasena;
			var $baseDatos;

			/**
			 * Función conexión permite conectarse a la base de datos.
			 * */
		
			function Conexion(){
				$this->host="localhost"; // apunta al servidor local
				$this->usuario="root"; //usuario que tengas definido
				$this->contrasena=""; //contraseña que tengas definidad
				$this->baseDatos="abase"; //base de datos.
			}
			
			/**
			 * Función conectarse permite decir si está conectado a la base de datos.
			 * @return $enlace contiene los datos de la conexión de la base de datos, retorna
			 * el valor de enlace.
			 * */
			function conectarse(){
				$enlace = mysqli_connect($this->host, $this->usuario, $this->contrasena, $this->baseDatos);
				if($enlace){
					//echo "Conexion exitosa";	//si la conexion fue exitosa nos muestra este mensaje como prueba.
				}else{
					die('Error de Conexión (' . mysqli_connect_errno() . ') '.mysqli_connect_error());
				}
				return($enlace);
				mysqli_close($enlace); //cierra la conexion a nuestra base de datos, un punto de seguridad importante.
			}
		}

?>
