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
        var_dump($query);
        try{
            $query->execute([$artisteNom,$artisteNbMusique]);
        }catch (\Exception $e) {
            throw new \Exception('Problème lors du create');
        } 
    }

    // public function updateArtisteNom($artisteNom) {
    //     $sql = "UPDATE ".$this->table." 
    //     SET artistes_nom=".$artisteNom." 
    //     WHERE Id_Artistes = ".$this->id ; 
    //     $query = $this->connection->prepare($sql);
    //     try{
    //         $query->execute();
    //     }catch (\Exception $e) {
    //         throw new \Exception('Problème lors de l update');
    //     }
        
    // }

    // public function updateArtisteNbMusique($artisteNbMusique) {
    //     $sql = "UPDATE ".$this->table." 
    //     SET artistes_nom=".$artisteNbMusique." 
    //     WHERE Id_Artistes = ".$this->id ; 
    //     $query = $this->connection->prepare($sql);
    //     try{
    //         $query->execute();
    //     }catch (\Exception $e) {
    //         throw new \Exception('Problème lors de l update');
    //     }
        
    // }
}