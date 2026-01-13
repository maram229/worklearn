document.addEventListener("DOMContentLoaded", () => {
    const chartModal = document.getElementById("chart-modal");
    const modalOverlay = document.getElementById("modal-overlay");
    const closeModal = document.getElementById("close-modal");
    const chartCanvas = document.getElementById("chart");
    const chartTitle = document.getElementById("chart-title");
  
    let chartInstance;
  
    // Données pour les graphiques
    const chartData = {
      trainings: {
        title: "Formations Totales",
        labels: ["Angular", "Sécurité", "Gestion de Projet"],
        data: [10, 8, 7],
      },
      employees: {
        title: "Employés Formés",
        labels: ["Développeurs", "Managers", "Analystes"],
        data: [50, 60, 40],
      },
      certificates: {
        title: "Certificats Distribués",
        labels: ["2023", "2024", "2025"],
        data: [30, 50, 50],
      },
    };
  
    // Fonction pour afficher le graphique
    const showChart = (type) => {
      const data = chartData[type];
      chartTitle.textContent = data.title;
  
      if (chartInstance) {
        chartInstance.destroy();
      }
  
      chartInstance = new Chart(chartCanvas, {
        type: "bar",
        data: {
          labels: data.labels,
          datasets: [
            {
              label: data.title,
              data: data.data,
              backgroundColor: ["#2f4550", "#4a6a74", "#6a9ea3"],
            },
          ],
        },
        options: {
          responsive: true,
          animation: {
            duration: 1000,
          },
        },
      });
  
      chartModal.style.display = "block";
      modalOverlay.style.display = "block";
    };
  
    // Gestion des clics sur les cartes statistiques
    document.querySelectorAll(".stat-card").forEach((card) => {
      card.addEventListener("click", () => {
        const chartType = card.getAttribute("data-chart");
        showChart(chartType);
      });
    });
  
    // Fermeture de la modale
    closeModal.addEventListener("click", () => {
      chartModal.style.display = "none";
      modalOverlay.style.display = "none";
    });
  
    modalOverlay.addEventListener("click", () => {
      chartModal.style.display = "none";
      modalOverlay.style.display = "none";
    });
  });
  
  // Script pour gérer l'affichage des détails des formations
  document.addEventListener("DOMContentLoaded", () => {
    const trainingItems = document.querySelectorAll(".training-item");
    const trainingDetailsSection = document.getElementById("training-details");
    const trainingTitle = document.getElementById("training-title");
    const trainingSubjects = document.getElementById("training-subjects");
    const trainingParticipants = document.getElementById("training-participants");
    const trainingImages = document.getElementById("training-images");
    const trainingCertificates = document.getElementById("training-certificates");  // Correction ici
    const closeDetailsButton = document.getElementById("close-details");
  
    // Exemple de données pour les formations
    const trainingData = {
      1: {
        title: "Formation Angular",
        subjects: ["Introduction à Angular", "Composants et Directives", "Services et Injection de Dépendances"],
        participants: ["Alice", "Bob", "Charlie"],
        images: ["angular1.jpg", "angular2.jpg"],
        certificates: ["certificat1.pdf", "certificat2.pdf"],  // Correction des certificats
      },
      2: {
        title: "Formation Sécurité Informatique",
        subjects: ["Principes de base", "Protection des données", "Sécurité réseau"],
        participants: ["Dave", "Emma", "Frank"],
        images: ["security1.jpg", "security2.jpg"],
        certificates: ["certificat1.pdf", "certificat2.pdf"],
      },
      3: {
        title: "Gestion de Projet",
        subjects: ["Cycle de vie du projet", "Planification", "Gestion des risques"],
        participants: ["Grace", "Hannah", "Ian"],
        images: ["project1.jpg", "project2.jpg"],
        certificates: ["certificat1.pdf", "certificat2.pdf"],
      },
    };
  
    // Afficher les détails d'une formation
    const showTrainingDetails = (trainingId) => {
      const data = trainingData[trainingId];
      if (!data) return;
  
      // Mettre à jour le contenu des détails
      trainingTitle.textContent = data.title;
  
      trainingSubjects.innerHTML = "";
      data.subjects.forEach((subject) => {
        const li = document.createElement("li");
        li.textContent = subject;
        trainingSubjects.appendChild(li);
      });
  
      trainingParticipants.innerHTML = "";
      data.participants.forEach((participant) => {
        const li = document.createElement("li");
        li.textContent = participant;
        trainingParticipants.appendChild(li);
      });
  
      trainingImages.innerHTML = "";
      data.images.forEach((image) => {
        const img = document.createElement("img");
        img.src = image; // Assurez-vous que les images existent dans votre dossier
        img.alt = data.title;
        trainingImages.appendChild(img);
      });
  
      // Affichage des certificats
      trainingCertificates.innerHTML = "";  // Ajout de cette ligne pour réinitialiser les certificats
      data.certificates.forEach((certificate) => {
        const p = document.createElement("p");
        const a = document.createElement("a");
        a.href = certificate;
        a.textContent = certificate;
        a.target = "_blank";
        p.appendChild(a);
        trainingCertificates.appendChild(p);
      });
  
      // Afficher la section
      trainingDetailsSection.classList.remove("hidden");
    };
  
    // Ajouter des gestionnaires de clic aux boutons
    trainingItems.forEach((item) => {
      item.addEventListener("click", () => {
        const trainingId = item.getAttribute("data-training-id");
        showTrainingDetails(trainingId);
      });
    });
  
    // Cacher les détails au clic sur le bouton "Fermer"
    closeDetailsButton.addEventListener("click", () => {
      trainingDetailsSection.classList.add("hidden");
    });
  });
  