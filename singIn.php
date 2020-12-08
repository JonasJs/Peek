<?php
  require_once 'template/headDisconnected.php'; 
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
        <form method="POST" action="./actions/createUser.php">
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
          <input class="button" name="send" type="submit" value="Criar Conta">
        </form>
        <div class="separator">ou</div>
        <a href="login.php" class="btnSignin">Entrar</a>
      </div>
    </div>
  </div>

<?php require_once 'template/footer.php'; ?>