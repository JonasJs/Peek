<?php
  require_once 'template/headDisconnected.php'; 
  require_once './DAO/UserController.php';

  $erro;

  if(isset($_POST["sendForm"])){
    
    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');
    $confirm_password = filter_input(INPUT_POST, 'confirm_password');
    
    if($name && $email && $password && $confirm_password) {
      if($password === $confirm_password) {
        
        $userController = new UserController($pdo);

        if(!$userController->findByEmail($email) ) {
          $newUser = new user();
          $newUser->setName($name);
          $newUser->setEmail($email);
          
          $_SESSION['kepeD#42'] = $userController->create($newUser, $password);
          
          header("Location: ./");
        } else {
          $erro = "Usuario já Cadastrado.";
        }
      } else {
        $erro = "As senhas não correspodem!";
      }
    } else {
      $erro = "Por Favor preencha todos os campos!";
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
        <h1>Cria Conta</h1>
        <p>For the purpose of industry regulation, your<br/> details are required.</p>
        <form method="POST">
          <div class="item">
            <label>Nome:</label>
            <input type="text" name="name"> 
          </div>
          <div class="item">
            <label>Email:</label>
            <input type="email" name="email"> 
          </div>
          <div class="item">
            <label>Senha:</label>
            <input type="password" name="password"> 
          </div>
          <div class="item">
            <label>Confirmar Senha:</label>
            <input type="password" name="confirm_password"> 
          </div>
          <?php if($erro) : ?>
              <p class="error"><?=$erro?></p>
          <?php endif; ?>
          <input class="button" name="sendForm" type="submit" value="Criar Conta">
        </form>
        <div class="separator">ou</div>
        <a href="login.php" class="btnSignin">Entrar</a>
      </div>
    </div>
  </div>

<?php require_once 'template/footer.php'; ?>