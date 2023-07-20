<?php require_once("../utils/connexion.php"); ?>
<?php session_start(); ?>

<?php
  session_destroy();
  header ('Location: ../login.php');
?>
