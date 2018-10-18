<?php

  require_once('./View/view.php');
  $view = new View($_SERVER['REQUEST_URI']);
  $view -> createMenu(false);
  $view->renderView();
?>
<link rel="stylesheet" href="./animals/templates/style.css">
