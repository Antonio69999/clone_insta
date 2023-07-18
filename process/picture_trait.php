<?php require_once("../utils/connexion.php"); ?>
<?php session_start(); ?>

<?php if (isset($_FILES['file'])) {
    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));
    //Tableau des extensions que l'on accepte
    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
    //Taille max que l'on accepte
    $maxSize = 400000;
    if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){

        $uniqueName = uniqid('', true);
        //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
        $file = $uniqueName.".".$extension;
        //$file = 5f586bf96dcd38.73540086.jpg

        move_uploaded_file($tmpName, '../upload/'.$file);

        $req = $db->prepare('INSERT INTO pictures (pictures) VALUES (?)');  
        $req->execute([
            $file,
        ]);
         header('Location:../instagram.php');
        // $userId = $db->lastInsertId();
        // $_SESSION['users']['id_users'] = $userId;
    }
    else{
        echo "Error";
    }
}
?>