<?php 
  require_once "core/init.php"; 

    if(!isset($_SESSION['admin'])){
    header('Location: login.php');
  }

  $id = $_GET['id'];
  if(isset($_GET['id'])){
  	delete_user($id);
  	header('Location: index.php');
  }
?>