<?php
namespace modele\connectionFiles;

class Connexion{
    private $driver;
    private $host, $user, $pass, $database, $charset;
    private static $_instance;
    
    private function __construct() {
        // Les informations de connexion sont déclarées dans le fichier Database.php
        $db_cfg = require_once 'Database.php';
        $this->driver=DB_DRIVER;
        $this->host=DB_HOST;
        $this->user=DB_USER;
        $this->pass=DB_PASS;
        $this->database=DB_DATABASE;
        $this->charset=DB_CHARSET;
    }
    public static function getInstance():Connexion
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Connexion();
        }
        return self::$_instance;
    }

    public function getConnection():\PDO{
        // Chaine de connexion
        $dsn = $this->driver.':host='.$this->host.';dbname='.$this->database.';charset='.$this->charset;
        //$dsn = ' mysql:host=localhost;dbname=db_test;charset=utf8';

        try { 
            // Obtenir une connexion à la BD
            // Si connexion impossible -> retourne un exception PDOException
            $connection = new \PDO($dsn, $this->user, $this->pass);

            // Le mode pour reporter les erreurs de PDO.
            // PDO::ERRMODE_EXCEPTION : Lance des exceptions PDOException
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            // Retourne la connexion
            return $connection;
        

        // Si connexion à la BD impossible, l'exception PDOException est lancée
        } catch (\PDOException $e) {
            // Lancer une exception à la méthode appelante
            throw new \Exception('Impossible d\'établir la connexion à la BD.');
            $_SESSION['message'] = 'Impossible d\'établir la connexion à la BD.';
            
        }
    }
}
 
?>