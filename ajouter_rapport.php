<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "worklearn";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
if (isset($_POST['rapportTitle'], $_POST['rapportDescription'])) {
    $titre = trim($_POST['rapportTitle']);
    $contenu = trim($_POST['rapportDescription']);
    $date = date("Y-m-d H:i:s");

    if (!empty($titre) && !empty($contenu)) {
        try {
            // Utilisation de backticks autour de 'date'
            $sql = "INSERT INTO rapports (titre, contenu, `date`) VALUES (:titre, :contenu, :date)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':titre' => $titre,
                ':contenu' => $contenu,
                ':date' => $date
            ]);
            echo "success";
        } catch (PDOException $e) {
            echo "Erreur SQL : " . $e->getMessage();
        }
    } else {
        echo "empty";
    }
} else {
    echo "invalid";
}
?>