<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center position-absolute top-50 start-50 translate-middle" method="post">
            <form action="./process/login_trait.php" method="post" enctype="multipart/form-data">
                <div>
                    <div class="d-flex justify-content-center">
                        <h1>BIENVENUE SUR</h1>
                    </div>
                    <div class="d-flex justify-content-center">
                        <img src="./assets/logo-insta.png" alt="logo Instagram" class="instagram-logo">
                    </div>
                    <div class="my-3">
                        <input type="text" class="form-control" placeholder="nom d'utilisateur" name="username" id="">
                    </div>

                    <div class="my-3">
                        <input type="text" class="form-control" placeholder="pseudo" name="pseudo" id="">
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-dark btn-lg">connexion</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</body>

</html>