<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/db_connection.php';

$nom = "sayhi"; // Nom de l'admin
$prenom = "maram"; // Prénom de l'admin
$password = "Odco*1"; // Mot de passe
$role = "admin"; // Rôle

// Vérifier si l'admin existe déjà
$query = $conn->prepare("SELECT * FROM utilisateurs WHERE nom = :nom AND prenom = :prenom AND role = :role");
$query->bindParam(':nom', $nom);
$query->bindParam(':prenom', $prenom);
$query->bindParam(':role', $role);
$query->execute();

if ($query->rowCount() > 0) {
    echo "L'administrateur existe déjà.";
} else {
    // Hachage du mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Insertion de l'admin
        $query = $conn->prepare("INSERT INTO utilisateurs (nom, prenom, password, role) VALUES (:nom, :prenom, :password, :role)");
        $query->bindParam(':nom', $nom);
        $query->bindParam(':prenom', $prenom);
        $query->bindParam(':password', $hashed_password);
        $query->bindParam(':role', $role);

        if ($query->execute()) {
            echo "Administrateur ajouté avec succès !";
        } else {
            echo "Erreur lors de l'ajout de l'administrateur.";
        }
    } catch (PDOException $e) {
        echo "Erreur SQL: " . $e->getMessage();
    }
}

?>
