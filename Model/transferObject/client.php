<?php
  /**
   *
   */
  class Client
  {

    private $iduser;
    private $nombre;
    private $email;
    private $telefono;
    private $password;
    private $saldo;

    function __construct($iduser=null, $nombre=null, $email=null, $telefono=null, $password=null, $saldo=null)
    {
      $this->iduser=$iduser;
      $this->nombre=$nombre;
      $this->email=$email;
      $this->telefono=$telefono;
      $this->password=$password;
      $this->saldo=$saldo;
    }

    public function getIdUser()
    {
      return $this->iduser;
    }

    public function setIdUser($iduser)
    {
      $this->name=$iduser;
    }

    public function getNombre()
    {
      return $this->nombre;
    }
    public function setNombre($nombre)
    {
      $this->cedula=$nombre;
    }
    
    public function getEmail()
    {
      return $this->email;
    }
    public function setEmail($email)
    {
      $this->cellPhone=$email;
    }
    public function getTelefono()
    {
      return $this->telefono;
    }
    public function setTelefono($telefono)
    {
      $this->telefono=$telefono;
    }


    public function getPassword()
    {
      return $this->password;
    }
    public function setPassword($password)
    {
      $this->password=$password;
    }

    public function getSaldo()
    {
      return $this->saldo;
    }
    public function setSaldo($saldo)
    {
      $this->saldo=$saldo;
    }
  }

?>