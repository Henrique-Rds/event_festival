<?php
namespace modele;
use modele\connectionFiles\Connexion as Connexion;
abstract class Model{

    // Propriétés permettant de personnaliser les requêtes
    public $table;
    public $id;
    private $connection;

     /**
     * Fonction d'initialisation de la base de données
     *
     * @return void
     */
    public function ConnectionBDD(){
        // On supprime la connexion précédente
        $this->_connexion = null;

        // On essaie de se connecter à la base
        $hconnection = new Connexion();
        $this->connection = $hconnection->getConnection();
        
    }

    /**
     * Méthode permettant d'obtenir un enregistrement de la table choisie en fonction d'un id
     *
     * @return void
     */
    public function getOne(){
        $sql = "SELECT * FROM ".$this->table." WHERE id=".$this->id;
        $query = $this->connection->prepare($sql);
        $query->execute();
        return $query->fetch();    
    }

     

    /**
     * Méthode permettant d'obtenir tous les enregistrements de la table choisie
     *
     * @return void
     */
    public function getAll(){
        $sql = "SELECT * FROM ".$this->table;
        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        var_dump($result);
        return $result;    
    }

    /*
    *
    */
    public function deleteOne(){
        $sql = "DELETE FROM ".$this->table." WHERE id=".$this->id;
        $query = $this->connection->prepare($sql);
        $query->execute();
 
    }
}

?>