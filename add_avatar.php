<?php require_once("./utils/connexion.php");
session_start();
?>

<form action="./process/avatar_trait.php" method="POST" enctype="multipart/form-data">
    <label for="file">Change profil picture</label>
    <input type="file" name="file">
    <button type="submit">Submit</button>
</form>