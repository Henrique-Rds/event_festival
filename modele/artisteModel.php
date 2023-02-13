<?php
use  \modele\Model  as  Model;
require_once ('Model.php');

class artisteModel extends Model{

    // Propriétés permettant de personnaliser les requêtes
    public $table;
    public $id;
    private $Connection;

    public function __construct(){
            // Nous définissons la table par défaut de ce modèle
            $this->table = "evenements";

            // Nous ouvrons la connexion à la base de données
            $this->ConnectionBDD();
            echo "connection fin";
    }


    public function createArtiste($artisteNom,$artisteNbMusique){
        $sql = "INSERT INTO".$this->table."
        (Id_Artistes,artiste_nom , artiste_nb_musique)
        VALUES (NULL,'$artisteNom' , '$artisteNbMusique')";
        $query = $this->$connection->prepare($sql);
        $query->execute();
        return $query->fetch(); 
    }

    public function updateArtisteNom($artisteNom) {
        $sql = "UPDATE ".$this->table." 
        SET artistes_nom=".$artisteNom." 
        WHERE Id_Artistes = ".$this->id ; 
        $query = $this->$connection->prepare($sql);
        try{
            $query->execute();
        }catch (\Exception $e) {
            throw new \Exception('Problème lors de l update');
        }
        
    }

    public function updateArtisteNbMusique($artisteNbMusique) {
        $sql = "UPDATE ".$this->table." 
        SET artistes_nom=".$artisteNbMusique." 
        WHERE Id_Artistes = ".$this->id ; 
        $query = $this->$connection->prepare($sql);
        try{
            $query->execute();
        }catch (\Exception $e) {
            throw new \Exception('Problème lors de l update');
        }
        
    }
}