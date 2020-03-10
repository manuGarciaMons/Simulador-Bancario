<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/interfaces/InterfaceClient.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/dataSource/Connection.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/transferObject/Client.php';
  /**
   *
   */
  class ClientManagement implements InterfaceClient
  {
    public function insertClient($client, $password)
    {
      $dataBase = new ConnectionDB();
      $sql = 'INSERT INTO Clientes (cedula, Nombre, password, celular) VALUES (:cedula, :nombre, :password, :celular)';
      $result = $dataBase->executeInsert($sql, array(
        ':cedula' => $client -> getCedula(),
        ':nombre' => $client -> getName(),
        ':password' => $password,
        ':celular' => $client -> getCellPhone()
      ));
      $sql = 'INSERT INTO DireccionesCliente (idCiudad, direccion, cedulaCliente) VALUES (:idCiudad, :direccion, :cedulaCliente)';
      $result = $dataBase->executeInsert($sql, array(
        ':idCiudad' => $client -> getDirection()[1],
        ':direccion' => $client -> getDirection()[2],
        ':cedulaCliente' => $client -> getCedula()
      ));
      return $result;
    }

    

    public function getPasswordByNumberPhone($numberPhone)
    {
      $dataBase = new ConnectionDB();
      $sql = 'SELECT password FROM Clientes WHERE celular = :celular';
      $result = $dataBase -> executeQuery($sql, array(':celular'=>$numberPhone));
      $password = null;
      if($result != false){
          $password = $result[0]['password'];
      }
      return $password;
    }
    public function getClientByIdentification($identification='')
    {
      $dataBase = new ConnectionDB();
      $sql = 'SELECT * FROM Clientes WHERE cedula = :cedula';
      $result = $dataBase->executeQuery($sql, array(':cedula'=>$identification));
      $client = null;
      if($result != false){
        $client = new Client();
        $client -> setCedula($result[0]['cedula']);
        $client -> setName($result[0]['Nombre']);
        $client -> setCellPhone($result[0]['celular']);
        // $client -> setDirection();
      }
      return $client;
    }
    
  }

?>