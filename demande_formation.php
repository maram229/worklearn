<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demandes de Formation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
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

      
.status-pending { color: orange; }
.status-approved { color: green; }
.status-rejected { color: red; }
 .card {
    border-radius: 10px;
    transition: transform 0.3s ease-in-out;
          }
 .card:hover {
    transform: scale(1.02);
          }
          .btn-primary {
              background-color: #007bff;
              border: none;
              font-weight: bold;
          }
          .btn-primary:hover {
              background-color: #0056b3;
          }
          .alert-success {
              font-weight: bold;
          }
          .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        #trainingRequestForm{
          width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        select,
        textarea{
          width: 100%;
          padding: 10px;
          margin-bottom: 15px;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
          font-size: 14px;

        }
        textarea {
            resize: vertical;
        }
        .confirmation-message {
            display: none;
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            margin-top: 15px;
            text-align: center;
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
        <h1>Demandes de Formation</h1>
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

          <div class="container">
            <h2>Soumettre une Demande de Formation</h2>
            <form id="trainingRequestForm" class="form">
                
                <fieldset>
                    <legend>Informations Personnelles</legend>
                    <label for="employeeName">Nom et Prénom</label>
                    <input type="text" id="employeeName" name="employeeName" placeholder="Ex: Jean Dupont" required>
                    
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Ex: jean.dupont@email.com" required>
                    
                    <label for="phone">Téléphone</label>
                    <input type="tel" id="phone" name="phone" placeholder="Ex: +33 6 12 34 56 78" required>
                </fieldset>
                
                <fieldset>
                    <legend>Informations sur la Formation</legend>
                    <label for="trainingSelect">Formation souhaitée</label>
                    <select id="trainingSelect" name="trainingSelect" required>
                        <option value="" disabled selected>Choisissez une formation</option>
                        <option>Bureautique et Multimédia</option>
                        <option>Informatique et Télécom</option>
                        <option>Langues</option>
                        <option>Communication</option>
                        <option>Management</option>
                        <option>Banque et Assurance</option>
                        <option>Techniques Industrielles</option>
                        <option>Ressources Humaines</option>
                        <option>Finance</option>
                        <option>Environnement et Qualité</option>
                        <option>Assistanat et Secrétariat</option>
                        <option>Emploi et Entreprise</option>
                        <option>Formations Métiers</option>
                        <option>Autre</option>
                    </select>
                    
                    <label for="motivation">Motivation</label>
                    <textarea id="motivation" name="motivation" rows="4" placeholder="Décrivez votre motivation ici" required></textarea>
                    
                    <label for="trainingDate">Date souhaitée</label>
                    <input type="date" id="trainingDate" name="trainingDate" required>
                </fieldset>
                
                <button type="button" onclick="submitRequest()" class="submit-button">Valider</button>
                
                <div class="confirmation-message" id="confirmationMessage" style="display: none;">
                    ✅ Votre demande a été soumise avec succès !
                </div>
            </form>
        </div>
        
        <script>
            function submitRequest() {
                document.getElementById("confirmationMessage").style.display = "block";
            }
        </script>
        
    </main>
    <footer>
        <p>&copy; 2025 ODCE. Tous droits réservés.</p>
      </footer>
</body>
</html>
