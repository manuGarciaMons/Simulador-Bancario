<?php
  /**
   *
   */
  class ConnectionDB
  {
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    function __construct()
    {
      $this->host     = 'localhost';
      $this->db       = 'simuladorbancario';
      $this->user     = 'root';
      $this->password = "12345";
      $this->charset  = 'utf8';
    }

    public function connect()
    {
      try{

          $connection = "mysql:host=". $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
          $options = [
              PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
              PDO::ATTR_EMULATE_PREPARES   => true,
          ];
          // $pdo = new PDO($connection, $this->user, $this->password, $options);
          $pdo = new PDO($connection, $this->user, $this->password);

          return $pdo;
      }catch(PDOException $e){
          print_r('Error connection: ' . $e->getMessage());
      }
    }
    public function executeQuery($sql='', $values=array())
    {
      if($sql != ''){
        $statement = $this->connect() -> prepare($sql);
        $statement -> execute($values);
        $result = $statement -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
      }else{
        return null;
      }
    }

    public function executeInsert($sql='', $values=array())
    {
      try {
        if($sql != ''){
          $statement = $this->connect() -> prepare($sql);
          $statement -> execute($values);
          $result = ($statement->rowCount() > 0);
          return $result;
        }
      } catch (PDOException $e) {
        print_r( $e -> getMessage());
      }
      
    }
    public function executeUpdate($sql='', $values=array())
    {
      if($sql != ''){
        $statement = $this->connect() -> prepare($sql);
        $statement -> execute($values);
        $result = $statement->rowCount();
        return $result;
      }else {
        return 0;
      }
    }
    public function executeDelete($sql='', $values=array())
    {
      if($sql != ''){
        $statement = $this->connect() -> prepare($sql);
        $statement -> execute($values);
        return true;
      }else {
        return false;
      }
    }
  }


?>