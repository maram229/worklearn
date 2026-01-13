<?php
session_start();
require 'db_connection.php';
$pdo = new PDO('mysql:host=localhost;dbname=worklearn', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idDemande = $_POST['id_demande'];
    $action = $_POST['action'];

    $statut = ($action == 'accepter') ? 'acceptée' : 'refusée';
    $stmt = $pdo->prepare("UPDATE formations_utilisateurs SET statut = ? WHERE id = ?");
    $stmt->execute([$statut, $idDemande]);
}
try {
    $requete = $pdo->query("
        SELECT 
            fu.id,
            u.nom,
            u.prenom,
            u.email,
            u.telephone,
            f.titre as formation,
            fu.statut,
            DATE_FORMAT(fu.date_demande, '%d/%m/%Y %H:%i') as date_demande
        FROM formations_utilisateurs fu
        JOIN utilisateurs u ON fu.id_utilisateurs = u.id
        JOIN formations f ON fu.id_formations = f.id
        WHERE fu.statut = 'en attente'
        ORDER BY fu.date_demande DESC
    ");
    $demandes = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de base de données : " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Participations</title>
    <link rel="stylesheet" href="style.css">
    <style>
body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  color: #333;
  line-height: 1.6;
}
/* Styles améliorés */
.data-table {
width: 100%;
border-collapse: collapse;
margin: 25px 0;
font-size: 0.9em;
min-width: 800px;
box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
.data-table thead tr {
background-color: #244F76;
color: #ffffff;
text-align: left;
        }
.data-table th,
.data-table td {
padding: 12px 15px;
        }
.data-table tbody tr {
border-bottom: 1px solid #dddddd;
        }
.data-table tbody tr:nth-of-type(even) {
background-color: #f3f3f3;
        }
.data-table tbody tr:last-of-type {
border-bottom: 2px solid #244F76;
        }
.status {
 padding: 5px 10px;
border-radius: 5px;
font-weight: bold;
text-align: center;
display: inline-block;
        }
.en-attente { background: #fff3cd; color: #856404; }
.acceptée { background: #d4edda; color: #155724; }
.refusée { background: #f8d7da; color: #721c24; }
.action-buttons {
            display: flex;
            gap: 5px;
        }
.btn {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: opacity 0.3s;
        }
 .btn-accepter {
            background-color: #28a745;
            color: white;
        }

.btn-refuser {
            background-color: #dc3545;
            color: white;
        }

.no-data {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 5px;
            margin: 20px 0;
        }
h3 {
    margin: 0;
    font-size: 28px; 
    font-weight: 500;
    position: absolute; 
    left: 50%; 
    transform: translateX(-50%);
  }
    </style>
</head>
<body>
     <!-- Navbar -->
  <header>
    <div class="logo-container">
      <img src="logo.png" alt="Logo de la société" class="logo">
      <H3>Les nouvelles participations</H3>
    </div>
  </header>
  <nav class="admin-nav">
    <ul>
      <li><a href="admin_dashboard.php">Home</a></li>
      <li><a href="employes.php">Employes</a></li>
      <li><a href="formations.php">Formations</a></li>
      <li><a href="participation.php">Participation</a></li>
       <a href="logout.php">Se déconnecter</a>
    </ul>
  </nav>
    <div class="container">
        <h2>Nouvelles Participations en attente</h2>

        <?php if (empty($demandes)): ?>
            <div class="no-data">
                Aucune nouvelle inscription en attente
            </div>
        <?php else: ?>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Formation</th>
                        <th>Date demande</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($demandes as $demande): ?>
                        <tr>
                            <td><?= htmlspecialchars($demande['nom']) ?></td>
                            <td><?= htmlspecialchars($demande['prenom']) ?></td>
                            <td><?= htmlspecialchars($demande['email']) ?></td>
                            <td><?= htmlspecialchars($demande['telephone']) ?></td>
                            <td><?= htmlspecialchars($demande['formation']) ?></td>
                            <td><?= htmlspecialchars($demande['date_demande']) ?></td>
                            <td>
                                <span class="status en-attente">
                                    <?= htmlspecialchars($demande['statut']) ?>
                                </span>
                            </td>
                            <td>
                                <form method="post" class="action-buttons">
                                    <input type="hidden" name="id_demande" value="<?= $demande['id'] ?>">
                                    <button type="submit" name="action" value="accepter" class="btn btn-accepter">
                                        Accepter
                                    </button>
                                    <button type="submit" name="action" value="refuser" class="btn btn-refuser">
                                        Refuser
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>