<?php
class Utilisateur {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function demanderFormation($idUtilisateur, $idFormation) {
        // Vérifier si l'utilisateur existe
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
        $stmt->execute([$idUtilisateur]);
        if (!$stmt->fetch()) {
            return "Utilisateur introuvable.";
        }

        // Vérifier si la formation existe
        $stmt = $this->pdo->prepare("SELECT * FROM formations WHERE id = ?");
        $stmt->execute([$idFormation]);
        if (!$stmt->fetch()) {
            return "Formation introuvable.";
        }

        // Vérifier si la demande existe déjà
        $stmt = $this->pdo->prepare("SELECT * FROM formations_utilisateurs WHERE id_utilisateurs = ? AND id_formations = ?");
        $stmt->execute([$idUtilisateur, $idFormation]);
        if ($stmt->rowCount() > 0) {
            return "Vous avez déjà demandé cette formation.";
        }

        // Ajouter la demande
        $stmt = $this->pdo->prepare("INSERT INTO formations_utilisateurs (id_utilisateurs, id_formations, statut) VALUES (?, ?, 'en attente')");
        if ($stmt->execute([$idUtilisateur, $idFormation])) {
            return "Votre demande a été envoyée.";
        }
        return "Erreur lors de la demande.";
    }
}
?>
