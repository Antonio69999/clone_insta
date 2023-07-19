<?php require_once ("./utils/connexion.php");
session_start();

// Check if the user is authenticated (you can modify this condition based on your authentication logic)
if (isset($_SESSION['id_users'])) {
  // Retrieve the picture ID from the AJAX request
  $pictureId = $_POST['pictureId'];

  // Retrieve the user's ID from the session
  $userId = $_SESSION['id_users'];


  $sql = "INSERT INTO likes (id_pictures, id_users) VALUES ($pictureId, $id_users)";

  // Execute the SQL query to insert the like
  // $db should be your database connection object
  $query = $db->prepare($sql);
  $query->execute();

  // Send a response back to the AJAX request (optional)
  echo 'Like inserted successfully';
} else {
  // If the user is not authenticated, handle the error or redirect as desired
  echo 'User not authenticated';
}
?>
