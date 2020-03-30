<?php

class DB
{


  static private $con;
  static private $error;
  static private $info;
  static private $estado;


  /**
   * @param array $datos con los datos de conexión
   * @return mysqli
   */
  static public function conectar()
  {

    $con=new mysqli(/*...*/);
    if ($con->connect_errno !== 0) {
      self::$estado.="Indicar error";
      self::$error=self::$estado;
    } else
      self::$estado="Conectado correctamente";
    $con->set_charset ("UTF8"); //Importante para ver bien los caracteres
    self::$con=$con;
  }

  /**
   * @return array un array con los nombres de las familias
   */
  static public function obtener_familias()
  {
    $sentencia="select cod, nombre from familia";
    if (!self::$con)
      self::conectar ();
    $familias=self::ejecuta_consulta ($sentencia);

    $familias->bind_result ($cod, $nombre);
    /*Extraer los valores necesarios y devolverlos*/
  }

  static public function actualiza_producto($producto)
  {
      $sentencia=<<<FIN
    update producto set  
       cod=?, nombre=?, nombre_corto=?, descripcion=?, PVP=?, familia=? 
    where cod = ?
FIN;

      if (!self::$con)
          self::conectar ();

      $parametros=[$producto['cod'], $producto['nombre'],
          $producto['nombre_corto'],
          $producto['descripcion'], $producto['PVP'],
          $producto['familia'], $producto['cod']];
      $rtdo=self::ejecuta_consulta ($sentencia, $parametros);
      /*Devolver información si se ha actualizado o no la fila*/
  }

  /**
   * @return array un array con los nombres de las familias
   */
  static public function obtener_productos($familia)
  {

    $sentencia="select cod, nombre_corto, PVP from producto where familia = ?";
    if (!self::$con)
      self::conectar ();
    $parametros[] =$familia;
    $familias=self::ejecuta_consulta ($sentencia, $parametros);
      /*Extraer los valores necesarios y devolverlos*/

  }

  /**
   * @return array un array con los nombres de las familias
   */
  static public function obtener_producto($cod)
  {
//    var_dump ($cod);

    $sentencia="select cod, nombre, nombre_corto, descripcion, PVP, familia from producto where cod = ?";
    if (!self::$con)
      self::conectar ();

    $parametros[] =$cod;

    $familias=self::ejecuta_consulta ($sentencia, $parametros);

      /*Extraer los valores necesarios y devolverlos*/
  }


  /**
   * @param $sentencia sentencia a ejecutar parametrizada
   * @param null $parametros array con tipos y variables que contienen los parámetros de la sentencia
   * @return mixed un mysqli_stmt con la sentencia ejecutada
   */
  static public function ejecuta_consulta($sentencia, $parametros=null){
      /*Impementa este método
      Mira los ejercicios
      Tiene que estar parametrizada

      */

  }

  /**
   * analiza los tipos de los valores de $parametros
   * Si el tipo es entero retorna una i para ese parámetro
   * Si no se considera string y que retorne una s
   * Al final retornará una cadena string formada por i' y s', una por parámetro
   */
  static private function get_tipos($parametros){
      /*Implementa según especificación */

  }



  static public function cerrar(){
    if (self::$con)
      self::$con->close();
  }

}


