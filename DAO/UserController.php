<?php
  require_once('./model/user.php');

  class UserController implements userDAO {
    private $pdo;

    public function __construct(PDO $driver){
      if (!isset($_SESSION['kepeD#42'])) session_start();

      $this->pdo = $driver;
    }

    public function login($email, $password){

      $sql = $this->pdo->prepare("SELECT * FROM user WHERE email = :email AND password = :password");
      $sql->bindValue(':email', $email);
      $sql->bindValue(':password', $password);
      $sql->execute();

      if ( $sql->rowCount() > 0 ) {
        $data = $sql->fetch();
        $_SESSION['kepeD#42'] = $data['id'];
        return true;
      } else {
        return false;
      }
    }

    public function create(User $u, $password) {
      $sql = $this->pdo->prepare("INSERT INTO user (name, email, password) VALUES (:name, :email, :password)");
      $sql->bindValue(':name', $u->getName());
      $sql->bindValue(':email', $u->getEmail());
      $sql->bindValue(':password', $password);
      $sql->execute();
      
      $id = $u->setId($this->pdo->lastInsertId());
      return $id;
    }

    public function findAll() {
      $sql = $this->pdo->prepare("SELECT * FROM user");
      $sql->execute();

      $array = [];
      $data = $sql->fetchAll();
      if ( $sql->rowCount() > 0 ) {
        foreach($data as $user) {
          $newUser = new User();
          $newUser->setId($user['id']);
          $newUser->setName($user['name']);
          $newUser->setEmail($user['email']);

          $array[] = $newUser;
        }
      }

      return $array;
    }
    
    public function findById($id) {
        
    }

    public function findByEmail($email) {
      $sql = $this->pdo->prepare("SELECT * FROM user WHERE email = :email");
      $sql->bindValue(':email', $email);
      $sql->execute();
      
      if($sql->rowCount() > 0) {
        $data = $sql->fetch();

        $user = new User();
        $user->setId($data['id']);
        $user->setName($data['name']);
        $user->setEmail($data['email']);

        return $user;
      } else {
        return false;
      }
    }

    public function logout() {
      unset($_SESSION['kepeD#42']);
      header("Location: login.php");
    }

    public function getUser($id){
      $sql = $this->pdo->prepare("SELECT * FROM user WHERE id = :id");
      $sql->bindValue(':id', $id);
      $sql->execute();
      
      if($sql->rowCount() > 0) {
        $data = $sql->fetch();

        $user = new User();
        $user->setId($data['id']);
        $user->setName($data['name']);
        $user->setEmail($data['email']);

        return $user;
      } else {
        header("Location: login.php");
      } 
    }

    public function getMyFollowers($id){
      $array = [$id];
      $sql = $this->pdo->prepare("SELECT following_id FROM relationship WHERE id = :id");
      $sql->bindValue(':id', $id);
      $sql->execute();

      if ( $sql->rowCount() > 0 ) {
        $data = $sql->fetchAll();
        foreach($data as $relationship) {
          $array[] = (int)$relationship['following_id'];
        }
      }

      return $array;
    }

    public function getFeed($list, $limit){
      $array = [];

      $sql = $this->pdo->prepare("SELECT *, (SELECT name FROM user WHERE user.id = post.user_id) as name FROM post WHERE user_id IN (".implode(',', $list).")ORDER BY date_post DESC LIMIT 20");
      $sql->bindValue(':meylist', (int)$list[0]);
      $sql->bindValue(':limit', $limit);
      $sql->execute();
      
      if ( $sql->rowCount() > 0 ) {
        $array = $sql->fetchAll();

      }
      return $array;
    }
  }