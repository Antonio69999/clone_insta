<?php session_start(); ?>
<?php require_once('../utils/connexion.php'); ?>


<?php
var_dump($_POST);
var_dump($_FILES);

// if (isset($_POST['username']) && !empty($_POST['username'])) {
//     $user = $_POST['username'];
//     $selectUserQuery = $db->prepare("SELECT * FROM users WHERE username = :username");
//     $selectUserQuery->execute([':username' => $user]);
//     $user = $selectUserQuery->fetch();
//     if ($user) {
//         $_SESSION['users'] = $user;
//         header('Location: ../index.php');
//         // le nom d'utilisateur existe déjà
//     } else {
//         // le nom d'utilisateur n'existe pas
//         $insertUserSql = "INSERT INTO users (username, pseudos, avatars) VALUES (:pseudos, :username, :avatars)";
//         $insertUserQuery = $db->prepare($insertUserSql);
//         $insertUserQuery->execute([
//             ':pseudos' => $_POST['pseudos'],
//             ':username' => $_POST['username'],
//             ':avatars' => $_POST['avatars'],
//         ]);
//         $userId = $db->lastInsertId();
//         $_SESSION['users']['pseudos'] = $_POST['pseudos'];
//         $_SESSION['users']['username'] = $_POST['username'];
//         $_SESSION['users']['id_user'] = $userId;
//         var_dump($_SESSION);
//         header('Location: ../index.php');
//     }
// }

?>