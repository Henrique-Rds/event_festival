<?php
namespace modele;
use modele\connectionFiles\Connexion as Connexion;
abstract class Model{

    // Propriétés permettant de personnaliser les requêtes
    protected $table;
    private $instanceConnection;
    protected $connection;

     /**
     * Fonction d'initialisation de la base de données
     *
     * @return void
     */
    public function ConnectionBDD(){
        // On recupère l'instance de la connexion
        $this->instanceConnection = Connexion::getInstance();

        // On essaie de se connecter à la base de données
        $this->connection = $this->instanceConnection->getConnection();
        
    }

    /**
     * Méthode permettant d'obtenir un enregistrement de la table choisie en fonction d'un id
     * Ici l'utilisation du select * est utile car c'est une méthode générique
     *
     * return un objet
     */
    public function getOne($id){
        $sql = "SELECT * FROM ".$this->table." WHERE id =? ";
        $query = $this->connection->prepare($sql);
        $query->execute([$id]);
        return $query->fetch();     
    }

     

    /**
     * Méthode permettant d'obtenir tous les enregistrements de la table choisie
     * Ici l'utilisation du select * est utile car c'est une méthode générique
     * return liste d'objets
     */
    public function getAll(){
        $sql = "SELECT * FROM ".$this->table;
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
        $sql = "DELETE FROM ".$this->table." WHERE id= ?";
        $query = $this->connection->prepare($sql);
        $query->execute([$id]);
 
    }
}

?>