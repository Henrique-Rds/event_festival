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
    }

    public function createEvenement($nom,$date,$duree,$lieu,$placeDispo) {
        $sql = "INSERT INTO ".$this->table."
        (id, evenements_nom , evenements_date , evenements_duree, lieu, evenements_capacite)
        VALUES (NULL,? , ? , ?, ?, ?)" ;
        $query = $this->connection->prepare($sql);
        try{
            $query->execute([$nom,$date,$duree,$lieu,$placeDispo]);
        }catch (\Exception $e) {
            throw new \Exception('Problème lors du create');
            var_dump($e);
        }
    }

    public function updateEvenement($nom,$date,$duree,$lieu,$placeDispo,$id) {
        $sql = "UPDATE ".$this->table."
        SET evenements_nom = ? , evenements_date= ? ,
        evenements_duree = ?, lieu = ? , evenements_capacite = ?
        WHERE id = ? "; 
        $query = $this->connection->prepare($sql);
        try{
            $query->execute([$nom,$date,$duree,$lieu,$placeDispo,$id]);
        }catch (\Exception $e) {
            throw new \Exception('Problème lors de l update de evenement');
        }
        
    }





}