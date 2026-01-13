<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "worklearn";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Récupérer les employés depuis la base de données
$sql = "SELECT * FROM employes";  // Remplacez 'employes' par le nom de votre table
$result = $conn->query($sql);

$employes = [];
if ($result->num_rows > 0) {
  // Stocker les résultats dans un tableau
  while ($row = $result->fetch_assoc()) {
    $employes[] = $row;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Employés</title>
  <style>
    /* Styles généraux */
body {
  font-family: 'Roboto', sans-serif;
  margin: 0;
  padding: 0;
  background-color: #ffffff;
  color: #244F76;
  line-height: 1.6;
}

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
  align-items: center;
}

.logo {
  width: 80px;
  height: 80px;
  margin-left: 50px;
}

h1 {
  margin: 0;
  font-size: 28px;
  font-weight: 500;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
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
/* Formulaire centré */
form {
  max-width: 600px;
  margin: 50px auto;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
}
#titre{
  justify-self: center;
}
.form-group {
  margin-bottom: 15px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.form-group label {
  font-weight: bold;
  margin-bottom: 5px;
  width: 100%;
  text-align: left;
}

.form-group input, 
.form-group select, 
.form-group textarea {
  width: 100%;
  max-width: 400px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button[type="submit"] {
  background-color: #007bff;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
  background-color: #0056b3;
}


/* Tableau des employés */
table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  background-color: white;
}

table th, table td {
  padding: 12px;
  text-align: left;
  border-bottom: 1px solid #e0e0e0;
}

table th {
  background-color: #f8f9fa;
  color: #495057;
}

table tr:hover {
  background-color: #f1f1f1;
}

/* Boutons Modifier et Supprimer */
a {
  text-decoration: none;
  padding: 5px 10px;
  border-radius: 4px;
  color: white;
  font-size: 14px;
}

a.modifier {
  background-color: #007bff;
}

a.modifier:hover {
  background-color: #0056b3;
}

a.supprimer {
  background-color: #dc3545;
}

a.supprimer:hover {
  background-color: #c82333;
}
  </style>
</head>
<body>
<header>
    <div class="logo-container">
      <img src="logo.png" alt="Logo de la société" class="logo">
      <h1>Gestion des Employés</h1>
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
  <main>
    <section> 
      <h1>Gestion des Employes</h1>
    </section>
    <!-- Liste des employés -->
    <section class="employee-list-section">
  <h2>Liste des Employés</h2>
  <table border="1">
    <tr>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Poste</th>
      <th>Service</th>
      <th>Téléphone</th>
      <th>Email</th>
      <th>Formations</th>
    </tr>
    <?php
    if (count($employes) > 0) {
      foreach ($employes as $employe) {
        echo "<tr>";
        echo "<td>" . $employe['nom'] . "</td>";
        echo "<td>" . $employe['prenom'] . "</td>";
        echo "<td>" . $employe['poste'] . "</td>";
        echo "<td>" . $employe['service'] . "</td>";
        echo "<td>" . $employe['telephone'] . "</td>";
        echo "<td>" . $employe['email'] . "</td>";
        echo "<td>". $employe['formations'] . "</td>";
        echo "<td>
                  <a class='modifier' href='updateemployes.php?id=" . $employe['id'] . "'>Modifier</a> 
                 <a class='supprimer' href='delete_employee.php?id=" . $employe['id'] . "' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?');\">Supprimer</a>
      </td>";

        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='7'>Aucun employé trouvé</td></tr>";
    }
    ?>
  </table>
</section>

<!-- Modal d'ajout d'employé -->
<div id="employee-modal" class="modal">
  <div class="modal-content">
    <span id="close-modal" class="close">&times;</span>
    <h2 id ="titre">Ajouter un Employé</h2>
    <form id="add-employes-form" action="add_employes.php" method="POST">
      
      <!-- Informations Personnelles -->
      <div class="form-row">
        <div class="form-group">
          <label for="nom">Nom</label>
          <input type="text" id="nom" name="nom" required>
        </div>
        <div class="form-group">
          <label for="prenom">Prénom</label>
          <input type="text" id="prenom" name="prenom" required>
        </div>
        <div class="form-group">
          <label for="poste">Poste</label>
          <input type="text" id="poste" name="poste" required>
        </div>
      </div>

      <!-- Service -->
      <div class="form-group">
        <label for="service">Service</label>
        <select id="service" name="service" required>
          <option value="">-- Sélectionnez un service --</option>
          <option value="RH">Ressources Humaines</option>
          <option value="IT">Informatique</option>
          <option value="Marketing">Marketing</option>
          <option value="Finance">Finance</option>
          <option value="Logistique">Logistique</option>
        </select>
      </div>

      <!-- Coordonnées -->
      <div class="form-row">
        <div class="form-group">
          <label for="telephone">Téléphone</label>
          <input type="text" id="telephone" name="telephone" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
      </div>

      <!-- Formations -->
      <div class="form-group">
        <label for="formations">Formations déjà faites</label>
        <textarea id="formations" name="formations"></textarea>
      </div>

      <!-- Bouton de soumission -->
      <button type="submit">Ajouter</button>
    </form>
  </div>
</div>

  </main>
  <script>
    const openModal = document.getElementById("open-modal");
    const modal = document.getElementById("employee-modal");
    const closeModal = document.getElementById("close-modal");
    const addEmployeeForm = document.getElementById("add-employee-form");
    const employeeList = document.getElementById("employee-list");

    // Ouvrir le modal
    openModal.addEventListener("click", (e) => {
      e.preventDefault();
      modal.style.display = "flex";
    });

    // Fermer le modal
    closeModal.addEventListener("click", () => {
      modal.style.display = "none";
    });

    // Fermer le modal si on clique en dehors
    window.addEventListener("click", (e) => {
      if (e.target === modal) {
        modal.style.display = "none";
      }
    });

    // Ajouter un employé via AJAX
    addEmployeeForm.addEventListener("submit", (e) => {
      e.preventDefault();

      const formData = new FormData(addEmployeeForm);

      fetch("add_employee.php", {
        method: "POST",
        body: formData
      })
      .then(response => response.text())
      .then(data => {
        if (data === "Employé ajouté avec succès!") {
          // Réinitialiser le formulaire et fermer le modal
          addEmployeeForm.reset();
          modal.style.display = "none";
          alert(data);

          // Ajouter l'employé dans la liste
          const newEmployee = document.createElement("li");
          newEmployee.textContent = `${formData.get("nom")} ${formData.get("prenom")} - ${formData.get("poste")} (${formData.get("service")})`;
          employeeList.appendChild(newEmployee);
        } else {
          alert("Erreur lors de l'ajout de l'employé.");
        }
      })
      .catch(error => console.error('Erreur:', error));
    });
    document.addEventListener("DOMContentLoaded", function() {
  const employeeTable = document.getElementById("employee-table");

  // Modifier un employé
  employeeTable.addEventListener("click", function(event) {
    if (event.target.classList.contains("edit-btn")) {
      const row = event.target.closest("tr");
      const id = row.getAttribute("data-id");
      const nom = row.cells[0].textContent;
      const prenom = row.cells[1].textContent;
      const poste = row.cells[2].textContent;
      const service = row.cells[3].textContent;
      const telephone = row.cells[4].textContent;
      const email = row.cells[5].textContent;
      const formations = row.cells[6].textContent;

      // Remplir un formulaire de modification avec les données actuelles
      // Par exemple, vous pouvez ouvrir un modal pour modifier ces informations
      alert(`Modifier l'employé: ${nom} ${prenom}`);
      // Vous pouvez ajouter un modal pour modifier les informations de l'employé
    }
  });

  document.addEventListener("DOMContentLoaded", function() {
  const employeeTable = document.getElementById("employee-table");

  // Gérer le clic sur le bouton "Modifier"
  employeeTable.addEventListener("click", function(event) {
    if (event.target.classList.contains("edit-btn")) {
      const row = event.target.closest("tr");
      const id = row.getAttribute("data-id");

      // Récupérer les données de l'employé
      const nom = row.cells[0].textContent;
      const prenom = row.cells[1].textContent;
      const poste = row.cells[2].textContent;
      const service = row.cells[3].textContent;
      const telephone = row.cells[4].textContent;
      const email = row.cells[5].textContent;
      const formations = row.cells[6].textContent;

      // Afficher les données de l'employé pour modification
      alert(`Modifier l'employé: ${nom} ${prenom}\nPoste: ${poste}\nService: ${service}\nTéléphone: ${telephone}\nEmail: ${email}\nFormations: ${formations}`);

      // Vous pouvez ouvrir un modal ici pour modifier les informations
      // Pour l'instant, juste un alert
    }
  });

  // Gérer le clic sur le bouton "Supprimer"
  employeeTable.addEventListener("click", function(event) {
    if (event.target.classList.contains("delete-btn")) {
      const row = event.target.closest("tr");
      const id = row.getAttribute("data-id");

      if (confirm("Êtes-vous sûr de vouloir supprimer cet employé ?")) {
        // Envoyer une requête AJAX pour supprimer l'employé
        fetch(`delete_employee.php?id=${id}`, {
          method: 'GET',
        })
        .then(response => response.text())
        .then(data => {
          if (data === "Employé supprimé avec succès!") {
            row.remove();  // Supprimer la ligne du tableau
            alert(data);
          } else {
            alert("Erreur lors de la suppression de l'employé.");
          }
        })
        .catch(error => console.error("Erreur:", error));
      }
    }
  });
});
const openModal = document.getElementById("open-modal");
const modal = document.getElementById("employee-modal");
const closeModal = document.getElementById("close-modal");

// Ouvrir le modal
openModal.addEventListener("click", (e) => {
  e.preventDefault();
  modal.style.display = "flex";
});

// Fermer le modal
closeModal.addEventListener("click", () => {
  modal.style.display = "none";
});

// Fermer le modal si on clique en dehors
window.addEventListener("click", (e) => {
  if (e.target === modal) {
    modal.style.display = "none";
  }
});

</script>
</body>
</html>
