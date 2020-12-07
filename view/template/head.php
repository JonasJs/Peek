<?php
  ini_set('display_errors', 1);
  error_reporting(~0);

  require '../config.php';
  require '../DAO/UserController.php';


  $user = new User();
  if(!$user->isLogged()){
    header("Location: login.php");
  };

  $userController = new UserController($pdo);

  if(isset($_POST["logout"])){
    $userController->logout();
  };

  $id = $_SESSION['kepeD#42'];

  $user = $userController->getUser($id);
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Peek</title>
</head>
<body> 