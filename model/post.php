<?php

class Post {
  private $id;

  public function __construct(){
    session_start();
  }

  public function getId() {
    return $this->id;
  }

  public function setId($value) {
    return $this->id = trim($value);
  }

}


interface postDAO {
  public function create($message);
  // public function findAll();
  // public function findById($id);
  // public function findByEmail($email);
  // public function logout();
  // public function getUser($id);
}