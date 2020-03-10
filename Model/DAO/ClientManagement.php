<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/Simulador-Bancario/model/interfaces/InterfaceClient.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/Simulador-Bancario/model/dataSource/Connection.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/Simulador-Bancario/model/transferObject/Client.php';
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

    

    
    
  }

?>