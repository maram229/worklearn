<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "worklearn";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Vérification de l'ID dans l'URL
if (isset($_GET['id'])) {
  $id = intval($_GET['id']);

  // Suppression de l'employé
  $sql = "DELETE FROM employes WHERE id = ?";
  if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
      echo "Employé supprimé avec succès!";
    } else {
      echo "Erreur lors de la suppression de l'employé.";
    }
    $stmt->close();
  } else {
    echo "Erreur de préparation de la requête.";
  }
} else {
  echo "ID de l'employé manquant.";
}

$conn->close();

// Redirection vers la page principale après suppression
header("Location: employes.php");
exit();
?>
