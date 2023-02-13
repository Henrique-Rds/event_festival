<?php
// namespace modele\EnvenementsModel;
use  \modele\Model  as  Model;
require_once ('model.php');

class EvenementsModel extends Model{
    
    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "evenements";

        // Nous ouvrons la connexion à la base de données
        $this->ConnectionBDD();
        echo "connection fin";
    }

    public function createEvenement($nomEvent,$dateEvent,$eventPlaceDispo) {
        $tables = htmlspecialchars($this->table);
        $sql = "INSERT INTO ".$tables."
        (Id_Evenements , evenements_nom , evenements_date , evenement_duree, lieu, evenements_place_dispo)
        VALUES (NULL , ? , ? , ?, ?, ?)" ;
        $query = $this->$connection->prepare($sql);
        try{
            $query->execute([$nom,$date,$duree,$lieu,$placeDispo]);
        }catch (\Exception $e) {
            throw new \Exception('Problème lors du create');
        }
    }

    public function updateEvenement($nom,$placeDispo,$date,$duree,$lieu,$id) {
        $tables = htmlspecialchars($this->table);
        $sql = "UPDATE ".$tables."
        SET evenements_nom = ? , evenements_date= ? ,
        evenements_duree = ?, lieu = ? , evenements_place_dispo = ?
        WHERE Id_Evenements = ? "; 
        $query = $this->$connection->prepare($sql);
        try{
            $query->execute([$nom,$date,$duree,$lieu,$placeDispo,$id]);
        }catch (\Exception $e) {
            throw new \Exception('Problème lors de l update de evenement');
        }
        
    }





}