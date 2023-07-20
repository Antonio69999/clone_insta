<?php require_once("./utils/connexion.php"); ?>
<?php session_start(); 
$idUser = $_SESSION['user']['id_users'];
?>

<?php
$sql = 'SELECT * FROM users';
$query = $db->prepare($sql);
$query->execute();
$user = $query->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="d-flex flex-column mb-3 text-center">
                <div class="p-2 border">
                <?php
                    $request = $db->prepare('SELECT * FROM users WHERE id_users = :id_users');
                    $request->bindValue(':id_users', $idUser, PDO::PARAM_STR);
                    $request->execute();
                    $user = $request->fetch();
                    echo "Profil de : " . ' ' . $user['username'];
                    ?>
                </div>
                <div class="p-2 border">
                    Pseudo + avatar
                </div>
                <div class="p-2 border">
                    Photos
                </div>
            </div>
        </div>
    </div>

</body>

</html>