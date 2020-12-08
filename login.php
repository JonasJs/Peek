<?php
  require_once 'template/headDisconnected.php';
  require_once './config.php';
  require_once './DAO/UserController.php';

  $erro;
 
	if(isset($_POST["send"])){
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');
    
    $userController = new UserController($pdo);
    if($userController->login($email, $password)){
      header("Location: /");
    } else {
      $erro = "Erro ao Efetuar login!";
    }
  }
  
?>
  <div class="login">
    <div class="row bg">
      <span>“</span>
      <p>The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software.</p>
    </div>
    <div class="row">
      <div class="content">
        <h1>Login</h1>
        <p>For the purpose of industry regulation, your<br/> details are required.</p>
        <form method="POST">
          <div class="item">
            <label>Email:</label>
            <input type="email" name="email"> 
          </div>
          <div class="item">
            <label>Senha:</label>
            <input type="password" name="password"> 
          </div>
          <?php if($erro) : ?>
              <p class="error"><?=$erro?></p>
          <?php endif; ?>
          <input class="button" name="send" type="submit" value="Entrar">
        </form>
        <div class="separator">ou</div>
        <a href="singIn.php" class="btnSignin">Criar Conta</a>
      </div>
    </div>
  </div>
<?php require_once 'template/footer.php'; ?>