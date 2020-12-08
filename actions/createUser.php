<?php
  require './config.php';
  require './DAO/UserController.php';

  $userController = new UserController($pdo);

  $name = filter_input(INPUT_POST, 'name');
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $password = filter_input(INPUT_POST, 'password');
  $confirm_password = filter_input(INPUT_POST, 'confirm_password');

  if($name && $email && $password && $confirm_password && ($password === $confirm_password)) {
    if( !$userController->findByEmail($email) ) {
      $newUser = new user();
      $newUser->setName($name);
      $newUser->setEmail($email);
      
      $_SESSION['kepeD#42'] = $userController->create($newUser, $password);

      header("Location: ./");
      exit;
    } else {
      header("Location: singIn.php");
      exit;
    }
  } else {
    header("Location: singIn.php");
    exit;
  }

