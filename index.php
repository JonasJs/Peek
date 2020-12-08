<?php
  require_once 'template/head.php';

  require './DAO/PostController.php';
  
  if(isset($_POST["createPost"]) &&  isset($_POST['post_message']) &&!empty($_POST['post_message'])){ 
    
    $postController = new PostController($pdo);

    $postController->create($_POST['post_message']);
  };

  $followersList = $userController->getMyFollowers($_SESSION['kepeD#42']);
  $feed = $userController->getFeed($followersList, 10);

  function formateDate($date){
    date_default_timezone_set('America/Sao_Paulo');
    $start_date = new DateTime();

    $since_start = $start_date->diff(new DateTime($date));
  
    if($since_start->h > 0) {
      return $since_start->h." h";

    } else if($since_start->i > 0) {
      return $since_start->i." m";

    } else {
      return $since_start->s." s";
    }
  }

  function getImage($id) {
    return "https://avatars.dicebear.com/4.5/api/bottts/".$id.".svg";
  }
?>

<div class="home">
  <form class="logout" method="POST">
    <input type="submit" name="logout" value="Sair">
  </form>
  <div class="container">
    <form method="POST">
      <div class="row">
        <div class="safe">
          <img src=<?=getImage($user->getId())?>> 
        </div>
        <div class="input">
          <textarea placeholder="Compartilhe o que viu!" name="post_message" rows="4" cols="50"></textarea>
        </div>
      </div>
      <input type="submit" name="createPost" value="Compartilhar">
    </form>
  </div>

  <?php if(!empty($feed)) : ?>
    <div class="feed">
      <?php foreach($feed as $item): ?>
        <div class="post">
          <div class="row">
            <img src=<?=getImage($item['user_id'])?>> 
            <div class="user">
              <p><?=$item['name']?> </p>
              <span><?=formateDate($item['date_post'])?></span>
            </div>
          </div>
          <p class="message"><?=$item['message']?></p>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

<?php require_once 'template/footer.php'; ?>
