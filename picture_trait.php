<?php require_once("./utils/connexion.php"); ?>
<?php session_start(); ?>

<?php if (isset($_FILES['file'])) {
    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
}
?>