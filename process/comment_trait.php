<?php
require_once('../utils/connexion.php');
session_start();

if(isset($_POST)){
    if(!empty($_POST['comments'])
        && !empty($_POST['dates'])
        && !empty($_POST['id_pictures'])
        &&!empty($_POST['id_users'])){

            $comments = strip_tags($_POST['comments']);
            $dates = strip_tags($_POST['dates']);
            $id_pictures = strip_tags($_POST['id_pictures']);
            $id_users = strip_tags($_SESSION['user']['id_users']);

            $sql = "INSERT INTO `comments` (`comments`, `dates`, `id_pictures`, `id_users`) VALUES (:comments, :dates, :id_pictures, :id_users);";

            $query = $db->prepare($sql);

            $query->bindValue(':comments', $comments, PDO::PARAM_STR);
            $query->bindValue(':dates', $dates, PDO::PARAM_STR);
            $query->bindValue(':id_pictures', $id_pictures, PDO::PARAM_INT);
            $query->bindValue(':id_users', $id_users, PDO::PARAM_INT);


            $query->execute();
            header('Location: ../instagram2.php');
        }
}

?>