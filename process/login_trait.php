<?php require_once('../utils/connexion.php'); ?>
<?php var_dump($db) ?>
<?php session_start(); ?>


<?php

if (!empty($_POST['username'])
    && !empty($_POST['pseudos'])){
    $user = $_POST['username'];
    $selectUserQuery = $db->prepare("SELECT * FROM users WHERE username = :username");
    $selectUserQuery->execute([':username' => $user]);
    $user = $selectUserQuery->fetch();
    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: ../instagram.php');
        // le nom d'utilisateur existe déjà
    } else {
        // le nom d'utilisateur n'existe pas
        $insertUserSql = "INSERT INTO users (username, pseudos) VALUES (:username, :pseudos)";
        $insertUserQuery = $db->prepare($insertUserSql);
        $insertUserQuery->execute([
            ':username' => $_POST['username'],
            ':pseudos' => $_POST['pseudos'],
        ]);
        $userId = $db->lastInsertId();
        $_SESSION['user']['username'] = $_POST['username'];
        $_SESSION['user']['pseudos'] = $_POST['pseudos'];
        $_SESSION['user']['id_users'] = $userId;
        // var_dump($_SESSION);
        header('Location: ../instagram.php');
    }
}

?>