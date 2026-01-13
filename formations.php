<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "worklearn");
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Ajouter ou Modifier une formation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $formateur = $_POST["formateur"];
    $catégorie = $_POST["catégorie"];
    $id = isset($_POST["id"]) ? $_POST["id"] : '';

    if (empty($id)) {
        // Ajouter une nouvelle formation
        $sql = "INSERT INTO formations (titre, description, formateur, catégorie) 
                VALUES ('$titre', '$description', '$formateur', '$catégorie')";
    } else {
        // Modifier une formation existante
        $sql = "UPDATE formations SET 
                    titre='$titre', 
                    description='$description', 
                    formateur='$formateur', 
                    catégorie='$catégorie' 
                WHERE id='$id'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Opération réussie');</script>";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

// Supprimer une formation
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM formations WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Formation supprimée');</script>";
    } else {
        echo "Erreur : " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Formations</title>
    <style>
       /* Styles généraux */
      body {
          font-family: 'Roboto', sans-serif;
          margin: 0;
          padding: 0;
          background-color: #ffffff; /* Couleur de fond principale */
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
              .container {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #244F76;
        }
        .add-training {
            text-align: right;
            margin-bottom: 20px;
        }
        button {
            background: #4caf50;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }
        .training-history ul {
            list-style: none;
            padding: 0;
        }
        .training-history ul li {
            background: #f9f9f9;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        .close {
            float: right;
            cursor: pointer;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
<header>
    <div class="logo-container">
      <img src="logo.png" alt="Logo de la société" class="logo">
      <h1>Ajouter Des Formations</h1>
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
    <div class="container">
        <h2>Gestion des Formations</h2>
        <div class="add-training">
            <button id="open-modal" onclick="openModal()">+ Ajouter une Formation</button>
        </div>

        <div class="training-history">
            <h2>Historique des Formations</h2>
            <ul>
                <?php
                $result = $conn->query("SELECT * FROM formations ORDER BY id DESC");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>
                                <strong>" . $row["titre"] . "</strong> - " . $row["catégorie"] . "<br>" . $row["description"] . "<br><em>Formateur: " . $row["formateur"] . "</em>
                                <br>
                                <button onclick=\"editFormation('" . $row["id"] . "', '" . $row["titre"] . "', '" . $row["description"] . "', '" . $row["formateur"] . "', '" . $row["catégorie"] . "')\">Modifier</button>
                                <a href='?delete=" . $row["id"] . "' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?');\">
                                    <button style='background: red;'>Supprimer</button>
                                </a>
                              </li>";
                    }
                } else {
                    echo "<li>Aucune formation trouvée.</li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <!-- Formulaire Modal -->
    <div id="training-modal" class="modal">
        <div class="modal-content">
            <span id="close-modal" class="close" onclick="closeModal()">&times;</span>
            <h2>Ajouter / Modifier une Formation</h2>
            <form action="" method="POST">
                <input type="hidden" id="training-id" name="id">
                <input type="text" id="training-title" name="titre" required placeholder="Titre">
                <input type="text" id="trainer-name" name="formateur" required placeholder="Formateur">
                <textarea id="training-description" name="description" required placeholder="Description"></textarea>
                <select id="training-category" name="catégorie" required>
                <option value="">-- Sélectionner une catégorie --</option>
                    <option value="Formations Métiers">Formations Métiers</option>
                    <option value="Assistant et Secrétariat">Assistant et Secrétariat</option>
                    <option value="Comptabilité">Comptabilité</option>
                    <option value="Informatique">Informatique</option>
                    <option value="Design">Design</option>
                    <option value="Commerce">Commerce</option>
                    <option value="Environnement">Environnement</option>
                    <option value="Ressources Humaines">Ressources Humaines</option>
                    <option value="Entrepreneuriat">Entrepreneuriat</option>
                    <option value="Management">Management</option>
                    <option value="Sécurité">Sécurité</option>
                    <option value="Communication">Communication</option>
                    <option value="Finance">Finance</option>
                    <option value="Qualité">Qualité</option>
                </select>
                <button type="submit">Enregistrer</button>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById("training-modal").style.display = "flex";
            document.getElementById("training-id").value = "";
        }
        function closeModal() {
            document.getElementById("training-modal").style.display = "none";
        }
        function editFormation(id, titre, description, formateur, catégorie) {
            openModal();
            document.getElementById("training-id").value = id;
            document.getElementById("training-title").value = titre;
            document.getElementById("training-description").value = description;
            document.getElementById("trainer-name").value = formateur;
            document.getElementById("training-category").value = catégorie;
        }
    </script>
</body>
</html>
