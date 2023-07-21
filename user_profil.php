<?php require_once("./utils/connexion.php"); ?>
<?php session_start();
$idUser = $_SESSION['user']['id_users'];
$pseudo = $_SESSION['user']['pseudos'];
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
                    <div class="align-items-start">
                        <a href="./instagram2.php">Accueil</a>
                    </div>
                    <?php
                    $request = $db->prepare('SELECT * FROM users WHERE id_users = :id_users');
                    $request->bindValue(':id_users', $idUser, PDO::PARAM_STR);
                    $request->execute();
                    $user = $request->fetch();
                    echo "Profil de : " . ' ' . $user['username'];
                    ?>
                </div>
                <div class="p-2 border">

                    <?php
                    $request = $db->prepare('SELECT * FROM avatars WHERE id_users = :id_users');
                    $request->bindValue(':id_users', $idUser, PDO::PARAM_STR);
                    $request->execute();
                    $avatar = $request->fetch();
                    echo "<img id='avatar' src='./upload_avatar/" . $avatar['avatars'] . "' width='30px' class='rounded-circle'>";
                    ?>


                    <?php
                    $request = $db->prepare('SELECT * FROM users WHERE pseudos = :pseudos');
                    $request->bindValue(':pseudos', $pseudo, PDO::PARAM_STR);
                    $request->execute();
                    $userpseudo = $request->fetch();
                    echo $userpseudo['pseudos'];
                    ?>


                </div>

                <div class="p-2 border">
                    <form action="./process/update_avatar.php" method="POST" enctype="multipart/form-data">
                        <label for="file">Update Avatar</label>
                        <input type="file" name="file">
                        <button type="submit">Submit</button>
                    </form>
                </div>

                <div class="row p-0 border">

                    <?php
                    $request = $db->prepare('SELECT * FROM pictures WHERE id_users = :id_users');
                    $request->bindValue(':id_users', $idUser, PDO::PARAM_STR);
                    $request->execute();
                    $pictures = $request->fetchAll();

                    foreach ($pictures as $picture) {
                        echo "<div class='col-4 p-0'>";
                        echo "<img src='./upload/" . $picture['pictures'] . "' width='300px' height='300px' class='gallery-image'>";
                        echo "</div>";
                    }
                    ?>



                </div>
            </div>
        </div>
    </div>

</body>

</html>