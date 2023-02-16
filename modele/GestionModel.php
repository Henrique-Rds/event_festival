<?php

use  \modele\Model  as  Model;
require_once ('model.php');

class GestionModel extends Model{


    public function __construct(){
            // Nous définissons la table par défaut de ce modèle
            $this->table = "evenements_artistes";

            // Nous ouvrons la connexion à la base de données
            $this->ConnectionBDD();
            echo "connection fin";
    }

    public function getAssociation(){
        $sql = "SELECT evenements_nom, artiste_nom , evenements.id as eventId, artistes.id as artisteId  FROM `evenements`,`artistes`,".$this->table."
        WHERE evenements.id = evenements_artistes.Id_Evenements
        AND artistes.id = evenements_artistes.Id_Artistes";
        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function createAssociation($eventId,$artisteId){
        $sql = "INSERT INTO ".$this->table."
        (Id_Evenements, Id_Artistes)
        VALUES ( ? , ? )";
        $query = $this->connection->prepare($sql);
        try{
            $query->execute([$eventId,$artisteId]);
        }catch (\Exception $e) {
            throw new \Exception('Problème lors du create de l association');
        } 
    }

    // suppression d'une association artiste evenement en fonction de l'id de l'evenement et de l'artiste
    public function deleteGestionArtisteEvent($eventId,$artisteId){
        $sql = "DELETE FROM ".$this->table." WHERE Id_Evenements= ? AND Id_Artistes= ?";
        $query = $this->connection->prepare($sql);
        $query->execute([$eventId , $artisteId]);
 
    }

}