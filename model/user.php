<?php

class User {
  private $id;
  private $name;
  private $email;
  private $myFollowers;

  public function __construct(){
    if (!isset($_SESSION['kepeD#42'])) session_start();
  }

  public function getId() {
    return $this->id;
  }

  public function setId($value) {
    return $this->id = trim($value);
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($value) {
    return $this->email = strtolower(trim($value));
  }

  public function getName() {
    return $this->name;
  }

  public function setName($value) {
    return $this->name = ucwords(trim($value));
  }
  
  public function getMyFollowers(){
    return $this->myFollowers;
  }

  public function setMyFollowers($list){
    return $this->myFollowers = $list;
  }

  public function isLogged(){
    if(isset($_SESSION['kepeD#42']) && !empty($_SESSION['kepeD#42'])) {         
      return true;
    } else {
      return false;
    }
  }
}


interface userDAO {
  public function login($email, $password);
  public function create(User $u, $password);
  public function findAll();
  public function findById($id);
  public function findByEmail($email);
  public function logout();
  public function getUser($id);
  public function getMyFollowers($id);
  public function getFeed($list, $limit);
}