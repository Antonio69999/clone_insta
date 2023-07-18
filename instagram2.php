<?php require_once("./utils/connexion.php"); ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Instagram</title>
</head>

<body>
    <header>
        <div class="d-flex justify-content-center">
            <img src="./SVGS/instagram.svg" alt="logo_instagram" width="85em">
            <img src="./assets/header_insta.png" alt="insta" width="350em">
        </div>
    </header>

    <div class="container text-center">
        <div class="row">
            <div class="col border">
                <div class="d-flex">
                    <img src="./SVGS/home.svg" alt="home_logo" width="60em">
                    <h2>Home</h2>
                </div>

                <div class="d-flex my-5">
                    <img src="./SVGS/search.svg" alt="search_logo" width="60em">
                    <h2>Search</h2>
                </div>

                <div class="d-flex">
                    <img src="./SVGS/message.svg" alt="message_logo" width="60em">
                    <h2>Messages</h2>
                </div>

            </div>

            <div class="col-6 border">
                <div class="container">
                    <div>
                        <form action="./process/picture_trait.php" method="POST" enctype="multipart/form-data">
                            <label for="file">Add picture</label>
                            <input type="file" name="file">
                            <button type="submit">Submit</button>
                        </form>
                    </div>

                    <div class="image-gallery">
                        <?php
                        $sql = 'SELECT * FROM `pictures`';
                        $query = $db->prepare($sql);
                        $query->execute();
                        $pictures = $query->fetchAll();

                        foreach ($pictures as $picture) {
                            echo "<img src='./upload/" . $picture['pictures'] . "' width='300px' class='gallery-image'>";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col border">
                <h2>Liste profil:</h2>
                <a href="./add_avatar.php">Add profile pictures</a>
                <?php
                $sql = 'SELECT * FROM `avatars` INNER JOIN `users` WHERE id_users = :id_users';
                $query = $db->prepare($sql);
                $query->execute();
                $avatars = $query->fetchAll();

                foreach ($avatars as $avatar) {
                    echo "<img id='avatar' src='./upload_avatar/" . $avatar['avatars'] . "' class='gallery-image'>";
                    echo "<br>";
                }
                ?>
            </div>
        </div>
        <script src="./script/main.js"></script>

            </body>