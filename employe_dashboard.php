<?php
session_start();
if ($_SESSION['role'] !== 'employe') {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de Bord Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
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
 /* Tableau de bord */
.dashboard {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); /* Disposition en grille adaptable */
    gap: 80px; /* Espacement entre les cartes */
    padding: 20px;
    margin-top: 30px;
  }
  
  .card {
    background: #FFFFFF;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Ajout d'un effet pour l'ombre */
  }
  
  .card:hover {
    transform: translateY(-5px); /* Légère remontée pour l'effet au survol */
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2); /* Ombre plus forte au survol */
  }
  
  .card-icon {
    width: 50px;
    height: 50px;
    margin-bottom: 15px; /* Ajouter de l'espace entre l'icône et le texte */
  }
  
  .card h3 {
    font-size: 20px;
    color: #244F76; /* Couleur de texte principale */
    font-weight: 600;
  }
  
  .card p {
    font-size: 16px;
    color: #52859E; /* Couleur de texte secondaire */
    margin: 10px 0;
  }
  
  /* recent-activities */
  
  .recent-activities{
    background: #FFFFFF;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin: 20px;
    animation: fadeIn 1s ease-in-out;
    display: flex;
    justify-content: center; /* Centrer horizontalement */
    align-items: center; /* Centrer verticalement */
  }
  .testimonials {
    background: #FFFFFF;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin: 40px;
    animation: fadeIn 1s ease-in-out;
  }
  .testimonial {
    gap: 15px;
    padding: 10px 0;
  }
  .activity {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 10px 0;
  }
  /* Footer */
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
    </div>
    <?php echo "<h1>Bienvenue Employé, " . $_SESSION['username'] . "!</h1>";?>
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
  <!-- Tableau de bord -->
  <section class="dashboard">
    <div class="card">
      <div class="card-icon">📊</div>
      <h2>Formations en cours</h2>
      <p id="ongoing-trainings">5</p>
    </div>
    <div class="card">
      <div class="card-icon">👥</div>
      <h2>Employés formés</h2>
      <p id="trained-employees">45</p>
    </div>
    <div class="card">
      <div class="card-icon">📅</div>
      <h2>Formations planifiées</h2>
      <p id="planned-trainings">3</p>
    </div>
  </section>

  <!-- Activités récentes -->
  <section class="recent-activities">
    <h2>Activités Récentes</h2>
    <div class="activity">
      <span class="activity-icon">📚</span>
      <div class="activity-details">
        <p><strong>Formation "Leadership"</strong> ajoutée pour le département RH.</p>
        <small>Il y a 2 heures</small>
      </div>
    </div>
    <div class="activity">
      <span class="activity-icon">👤</span>
      <div class="activity-details">
        <p>Nouvel employé ajouté : <strong>Jane Smith</strong> (Département IT).</p>
        <small>Il y a 1 jour</small>
      </div>
    </div>
    <div class="activity">
      <span class="activity-icon">🔔</span>
      <div class="activity-details">
        <p><strong>Rappel :</strong> Formation "Gestion de Projet" planifiée pour demain.</p>
        <small>Il y a 3 jours</small>
      </div>
    </div>
  </section>
   <!-- Section Témoignages -->
   <section class="testimonials">
    <h2>Ce que disent nos employés</h2>
    <div class="testimonial">
      <p>"La formation sur la gestion de projet m'a énormément aidé dans mon travail quotidien."</p>
      <strong>- Pierre Dupont, Chef de projet</strong>
    </div>
    <div class="testimonial">
      <p>"Grâce à cette plateforme, j'ai pu suivre plusieurs formations en ligne facilement."</p>
      <strong>- Sophie Martin, Développeuse</strong>
    </div>
  </section>  
  <footer>
    <p>&copy; 2025 ODCE. Tous droits réservés.</p>
  </footer>
</body>
</html>
