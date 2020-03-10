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
      $sql = 'INSERT INTO user (iduser, nombre, email, telefono, password, saldo) VALUES (:iduser, :nombre, :email, :telefono, :password, :saldo)';
      $result = $dataBase->executeInsert($sql, array(
        ':iduser' => $client -> getIdUser(),
        ':nombre' => $client -> getNombre(),
        ':email' => $password,
        ':telefono' => $client -> getTelefono(),
        ':password' => $password,
        ':saldo' => $client -> getSaldo()
      ));
      return $result;
    }

    

    

    
    
  }

?>