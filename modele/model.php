<?php
namespace modele;
use modele\connectionFiles\Connexion as Connexion;
abstract class Model{

    // Propriétés permettant de personnaliser les requêtes
    public $table;
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
     * return un objet
     */
    public function getOne($id){
        $tables = htmlspecialchars($this->table);
        $sql = "SELECT * FROM ".$tables." WHERE id =? ";
        $query = $this->connection->prepare($sql);
        $query->execute([$id]);
        return $query->fetch();     
    }

     

    /**
     * Méthode permettant d'obtenir tous les enregistrements de la table choisie
     *
     * return liste d'objets
     */
    public function getAll(){
        $tables = htmlspecialchars($this->table);
        $sql = "SELECT * FROM ".$tables;
        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    /**
     * Méthode permettant supprimer l'enregistrement de la table choisie
     *
     * retourne void
     */
    public function deleteOne($id){
        $tables = htmlspecialchars($this->table);
        $sql = "DELETE FROM ".$tables." WHERE id= ?";
        $query = $this->connection->prepare($sql);
        $query->execute([$id]);
 
    }
}

?>