<?php
session_start();
require_once('../utils/connexion.php');
var_dump($_SESSION["id_pictures"]);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Get the form data
    $comments = $_POST['comments'];
    $dates = $_POST['dates'];
    $id_pictures = $_SESSION['id_pictures'];
    $id_users = $_POST['id_users'];

    // ... (existing code)

    $sql = "INSERT INTO comments (comments, dates, id_pictures, id_users) VALUES (:comments, :dates, :id_pictures, :id_users)";

    $request = $db->prepare($sql);
    if ($request->execute([
        'comments' => $comments,
        'dates' => $dates,
        'id_pictures' => $id_pictures,
        'id_users' => $_SESSION['user']['id_users'],    
    ]));
}

