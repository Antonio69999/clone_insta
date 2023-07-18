<?php session_start(); ?>
<?php require_once('../utils/connexion.php'); ?>


<?php

if (
    isset($_POST['username']) && !empty($_POST['username'])
    && isset($_POST['pseudos']) && !empty($_POST['pseudos'])
) {
    $user = $_POST['username'];
    $selectUserQuery = $db->prepare("SELECT * FROM users WHERE username = :username");
    $selectUserQuery->execute([':username' => $user]);
    $user = $selectUserQuery->fetch();
    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: ../index.php');
        // le nom d'utilisateur existe déjà
    } else {
        // le nom d'utilisateur n'existe pas
        $insertUserSql = "INSERT INTO users (username, pseudos) VALUES (:pseudos, :username)";
        $insertUserQuery = $db->prepare($insertUserSql);
        $insertUserQuery->execute([
            ':pseudos' => $_POST['pseudos'],
            ':username' => $_POST['username'],
        ]);
        $userId = $db->lastInsertId();
        $_SESSION['user']['pseudos'] = $_POST['pseudos'];
        $_SESSION['user']['username'] = $_POST['username'];
        $_SESSION['user']['id_user'] = $userId;
        var_dump($_SESSION);
        header('Location: ../index.php');
    }
}

?>