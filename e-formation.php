<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formations</title>
  <link rel="stylesheet" href="styles.css">
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
      
      /* Section de recherche */
      .search-section {
        background-color: #FFFFFF; /* Fond blanc pour la section */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px;
        text-align: center;
      }
      
      .search-section h2 {
        margin: 0 0 20px;
        font-size: 24px;
        font-weight: 500;
        color: #244F76; /* Couleur de texte principale */
      }
      
      .search-form {
        display: flex;
        justify-content: center;
      }
      
      .search-input {
        padding: 10px;
        font-size: 16px;
        border: 1px solid #52859E;
        border-radius: 5px;
        width: 300px;
        margin-right: 10px;
      }
      
      .search-button {
        padding: 10px 20px;
        font-size: 16px;
        color: #FFFFFF;
        background-color: #9AD0C2;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }
      
      .search-button:hover {
        background-color: #52859E;
      }
      
      /* Liste des formations */
      .formations-list {
        background-color: #FFFFFF; /* Fond blanc pour la section */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px;
      }
      
      .formations-list h2 {
        margin: 0 0 20px;
        font-size: 24px;
        font-weight: 500;
        color: #244F76; /* Couleur de texte principale */
      }
      
      .formation-item {
        margin-bottom: 20px;
        padding: 15px;
        border: 1px solid #52859E;
        border-radius: 5px;
      }
      
      .formation-item h3 {
        margin: 0 0 10px;
        font-size: 20px;
        font-weight: 500;
        color: #244F76; /* Couleur de texte principale */
      }
      
      .formation-item p {
        margin: 0 0 15px;
        font-size: 16px;
        color: #52859E; /* Couleur de texte secondaire */
      }
      
      .formation-details {
        margin-bottom: 15px;
        font-size: 14px;
        color: #244F76; /* Couleur de texte principale */
      }
      
      .formation-details .date {
        display: block;
        margin-bottom: 5px;
      }
      
      .formation-details .category {
        display: block;
        font-style: italic;
      }
      
      .more-button {
        padding: 8px 16px;
        font-size: 14px;
        color: #FFFFFF;
        background-color: #9AD0C2;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }
      
      .more-button:hover {
        background-color: #52859E;
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
      <h1>Formations</h1>
    </div>

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

  <main class="formations-content">
    <section class="search-section">
      <h2>Rechercher une Formation</h2>
      <form class="search-form">
        <input type="text" placeholder="Rechercher une formation..." class="search-input">
        <button type="submit" class="search-button">Rechercher</button>
      </form>
    </section>

    <section class="formations-list">
      <h2>Liste des Formations</h2>

      <div class="formation-item">
        <h3>Leadership et Management</h3>
        <p> Développez vos compétences en leadership et apprenez à gérer des équipes de manière efficace.</p>
        <div class="formation-details">
          <span class="date">Date de publication: 2022-04-20</span>
          <span class="category"><a [routerLink]="['/categories']" [queryParams]="{category:'Management'}">Catégorie: Management</a></span>
        </div>
        <button class="more-button">Plus</button>
      </div>

      
      <div class="formation-item">
        <h3>Création d'Entreprise</h3>
        <p> Formation pour les futurs entrepreneurs sur la création d’une entreprise, le financement et la gestion initiale.</p>
        <div class="formation-details">
          <span class="date">Date de publication: 2021-08-04</span>
          <span class="category"><a [routerLink]="['/categories']" [queryParams]="{category:'Entrepreneuriat'}">Catégorie: Entrepreneuriat</a></span>
        </div>
        <button class="more-button">Plus</button>
      </div>
      <div class="formation-item">
        <h3>Réparation de cartes électroniques</h3>
        <p>Le Centre de Formation, fce formation organise une formation à la réparation de cartes électroniques pendant une année complète.</p>
        <div class="formation-details">
          <span class="date">Date de publication: 2020-08-14</span>
          <span class="category">
            <a [routerLink]="['/categories']" [queryParams]="{category:'Formations Métiers'}">Catégorie: Formations Métiers</a>
          </span>
        </div>
        <button class="more-button">Plus</button>
      </div>
      <div class="formation-item">
        <h3>Assistant</h3>
        <p>Formation en assistance médicale pour les étudiants en communication.</p>
        <div class="formation-details">
          <span class="date">Date de publication: 2020-08-14</span>
          <span class="category"><a [routerLink]="['/categories']" [queryParams]="{category:'Assistant et Secrétariat'}">Catégorie: Assistant et Secrétariat</a></span>
        </div>
        <button class="more-button">Plus</button>
      </div>
      <div class="formation-item">
        <h3>Comptabilité et finance</h3>
        <p>Formation en comptabilité et finance pour une année complète.</p>
        <div class="formation-details">
          <span class="date">Date de publication: 2020-08-14</span>
          <span class="category"><a [routerLink]="['/categories']" [queryParams]="{category:'Comptabilité'}">Catégorie: Comptabilité</a></span>
        </div>
        <button class="more-button">Plus</button>
      </div>
      <div class="formation-item">
        <h3>Formation en Développement Durable</h3>
        <p>Apprenez les concepts du développement durable appliqués à différents secteurs.</p>
        <div class="formation-details">
          <span class="date">Date de publication: 2021-08-04</span>
          <span class="category"><a [routerLink]="['/categories']" [queryParams]="{category:'Environnement'}">Catégorie: Environnement</a></span>
        </div>
        <button class="more-button">Plus</button>
      </div>


      <div class="formation-item">
        <h3>Gestion des Ressources Humaines</h3>
        <p>  Formation sur la gestion des talents, le recrutement et la gestion des conflits en entreprise.</p>
        <div class="formation-details">
          <span class="date">Date de publication: 2022-03-12</span>
          <span class="category"><a [routerLink]="['/categories']" [queryParams]="{category:'Ressources Humaines'}">Catégorie: Ressources Humaines</a></span>
        </div>
        <button class="more-button">Plus</button>
      </div>

      <div class="formation-item">
        <h3>Communication Interculturelle</h3>
        <p>  Apprenez à gérer les différences culturelles et à améliorer la communication dans des environnements internationaux.</p>
        <div class="formation-details">
          <span class="date">Date de publication: 2022-04-20</span>
          <span class="category"><a [routerLink]="['/categories']" [queryParams]="{category:'Communication'}">Catégorie: Communication</a></span>
        </div>
        <button class="more-button">Plus</button>
      </div>

      
      <div class="formation-item">
        <h3>Formation en Langues Étrangères (Anglais, Espagnol, etc.)</h3>
        <p> Améliorez vos compétences linguistiques pour mieux communiquer dans un environnement professionnel international.</p>
        <div class="formation-details">
          <span class="date">Date de publication: 2022-07-02</span>
          <span class="category"><a [routerLink]="['/categories']" [queryParams]="{category:'Langues'}">Catégorie: Langues</a></span>
        </div>
        <button class="more-button">Plus</button>
      </div>

      <div class="formation-item">
        <h3>Gestion de la Qualité</h3>
        <p>  Formation sur les normes ISO et les pratiques de gestion de la qualité dans les entreprises.</p>
        <div class="formation-details">
          <span class="date">Date de publication: 2023-05-30</span>
          <span class="category"><a [routerLink]="['/categories']" [queryParams]="{category:'Qualité'}">Catégorie: Qualité</a></span>
        </div>
        <button class="more-button">Plus</button>
      </div>

      <div class="formation-item">
        <h3>Droit du Travail et Législation Sociale</h3>
        <p>  Formation sur les aspects juridiques du droit du travail, des contrats et des réglementations sociales.</p>
        <div class="formation-details">
          <span class="date">Date de publication: 2021-10-22</span>
          <span class="category"><a [routerLink]="['/categories']" [queryParams]="{category:'Droit'}">Catégorie: Droit</a></span>
        </div>
        <button class="more-button">Plus</button>
      </div>

      <div class="formation-item">
        <h3>Formation en Cybersécurité</h3>
        <p> Apprenez les bonnes pratiques de sécurité informatique pour protéger les systèmes et les données.</p>
        <div class="formation-details">
          <span class="date">Date de publication:  2022-06-10</span>
          <span class="category"><a [routerLink]="['/categories']" [queryParams]="{category:'Informatique'}">Catégorie: Informatique</a></span>
        </div>
        <button class="more-button">Plus</button>
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 ODCE. Tous droits réservés.</p>
  </footer>
</body>
</html>