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
    $maxSize = 5000000000000000000000000000000;
    if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){

        $uniqueName = uniqid('', true);
        //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
        $file = $uniqueName.".".$extension;
        //$file = 5f586bf96dcd38.73540086.jpg
      
              $destination = '../upload/' . $file;

        if (move_uploaded_file($tmpName, $destination)) {
            $req = $db->prepare('INSERT INTO pictures (pictures, id_users) VALUES (?, ?)');
            $req->execute([$file, $_SESSION['user']['id_users']]);
            header('Location: ../instagram2.php');
            exit();
        } else {
            echo "Error: Failed to move the uploaded file.";
        }
    } else {
        echo "Error: Invalid file.";
    }
}
?>