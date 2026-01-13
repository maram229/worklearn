<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rapports</title>
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
    main {
      padding: 20px;
    }

    .statistics {
      display: flex;
      justify-content: space-between;
      margin-bottom: 30px;
    }

    .stat-card {
      background: #efeded;
      padding: 15px;
      text-align: center;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 30%;
      cursor: pointer;
    }

    .training-reports {
      margin-bottom: 30px;
    }

    #training-list {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.training-item {
  background: #2f4550;
  color: #fff;
  border: none;
  padding: 10px;
  border-radius: 5px;
  cursor: pointer;
  text-align: left;
}

.training-item:hover {
  background: #1c2e3a;
}

.training-details {
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.hidden {
  display: none;
}

.image-gallery img {
  width: 100px;
  height: 100px;
  object-fit: cover;
  margin: 5px;
  border-radius:5px;
            }

    .modal {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: #efeded;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      z-index: 1000;
      border-radius: 8px;
      display: none;
    }

    .modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 999;
      display: none;
    }

    .modal h2 {
      margin-top: 0;
    }

    .modal-close {
      position: absolute;
      top: 10px;
      right: 10px;
      background: transparent;
      border: none;
      font-size: 18px;
      cursor: pointer;
    }

    #chart-container {
      width: 100%;
      max-width: 500px;
      height: 300px;
    }
    footer {
    background-color: #244F76; /* Couleur de fond du footer */
    color: #EBF2E8; /* Couleur de texte du footer */
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
  }
  </style>

</head>
<body>
<header>
    <div class="logo-container">
      <img src="logo.png" alt="Logo de l'application" class="logo">
      <h1>Rapports & Statistiques</h1>
    </div>

  </header>
  <nav class="admin-nav">
  <ul>
    <li><a href="employe_dashboard.php">Accueil</a></li>
    <li><a href="e-formation.php">Formations</a></li>
    <li><a href="demande_formation.php">Demandes</a></li>
    <li><a href="suivi.php">Suivi</a></li>
    <li><a href="historique.php">Historique</a></li>
        <a href="logout.php">Se déconnecter</a>
    </ul>
  </nav>

  <main>
    <section class="statistics">
      <h2>Statistiques Générales</h2>
      <div class="stat-card" data-chart="trainings">
        <h3>Formations Total</h3>
        <p id="total-trainings">25</p>
      </div>
      <div class="stat-card" data-chart="employees">
        <h3>Employés Formés</h3>
        <p id="total-employees">150</p>
      </div>
      <div class="stat-card" data-chart="certificates">
        <h3>Certificats Distribués</h3>
        <p id="total-certificates">130</p>
      </div>
    </section>

    <section class="training-reports">
      <h2>Rapports des Formations</h2>
      <div id="training-list">
        <button class="training-item" data-training-id="1">Formation Angular</button>
        <button class="training-item" data-training-id="2">Formation Sécurité Informatique</button>
        <button class="training-item" data-training-id="3">Gestion de Projet</button>
      </div>
    </section>

    <section class="training-details hidden" id="training-details">
      <h2 id="training-title">Détails de la Formation</h2>
      <div class="details">
        <h3>Sujets Importants</h3>
        <ul id="training-subjects">
          <!-- Sujets dynamiques -->
        </ul>
        <h3>Participants</h3>
        <ul id="training-participants">
          <!-- Liste des participants dynamiques -->
        </ul>
        <h3>Images de la Formation</h3>
        <div id="training-images" class="image-gallery" >
          <!-- Galerie d'images -->
        </div>
        <h3>Certificats Distribués</h3>
        <div id="training-certificates">
          <!-- Liste des certificats -->
        </div>
      </div>

      <button id="close-details">Fermer</button>
    </section>
  </main>

  <!-- Modale pour les graphiques -->
  <div class="modal-overlay" id="modal-overlay"></div>
  <div class="modal" id="chart-modal">
    <button class="modal-close" id="close-modal">×</button>
    <h2 id="chart-title">Titre du Graphique</h2>
    <div id="chart-container">
      <canvas id="chart"></canvas>
    </div>
  </div>
  <footer>
    <p>&copy; 2025 ODCE. Tous droits réservés.</p>
  </footer>
  <script src="script.js"></script>
</body>
</html>

 