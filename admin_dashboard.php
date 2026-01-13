<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interface Admin</title>
  <style>
    body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  color: #333;
  line-height: 1.6;
}

/* Header */
header {
  background-color: #244F76;
  color: #EBF2E8;
  padding: 20px;
  display: flex;
  align-items: center;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  position: relative;
}
.logo-container {
  display: flex;
  align-items:center;
  justify-content: center;

}

.logo {
  width: 75px;
  height: 75px;
  margin-left: 15px;

}

header h1 {
  font-size: 24px;
  justify-content: center;
  align-items: center;
}
.dashboard1 {
          margin: 0;
          font-size: 28px; /* Taille de police augmentée */
          font-weight: 500;
          position: absolute; /* Position absolue pour centrer */
          left: 50%; /* Déplace à 50% de la largeur */
          transform: translateX(-50%); /* Centre parfaitement */
        }
        
/* Navigation Admin */
.admin-nav {
  background-color: #52859E;
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
  color: #EBF2E8;
  font-size: 18px;
  font-weight: 500;
  transition: color 0.3s ease;
}

.admin-nav ul li a:hover {
  color: #9AD0C2;
}

/* Contenu principal */
main {
  padding: 20px;
}

/* Sidebar */
.sidebar {
  background-color: #244F76;
  color: #fff;
  width: 250px;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  padding-top: 80px;
}

.sidebar ul {
  list-style: none;
}

.sidebar ul li {
  padding: 10px 20px;
}

.sidebar ul li a {
  color: #fff;
  text-decoration: none;
  font-size: 16px;
}

.sidebar ul li a:hover {
  background-color: #444;
  display: block;
}

/* Main Content */
.content {
  margin-left: 250px;
  padding: 20px;
}

/* Dashboard */
.dashboard h1 {
  margin-bottom: 20px;
  
}
.stats {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 20px;
}

.card {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.card h3 {
  margin-bottom: 10px;
  font-size: 18px;
}

.card p {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 15px;
}

.card button {
  background-color: #4caf50;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

.card button:hover {
  background-color: #767373;
}

/* Tables */
table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

table th, table td {
  padding: 12px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

table th {
  background-color: #2b2c2c;
  color: #fff;
}

table tr:hover {
  background-color: #f5f5f5;
}

table button {
  background-color: #4caf50;
  color: #fff;
  border: none;
  padding: 5px 10px;
  border-radius: 5px;
  cursor: pointer;
  margin-right: 5px;
}

table button:hover {
  background-color: #444;
}

/* Modals */
.modal {
  display: none;
  position: fixed;
  z-index: 1000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  justify-content: center;
  align-items: center;
}

.modal-content {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  width: 400px;
  position: relative;
}

.modal-content .close {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 24px;
  cursor: pointer;
}

.modal-content h2 {
  margin-bottom: 20px;
}

.modal-content form label {
  display: block;
  margin-bottom: 5px;
}

.modal-content form input,
.modal-content form textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ddd;
  border-radius: 5px;
}

.modal-content form button {
  background-color: #333;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

.modal-content form button:hover {
  background-color: #444;
}

/* Notifications */
.notification-card {
  background-color: #fff;
  padding: 15px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin-bottom: 15px;
}

.notification-card h4 {
  margin-bottom: 10px;
  font-size: 18px;
}

.notification-card p {
  margin-bottom: 10px;
}

.notification-card span {
  font-size: 14px;
  color: #777;
}

/* Responsive Design */
@media (max-width: 768px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
    padding-top: 20px;
  }

  .content {
    margin-left: 0;
  }

  .stats {
    grid-template-columns: 1fr;
  }

  .admin-nav ul {
    flex-direction: column;
  }

  .admin-nav ul li {
    margin-bottom: 10px;
  }
}
h2 {
    margin: 0;
    font-size: 28px; /* Taille de police augmentée */
    font-weight: 500;
    position: absolute; /* Position absolue pour centrer */
    left: 50%; /* Déplace à 50% de la largeur */
    transform: translateX(-50%); /* Centre parfaitement */
  }

  </style>
</head>
<body>
  <!-- Navbar -->
  <header>
    <div class="logo-container">
      <img src="logo.png" alt="Logo de la société" class="logo">
      <?php echo "<h2>Welcome, Admin " . $_SESSION['username'] . "!</h2>"; ?>
    </div>
  </header>
  <nav class="admin-nav">
    <ul>
      <li><a href="admin_dashboard.php">Home</a></li>
      <li><a href="employes.php">Employes</a></li>
      <li><a href="formations.php">Formations</a></li>
       <a href="logout.php">Se déconnecter</a>
    </ul>
  </nav>
  <!-- Sidebar -->
  <nav class="sidebar" aria-label="Sidebar">
    <div class="logo-container">
      <img src="logo.png" alt="Logo de la société" class="logo">
    </div>
    <ul>
      <li><a href="#dashboard" class="active">WorkLearn-ODCE</a></li>
      <li><a href="#participations">Participations</a></li>
      <li><a href="#rapports">Rapports</a></li>
      <li><a href="#notifications">Notifications</a></li>
    </ul>
  </nav>
  <!-- Main Content -->
  <main class="content">
    <!-- Dashboard -->
    <section class="dashboard" id="dashboard" aria-labelledby="dashboard-heading">
      <h1 id="dashboard-heading">Bienvenue sur le Tableau de Bord Admin</h1>
      <div class="stats">
        <div class="card">
          <h3>Utilisateurs</h3>
          <p id="user-count">150</p>
          <button onclick="updateStat('user-count')">Modifier</button>
        </div>
        <div class="card">
          <h3>Formations</h3>
          <p id="formation-count">25</p>
          <button onclick="updateStat('formation-count')">Modifier</button>
        </div>
        <div class="card">
          <h3>Participations</h3>
          <p id="participation-count">500+</p>
          <button onclick="updateStat('participation-count')">Modifier</button>
        </div>
        <div class="card">
          <h3>Nouvelles Statistiques</h3>
          <p id="new-stat">0</p>
          <button onclick="updateStat('new-stat')">Modifier</button>
        </div>
      </div>
    </section>
    <!-- Rapports -->
    <section class="rapport-list" id="rapports" aria-labelledby="rapports-heading">
      <h1 id="rapports-heading">Rapports</h1>
      <button onclick="openAddRapportModal()">Créer un Rapport</button>
      <table>
        <thead>
          <tr>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody id="rapport-table-body">
          <!-- Rows will be added dynamically -->
        </tbody>
      </table>
    </section>

    <!-- Notifications -->
    <section class="notification-list" id="notifications" aria-labelledby="notifications-heading">
      <h1 id="notifications-heading">Notifications</h1>
      <div class="notification-card">
        <h4>Formation Angular</h4>
        <p>La formation Angular aura lieu le 10 février.</p>
        <span>Publié le 2 février 2025</span>
      </div>
      <div class="notification-card">
        <h4>Formation React</h4>
        <p>La formation React commence le 15 février.</p>
        <span>Publié le 3 février 2025</span>
      </div>
      <button>Créer une Notification</button>
    </section>

  </main>

  <!-- Modals -->
  <div id="addUserModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal('addUserModal')">&times;</span>
      <h2>Ajouter un Employé</h2>
      <form id="addUserForm">
        <label for="userName">Nom:</label>
        <input type="text" id="userName" required>
        <label for="userRole">Rôle:</label>
        <input type="text" id="userRole" required>
        <label for="userService">Service:</label>
        <input type="text" id="userService" required>
        <button type="submit">Ajouter</button>
      </form>
    </div>
  </div>

  <div id="addFormationModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal('addFormationModal')">&times;</span>
      <h2>Ajouter une Formation</h2>
      <form id="addFormationForm">
        <label for="formationName">Formation:</label>
        <input type="text" id="formationName" required>
        <label for="formationCategory">Catégorie:</label>
        <input type="text" id="formationCategory" required>
        <label for="formationDuration">Durée:</label>
        <input type="text" id="formationDuration" required>
        <label for="formationTrainer">Formateur:</label>
        <input type="text" id="formationTrainer" required>
        <button type="submit">Ajouter</button>
      </form>
    </div>
  </div>

  <div id="addRapportModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal('addRapportModal')">&times;</span>
      <h2>Créer un Rapport</h2>
      <form id="addRapportForm">
        <label for="rapportTitle">Titre:</label>
        <input type="text" id="rapportTitle" required>
        <label for="rapportDescription">Description:</label>
        <textarea id="rapportDescription" required></textarea>
        <button type="submit">Créer</button>
      </form>
    </div>
  </div>

  <script>
  // Fonction pour modifier les statistiques
function updateStat(id) {
  const newValue = prompt("Entrez la nouvelle valeur :");
  if (newValue !== null && newValue !== "") {
    document.getElementById(id).textContent = newValue;
  }
}

// Fonctions pour les modales
function openAddUserModal() {
  document.getElementById('addUserModal').style.display = 'block';
}

function openAddFormationModal() {
  document.getElementById('addFormationModal').style.display = 'block';
}

function openAddRapportModal() {
  document.getElementById('addRapportModal').style.display = 'block';
}

function closeModal(modalId) {
  document.getElementById(modalId).style.display = 'none';
}
  </script>
</body>
</html>
