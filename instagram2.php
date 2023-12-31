<?php require_once("./utils/connexion.php"); ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/like.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Instagram</title>
</head>

<body>
    <header>
        <div class="d-flex justify-content-center mb-1">
            <div class="d-flex justify-content-center me-3">
                <!-- <img src="./SVGS/instagram.svg" alt="logo_instagram" width="85em"> -->
            </div>
            <div class="d-flex justify-content-center">
                <img src="./assets/instagram.jpg" alt="insta" width="350em">
            </div>
        </div>
    </header>

    <div class="container text-center">
        <div class="row">
            <div class="col border">
                <div class="d-flex">
                    <div class="me-3">
                        <a href="./instagram2.php"><img src="./SVGS/home.svg" alt="home_logo" width="40em"></a>
                    </div>
                    <div class="pt-1">
                        <a href="./instagram2.php" class="homelink">
                            <h3>Accueil</h3>
                        </a>
                    </div>
                </div>

                <div class="d-flex my-5">
                    <div class="me-3">
                        <a href="./user_profil.php"><img src="./SVGS/person-profile-user-account-group-people-svgrepo-com.svg" alt="search_logo" width="40em"></a>
                    </div>
                    <div class="pt-1">
                        <h3><a href="./user_profil.php" class="profilelink">Mon profil</a></h3>
                    </div>
                </div>

                <div class="d-flex my-5">
                    <div class="me-2">
                        <img src="./SVGS/deconnexion.svg" alt="deconnexion_logo" width="40em">
                    </div>
                    <div class="pt-1">
                        <form action="./process/deconnexion.php">
                            <input type="submit" class="btn btn-danger" value="Déconnexion" />
                        </form>
                    </div>
                </div>

            </div>

            <div class="col-6 border">

                <div class="d-flex flex-column my-3 border">

                    <?php

                    // requete avatars
                    $sql = 'SELECT pictures.id_pictures, pictures.pictures, users.pseudos, avatars.avatars 
                    FROM `pictures`
                    JOIN users ON users.id_users = pictures.id_users
                    JOIN avatars ON avatars.id_users = pictures.id_users ORDER BY id_pictures DESC';
                    $query = $db->prepare($sql);
                    $query->execute();
                    $posts = $query->fetchAll();
                    ?>

                    <?php foreach ($posts as $post) { ?>
                        <!-- On insère les avatars et le pseudo dans la première div-->
                        <div class="p-2">
                            <?php
                            echo "<img id='avatar' src='./upload_avatar/" . $post['avatars'] . "' width='50px' height='50px' class='rounded-circle'>";
                            echo $post['pseudos'];
                            ?>
                        </div>

                        <!-- On insère la photo publiée -->
                        <div class="class=image-gallery p-2"> <?php
                                                                echo "<img src='./upload/" . $post['pictures'] . "' width='500px' class='gallery-image'>";
                                                                ?>
                        </div>

                        <!-- On insère les likes et commentaires -->
                        <div class="p-2 border">
                            <?php
                            echo "<svg
                            class='heart-icon'
                            width='50'
                            height='55'
                            viewBox='0 0 106 97'
                            fill='none'
                            xmlns='http://www.w3.org/2000/svg'
                          >
                    
                            <path
                              class='fill-color-shape'
                              fill-rule='evenodd'
                              clip-rule='evenodd'
                              d='M73.0406 3.04949C65.7359 2.94379 58.3559 5.38824 53.2483 12.3801C48.1271 5.39042 40.631 3.04941 33.4677 3.04941C18.2587 3.04941 3.04622 15.7081 3.04622 33.4698C3.04622 51.0995 14.3683 66.123 26.1679 76.6801C32.0812 81.9708 38.1493 86.1719 43.0557 89.0533C45.5086 90.4938 47.6791 91.6092 49.402 92.3672C50.2628 92.7459 51.0206 93.0393 51.6517 93.2395C52.2639 93.4336 52.8188 93.5607 53.2487 93.5607C53.6786 93.5607 54.2336 93.4336 54.8458 93.2395C55.4769 93.0393 56.2347 92.7459 57.0955 92.3672C58.8183 91.6092 60.9889 90.4938 63.4418 89.0533C68.3481 86.1719 74.4162 81.9708 80.3295 76.6801C92.1292 66.1229 103.451 51.0995 103.451 33.4698C103.451 15.6993 88.2313 3.26928 73.0406 3.04949Z'
                            />
                            <path
                              d='M53.2483 12.3801L51.2316 13.8577C51.7029 14.5009 52.4527 14.8807 53.25 14.8801C54.0474 14.8796 54.7966 14.4987 55.267 13.8548L53.2483 12.3801ZM73.0406 3.04949L73.0767 0.549748L73.0406 3.04949ZM26.1679 76.6801L24.501 78.5433L24.501 78.5433L26.1679 76.6801ZM43.0557 89.0533L44.3217 86.8975L44.3217 86.8975L43.0557 89.0533ZM49.402 92.3672L50.4088 90.0789L50.4088 90.0789L49.402 92.3672ZM51.6517 93.2395L52.4075 90.8565L52.4074 90.8565L51.6517 93.2395ZM54.8458 93.2395L54.09 90.8565L54.09 90.8565L54.8458 93.2395ZM57.0955 92.3672L58.1023 94.6555L58.1023 94.6555L57.0955 92.3672ZM63.4418 89.0533L62.1757 86.8975L62.1757 86.8975L63.4418 89.0533ZM80.3295 76.6801L81.9965 78.5433L81.9965 78.5433L80.3295 76.6801ZM55.267 13.8548C59.7836 7.67202 66.2981 5.45219 73.0044 5.54923L73.0767 0.549748C65.1736 0.435397 56.9283 3.10445 51.2295 10.9054L55.267 13.8548ZM33.4677 5.54941C40.0922 5.54941 46.7154 7.69369 51.2316 13.8577L55.2649 10.9026C49.5387 3.08715 41.1697 0.549414 33.4677 0.549414V5.54941ZM5.54622 33.4698C5.54622 17.2225 19.5018 5.54941 33.4677 5.54941V0.549414C17.0157 0.549414 0.546219 14.1936 0.546219 33.4698H5.54622ZM27.8349 74.817C16.2174 64.4228 5.54622 50.0268 5.54622 33.4698H0.546219C0.546219 52.1722 12.5192 67.8231 24.501 78.5433L27.8349 74.817ZM44.3217 86.8975C39.5433 84.0912 33.6121 79.9859 27.8349 74.817L24.501 78.5433C30.5503 83.9556 36.7554 88.2525 41.7897 91.209L44.3217 86.8975ZM50.4088 90.0789C48.7945 89.3686 46.7116 88.3011 44.3217 86.8975L41.7897 91.209C44.3055 92.6865 46.5638 93.8497 48.3951 94.6555L50.4088 90.0789ZM52.4074 90.8565C51.8878 90.6917 51.2173 90.4346 50.4088 90.0789L48.3951 94.6555C49.3082 95.0572 50.1534 95.387 50.8959 95.6225L52.4074 90.8565ZM53.2487 91.0607C53.2633 91.0607 53.1984 91.0609 53.0284 91.0254C52.867 90.9918 52.6608 90.9368 52.4075 90.8565L50.8959 95.6225C51.5581 95.8325 52.417 96.0607 53.2487 96.0607V91.0607ZM54.09 90.8565C53.8367 90.9368 53.6305 90.9918 53.4691 91.0254C53.299 91.0609 53.2341 91.0607 53.2487 91.0607V96.0607C54.0805 96.0607 54.9393 95.8325 55.6016 95.6225L54.09 90.8565ZM56.0887 90.0789C55.2801 90.4346 54.6096 90.6917 54.09 90.8565L55.6016 95.6225C56.3441 95.387 57.1893 95.0572 58.1023 94.6555L56.0887 90.0789ZM62.1757 86.8975C59.7858 88.3011 57.703 89.3686 56.0887 90.0789L58.1023 94.6555C59.9337 93.8497 62.1919 92.6865 64.7078 91.209L62.1757 86.8975ZM78.6626 74.817C72.8853 79.9859 66.9542 84.0913 62.1757 86.8975L64.7078 91.209C69.742 88.2525 75.9471 83.9556 81.9965 78.5433L78.6626 74.817ZM100.951 33.4698C100.951 50.0268 90.2801 64.4228 78.6626 74.817L81.9965 78.5433C93.9783 67.8231 105.951 52.1722 105.951 33.4698H100.951ZM73.0044 5.54923C87.0131 5.75192 100.951 17.2432 100.951 33.4698H105.951C105.951 14.1555 89.4496 0.78665 73.0767 0.549748L73.0044 5.54923Z'
                              fill='#e74c3c'
                            />
                          </svg>";
                            echo "<span class='number-of-likes'>0</span>";

                            ?>
                            <div>
                                <div class="border">
                                    <h3 class="commentaires">Commentaires</h3>
                                    <?php
                                    $sql = 'SELECT pseudos, comments FROM users, comments WHERE id_pictures = :id_pictures AND comments.id_users = users.id_users;
                                    ';
                                    $query = $db->prepare($sql);
                                    $query->bindValue(':id_pictures', $post['id_pictures'], PDO::PARAM_STR);
                                    $query->execute();
                                    $posts = $query->fetchAll();

                                    foreach ($posts as $comment) {
                                        echo $comment['pseudos'] . " : " . $comment['comments'] . '<br>';
                                    } ?>
                                </div>
                            </div>

                            <?php ?>
                            <form action="./process/comment_trait.php" method="post">
                                <h3>Saisissez votre commentaire</h3>
                                <div class="">
                                    <textarea name="comments" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <input type="hidden" name="dates" value="<?php echo date('H:i:s'); ?>">
                                <input type="hidden" name="id_pictures" value="<?php echo $post['id_pictures']; ?>">
                                <input type="hidden" name="id_users" value="<?php echo $_SESSION['user']['id_users']; ?>">
                                <div class="">
                                    <button class="btn btn-primary" type="submit">Envoyé</button>
                                </div>
                            </form>


                        </div>

                    <?php  } ?>
                </div>


            </div>



            <div class="col-3 border">
                <div class="border-bottom my-3">
                    <h2>Liste profil:</h2>
                </div>

                <div class="form-group border-bottom mb-4">
                    <form id="upload_form" action="./process/picture_trait.php" method="POST" enctype="multipart/form-data">
                        <label for="file"><h5>Publier une photo</h5></label>
                        <input type="file" name="file" class="form-control" />
                        <div class="my-2">
                            <button type="submit" class="btn btn-primary">Publier</button>
                        </div>
                    </form>

                </div>

                <div class="form-group border-bottom mb-4">
                    <form action="./process/avatar_trait.php" method="POST" enctype="multipart/form-data">
                        <label for="file"><h5>Ajouter un photo de profil</h5></label>
                        <input type="file" name="file">
                        <div class="my-2">
                            <button type="submit" class="btn btn-dark">Ajouter</button>
                        </div>
                    </form>
                </div>
                <?php
                $sql = 'SELECT avatars.avatars, users.pseudos
        FROM avatars
        INNER JOIN users ON avatars.id_users = users.id_users';
                $query = $db->prepare($sql);
                $query->execute();
                $results = $query->fetchAll();

                foreach ($results as $result) {
                    echo "<div class = 'd-flex justify-content-start my-2'>";
                    echo "<img id='avatar' src='./upload_avatar/" . $result['avatars'] . "' width='50px' height='50px' class='rounded-circle'>";
                    echo $result['pseudos'];
                    echo "</div>";
                }
                ?>
            </div>
        </div>

        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="./script/main.js"></script>


</body>

</html>

</body>