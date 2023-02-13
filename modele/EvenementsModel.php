<?php
// namespace modele\EnvenementsModel;
use  \modele\Model  as  Model;
require_once ('Model.php');

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
        $sql = "INSERT INTO "
        .$this->table."
        (Id_Evenements , evenements_nom , evenements_date , evenements_place_dispo)
        VALUES (NULL ,'$nomEvent' , '$dateEvent' , '$eventPlaceDispo')" ;
        $query = $this->$connection->prepare($sql);
        try{
            $query->execute();
        }catch (\Exception $e) {
            throw new \Exception('Problème lors du create');
        }
    }

    public function updateEvenementPlace($nbPlaces) {
        $sql = "UPDATE ".$this->table." 
        SET evenements_place_dispo=".$nbPlaces." 
        WHERE Id_Evenements = ".$this->id ; 
        $query = $this->$connection->prepare($sql);
        try{
            $query->execute();
        }catch (\Exception $e) {
            throw new \Exception('Problème lors de l update de evenement nb places');
        }
        
    }

    public function updateEvenementNom($nom) {
        $sql = "UPDATE ".$this->table." 
        SET evenements_nom=".$nom." 
        WHERE Id_Evenements = ".$this->id ; 
        $query = $this->$connection->prepare($sql);
        try{
            $query->execute();
        }catch (\Exception $e) {
            throw new \Exception('Problème lors de l update de evenement nom');
        }
        
    }

    public function updateEvenementDuree($duree) {
        $sql = "UPDATE ".$this->table." 
        SET evenements_duree=".$duree." 
        WHERE Id_Evenements = ".$this->id ; 
        $query = $this->$connection->prepare($sql);
        try{
            $query->execute();
        }catch (\Exception $e) {
            throw new \Exception('Problème lors de l update de evenement duree');
        }
        
    }

    public function updateEvenementDate($date) {
        $sql = "UPDATE ".$this->table." 
        SET evenements_date=".$date." 
        WHERE Id_Evenements = ".$this->id ; 
        $query = $this->$connection->prepare($sql);
        try{
            $query->execute();
        }catch (\Exception $e) {
            throw new \Exception('Problème lors de l update de evenement duree');
        }
        
    }


}