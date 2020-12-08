<?php
  require_once('./model/post.php');

  class PostController implements postDAO {
    private $pdo;

    public function __construct(PDO $driver){
      $this->pdo = $driver;
    }

    public function create($message) {
      $user_id = $_SESSION['kepeD#42'];
      $sql = $this->pdo->prepare("INSERT INTO post SET user_id = :user_id,  date_post = NOW(), message = :message");
      $sql->bindValue(':user_id', $user_id);
      $sql->bindValue(':message', $message);
      $sql->execute();
    }
  }