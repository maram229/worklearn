<?php
// Activer l'affichage des erreurs pour le débogage
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connexion à la base de données
$servername = "localhost";
$username = "root"; // Votre nom d'utilisateur
$password = ""; // Votre mot de passe
$dbname = "worklearn"; // Votre nom de base de données

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Vérifier si la méthode POST est utilisée (cela signifie que le formulaire a été soumis)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données envoyées par le formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $poste = $_POST['poste'];
    $service = $_POST['service'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $formations = $_POST['formations'];

    // Préparer la requête SQL pour insérer les données
    $stmt = $conn->prepare("INSERT INTO employes (nom, prenom, poste, service, telephone, email, formations) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $nom, $prenom, $poste, $service, $telephone, $email, $formations);

    // Exécuter la requête
    if ($stmt->execute()) {
        echo "Employé ajouté avec succès!";
    } else {
        echo "Erreur lors de l'ajout de l'employé : " . $stmt->error;
    }

    // Fermer la requête et la connexion
    $stmt->close();
    $conn->close();
}
// Après avoir ajouté l'employé
header("Location: employes.php");
exit();

?>
