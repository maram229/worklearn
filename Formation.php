<?php class Formation {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listerDemandes() {
        $stmt = $this->pdo->query("SELECT f.id, f.titre, u.nom, u.email, fu.id as demande_id, fu.statut 
                                   FROM formations_utilisateurs fu
                                   JOIN utilisateurs u ON fu.id_utilisateurs = u.id
                                   JOIN formations f ON fu.id_formations = f.id
                                   WHERE fu.statut = 'en attente'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function traiterDemande($idDemande, $action) {
        $statut = ($action === 'accepter') ? 'accepté' : 'refusé';
        $stmt = $this->pdo->prepare("UPDATE formations_utilisateurs SET statut = ? WHERE id = ?");
        if ($stmt->execute([$statut, $idDemande])) {
            // Notifier l'utilisateur
            $this->notifierUtilisateur($idDemande, "Votre demande de formation a été $statut.");
            return "Demande mise à jour.";
        }
        return "Erreur.";
    }

    private function notifierUtilisateur($idDemande, $message) {
        // Trouver l'utilisateur concerné
        $stmt = $this->pdo->prepare("SELECT id_utilisateurs FROM formations_utilisateurs WHERE id = ?");
        $stmt->execute([$idDemande]);
        $user = $stmt->fetch();

        // Ajouter une notification
        if ($user) {
            $stmt = $this->pdo->prepare("INSERT INTO notifications (destinataire, contenu) VALUES (?, ?)");
            $stmt->execute([$user['id_utilisateurs'], $message]);
        }
    }
}
?>