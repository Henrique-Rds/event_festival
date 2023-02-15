<?php

use  \modele\Model  as  Model;
require_once ('model.php');

class ArtisteModel extends Model{


    public function __construct(){
            // Nous définissons la table par défaut de ce modèle
            $this->table = "artistes";

            // Nous ouvrons la connexion à la base de données
            $this->ConnectionBDD();
            echo "connection fin";
    }


    public function createArtiste($artisteNom,$artisteNbMusique){
        
        $sql = "INSERT INTO ".$this->table."
        (id, artiste_nom , artiste_nb_musique)
        VALUES (NULL, ? , ? )";
        $query = $this->connection->prepare($sql);
        try{
            $query->execute([$artisteNom,$artisteNbMusique]);
        }catch (\Exception $e) {
            throw new \Exception('Problème lors du create de l artiste');
        } 
    }

    public function updateArtiste($artisteNom,$artisteNbMusique,$id_param) {
        $sql = "UPDATE ".$this->table." 
        SET artistes_nom= ? ,artiste_nb_musique= ?
        WHERE id= ? " ; 
        $query = $this->connection->prepare($sql);
        var_dump($query);
        try{
            $query->execute([$artisteNom,$artisteNbMusique,$id_param]);
        }catch (\Exception $e) {
            throw new \Exception('Problème lors de l update de l artiste');
        }
    }

}