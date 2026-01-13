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

// Vérifier si un ID est passé en paramètre
if (isset($_GET['id'])) {
  $id = intval($_GET['id']);

  // Récupérer les données de l'employé
  $sql = "SELECT * FROM employes WHERE id = ?";
  if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $employe = $result->fetch_assoc();
    $stmt->close();
  }
}

// Mettre à jour les données
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $poste = $_POST['poste'];
  $service = $_POST['service'];
  $telephone = $_POST['telephone'];
  $email = $_POST['email'];
  $formations = $_POST['formations'];

  $sql = "UPDATE employes SET nom = ?, prenom = ?, poste = ?, service = ?, telephone = ?, email = ?, formations = ? WHERE id = ?";
  if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("sssssssi", $nom, $prenom, $poste, $service, $telephone, $email, $formations, $id);
    if ($stmt->execute()) {
      echo "Employé mis à jour avec succès!";
      header("Location: employes.php");
      exit();
    } else {
      echo "Erreur lors de la mise à jour de l'employé.";
    }
    $stmt->close();
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Modifier l'Employé</title>
  <style>
    <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f7fa;
    margin: 0;
    padding: 20px;
}

h2 {
    color: #2c3e50;
    text-align: center;
    margin-bottom: 30px;
    font-size: 2em;
}

form {
    max-width: 600px;
    margin: 20px auto;
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

label {
    display: block;
    margin-bottom: 8px;
    color: #34495e;
    font-weight: 600;
}

input, textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 2px solid #e0e0e0;
    border-radius: 6px;
    box-sizing: border-box;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

input:focus, textarea:focus {
    border-color: #3498db;
    outline: none;
}

textarea {
    height: 120px;
    resize: vertical;
}

button {
    background-color: #3498db;
    color: white;
    padding: 14px 28px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 600;
    transition: background-color 0.3s ease;
    display: block;
    width: 100%;
}

button:hover {
    background-color: #2980b9;
}

@media (max-width: 768px) {
    form {
        margin: 20px;
        padding: 20px;
    }
    
    h2 {
        font-size: 1.5em;
    }
}

/* Supprime les sauts de ligne générés par les <br> */
br {
    display: none;
}
</style>
  </style>
</head>
<body>
  <h2>Modifier l'Employé</h2>
  <form action="" method="POST">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?= $employe['nom'] ?>" required><br>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" value="<?= $employe['prenom'] ?>" required><br>

    <label for="poste">Poste :</label>
    <input type="text" id="poste" name="poste" value="<?= $employe['poste'] ?>" required><br>

    <label for="service">Service :</label>
    <input type="text" id="service" name="service" value="<?= $employe['service'] ?>" required><br>

    <label for="telephone">Téléphone :</label>
    <input type="text" id="telephone" name="telephone" value="<?= $employe['telephone'] ?>" required><br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="<?= $employe['email'] ?>" required><br>

    <label for="formations">Formations :</label>
    <textarea id="formations" name="formations"><?= $employe['formations'] ?></textarea><br>

    <button type="submit">Mettre à jour</button
