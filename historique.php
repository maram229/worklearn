<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Historique des Actions</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
   /* Styles généraux */
body {
  font-family: 'Roboto', sans-serif;
  margin: 0;
  padding: 0;
  background-color: #EBF2E8; /* Couleur de fond principale */
  color: #244F76; /* Couleur de texte principale */
  line-height: 1.6;
}

header {
  background-color: #244F76; /* Couleur d'en-tête */
  color: #EBF2E8; /* Couleur de texte de l'en-tête */
  padding: 20px;
  display: flex;
  align-items: center;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  position: relative; /* Pour positionner le texte au centre */
}

.logo-container {
  display: flex;
  align-items: center;
}

.logo {
  width: 80px; /* Logo agrandi */
  height: 80px; /* Logo agrandi */
  margin-left: 50px;
}

h1 {
  margin: 0;
  font-size: 28px; /* Taille de police augmentée */
  font-weight: 500;
  position: absolute; /* Position absolue pour centrer */
  left: 50%; /* Déplace à 50% de la largeur */
  transform: translateX(-50%); /* Centre parfaitement */
}

/* Navigation Admin */
.admin-nav {
  background-color: #52859E; /* Couleur de fond de la navigation */
  padding: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.admin-nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
}

.admin-nav ul li {
  margin: 0 15px;
}

.admin-nav ul li a {
  text-decoration: none;
  color: #EBF2E8; /* Couleur de texte des liens */
  font-size: 18px;
  font-weight: 500;
  transition: color 0.3s ease;
}

.admin-nav ul li a:hover {
  color: #9AD0C2; /* Couleur au survol */
}

    .history-section {
      padding: 20px;
    }
    .filters {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }
    .filters input, .filters select {
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 14px;
    }
    .history-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    .history-table th, .history-table td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    .history-table th {
      background-color: #4CAF50;
      color: white;
    }
    .history-table tr:hover {
      background-color: #f1f1f1;
    }
    .pagination {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-bottom: 20px;
    }
    .page-btn {
      padding: 10px 20px;
      border: none;
      background-color: #4CAF50;
      color: white;
      border-radius: 5px;
      cursor: pointer;
    }
    .page-btn:hover {
      background-color: #45a049;
    }
    .export-btn {
      padding: 10px 20px;
      border: none;
      background-color: #008CBA;
      color: white;
      border-radius: 5px;
      cursor: pointer;
      margin-right: 10px;
    }
    .export-btn:hover {
      background-color: #007B9E;
    }
    .alert {
      background-color: #ffeb3b;
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
    }
    .alert-icon {
      background-color: #f44336;
      color: white;
      padding: 5px 10px;
      border-radius: 50%;
      margin-right: 10px;
    }
    canvas {
      max-width: 100%;
      margin-bottom: 20px;
    }
    @media (max-width: 768px) {
      .filters {
        flex-direction: column;
      }
      .history-table {
        display: block;
        overflow-x: auto;
      }
    }
  </style>
</head>
<body>
    <header>
        <div class="logo-container">
          <img src="logo.png" alt="Logo de l'application" class="logo">
        </div>
        <h1>Historique des actions</h1>
      </header>
    
      <nav class="admin-nav">
        <ul>
        <li><a href="employe_dashboard.php">Acceuil</a></li>
            <li><a href="e-formation.php">Formations</a></li>
            <li><a href="demande_formation.php">Demandes</a></li>
            <li><a href="suivi.php">Suivi</a></li>
            <li><a href="historique.php">Historique</a></li>
        <a href="logout.php">Se déconnecter</a>
        </ul>
      </nav>
    

  <section class="history-section">
    <!-- Filtres et Recherche -->
    <div class="filters">
      <input type="text" placeholder="Rechercher..." class="search-bar">
      <select class="filter-date">
        <option value="all">Toutes les dates</option>
        <option value="last-month">Dernier mois</option>
        <option value="last-quarter">Dernier trimestre</option>
        <option value="current-year">Année en cours</option>
      </select>
      <select class="filter-action">
        <option value="all">Toutes les actions</option>
        <option value="formation-added">Formations ajoutées</option>
        <option value="request-processed">Demandes traitées</option>
        <option value="modification">Modifications</option>
      </select>
    </div>

    <!-- Tableau des Historiques -->
    <table class="history-table">
      <thead>
        <tr>
          <th>Date et Heure</th>
          <th>Action</th>
          <th>Utilisateur</th>
          <th>Détails</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>2023-10-15 14:30</td>
          <td>Formation ajoutée</td>
          <td>Admin1</td>
          <td>Formation "Gestion de projet"</td>
        </tr>
        <tr>
          <td>2023-10-14 10:15</td>
          <td>Demande approuvée</td>
          <td>Admin2</td>
          <td>Demande ID #1234</td>
        </tr>
        <tr>
          <td>2023-10-13 16:45</td>
          <td>Modification</td>
          <td>Admin1</td>
          <td>Formation "Marketing Digital" mise à jour</td>
        </tr>
      </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination">
      <button class="page-btn">Précédent</button>
      <span class="page-number">Page 1</span>
      <button class="page-btn">Suivant</button>
    </div>

    <!-- Boutons d'Exportation -->
    <button class="export-btn">Exporter en CSV</button>
    <button class="export-btn">Exporter en PDF</button>

    <!-- Graphique -->
    <canvas id="historyChart"></canvas>
    <script>
      const ctx = document.getElementById('historyChart').getContext('2d');
      const historyChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
          datasets: [{
            label: 'Formations ajoutées',
            data: [12, 19, 3, 5, 2, 3],
            borderColor: 'rgba(75, 192, 192, 1)',
            fill: false,
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>

    <!-- Notification -->
    <div class="alert">
      <span class="alert-icon">!</span>
      <p>3 demandes en attente de traitement.</p>
    </div>
  </section>
</body>
</html>