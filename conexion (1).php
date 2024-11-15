<?php
class mysql{
            //iniciamos variables
            //atributos para conectar la base de datos
            var $servidor; //servidor donde se encuentra la base de datos
            var $usuario; //nombre de usuario de la base de datos
            var $password; //password de la base de datos 
            var $bd; //nombre de la base de datos a la que quieres acceder
            //////////////////////////////////////////////////////////////////////////
            var $consulta; //aqu� se guarda las consultas que se realizan
            var $enlace; //aqu� se almacena la conexi�n con la bd, s� se ha producido
            var $resultado; //aqu� se guardan los datos que se generen de una consulta
             
            //constructor, donde se inicializan las variables
             
            function __construct() {
                  $this->servidor = "localhost";
                  $this->usuario = "root";
                  $this->password = "";
                  $this->bd = "canchaalmen3";
            }
             
            //conectamos con la base de datos
            function conectar() {
                  //se realiza la conexi�n a la base de datos
                  if($this->enlace=mysqli_connect($this->servidor,$this->usuario,$this->password,$this->bd)) {
                        
                              //S� es correcta muestra mensaje (s� quieres lo quitas, s�lo sirve para ver si funciona).
                         
                        
                  } else {
                        //Si falla la conexi�n con la base de datos se muestra el mensaje
                        echo "No se ha podido conectar a la bd";
                  }                 
            }
             
            //function consultas a la bd
            function consultar($query) {
                  //aqu� se realizan las consultas a la base de datos
                  $sql = $this->consulta=mysqli_query($this->enlace,$query);
                  return $sql;
            }
             
            //obtener resultados de la consulta
            function obtener_consulta() {
                  //aqu� se obtienen los datos de la consulta
                  $this->resultado=mysqli_fetch_array($this->consulta);
                  return $this->resultado;
            }
             
            //cerramos la conexi�n con la base de datos
            function desconectar() {
                  mysqli_close($this->enlace);
            }
 
      }

?>